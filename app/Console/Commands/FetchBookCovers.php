<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Book;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FetchBookCovers extends Command
{
    protected $signature = 'fetch:book-covers';
    protected $description = 'Fetch missing book covers from Open Library API and store them locally';

    public function handle()
    {
        // Find books with a null cover field and a valid ISBN
        $books = Book::whereNotNull('isbn')->get();

        foreach ($books as $book) {
            $isbn = $book->isbn;

            // Open Library cover URL for the given ISBN
            $coverUrl = "https://covers.openlibrary.org/b/isbn/{$isbn}-L.jpg";
            $response = Http::get($coverUrl);

            // Check if the cover image exists by validating the response
            if ($response->successful()) {
                // Define the local storage path and file name
                $fileName = "book-covers/{$isbn}.jpg";

                // Store the image on the public disk
                Storage::disk('public')->put($fileName, $response->body());

                // Save the public URL path to the cover field
                $book->cover = Storage::url($fileName);
                $book->save();

                $this->info("Cover downloaded and stored for book: {$book->title}");
            } else {
                $this->warn("No cover found for ISBN: {$isbn} (Book: {$book->title})");
            }
        }

        $this->info("Cover fetching and storing complete.");
        return Command::SUCCESS;
    }
}
