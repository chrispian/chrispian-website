<?php

// app/Console/Commands/GetGoodReads.php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Book;
use App\Models\Category;

class GetGoodReads extends Command
{
    protected $signature = 'import:goodreads {file}';
    protected $description = 'Import Goodreads CSV data';

    public function handle()
    {
        $file = $this->argument('file');
        if (!file_exists($file)) {
            $this->error("File not found: $file");
            return Command::FAILURE;
        }

        // Read and parse CSV data
        $data = array_map('str_getcsv', file($file));
        $header = array_shift($data);

        foreach ($data as $row) {
            $row = array_combine($header, $row);

            // Clean up values, set empty strings to null
            $row = array_map(fn($value) => trim($value, '=""') ?: null, $row);

            $book = Book::firstOrNew(['book_id' => $row['Book Id']]);
            $book->fill([
                'title' => $row['Title'],
                'author' => $row['Author'],
                'author_lf' => $row['Author l-f'],
                'additional_authors' => $row['Additional Authors'],
                'isbn' => $row['ISBN'],
                'isbn13' => $row['ISBN13'],
                'average_rating' => $row['Average Rating'],
                'publisher' => $row['Publisher'],
                'binding' => $row['Binding'],
                'pages' => $row['Number of Pages'],
                'published_year' => $row['Year Published'],
                'original_publication_year' => $row['Original Publication Year'],
                'date_read' => $row['Date Read'],
                'date_added' => $row['Date Added'],
                'status' => match ($row['Exclusive Shelf']) {
                    'Read' => 'read',
                    'Currently Reading' => 'reading',
                    'To-Read' => 'unread',
                    default => 'unread',
                },
                'private_notes' => $row['Private Notes'],
                'read_count' => $row['Read Count'],
                'owned_copies' => $row['Owned Copies'],
                'notes' => $row['Notes'] ?? null,
            ]);

            // Only update review and rating if they’re null
            $book->review = $book->review ?? $row['My Review'];
            $book->rating = $book->rating ?? $row['My Rating'];

            $book->save();

            // Add categories to the Category model and associate them with the book
            $categories = explode(',', $row['Bookshelves']);
            foreach ($categories as $categoryName) {
                $category = Category::firstOrCreate([
                    'title' => trim($categoryName),
                    'object_type' => Book::class,
                    'object_id' => $book->id,
                ]);
                $book->categories()->save($category);
            }
        }

        $this->info("Import complete.");
        return Command::SUCCESS;
    }
}
