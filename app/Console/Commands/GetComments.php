<?php

namespace App\Console\Commands;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Spatie\Comments\Models\Comment;

class GetComments extends Command
{
    protected $signature = 'wp:getcomments';
    protected $description = 'Fetch comments from WordPress and insert them into the local database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $page = 1;

        do {
            // Construct the dynamic API URL based on the current page
            $wpApiUrl = "https://chrispian.com/wp-json/wp/v2/comments?page={$page}";
            $response = Http::get($wpApiUrl);

            if ($response->successful()) {
                $comments = $response->json();

                // If no comments are returned, stop the loop
                if (empty($comments)) {
                    break;
                }

                foreach ($comments as $wpComment) {
                    // Look up the corresponding Post in the local database
                    $post = Post::where('wordpress_id', $wpComment['post'])->first();

                    // Skip the comment if the corresponding post is not found
                    if (!$post) {
                        $this->error("Post not found for comment ID {$wpComment['id']}");
                        continue;
                    }

                    // Map WordPress comment fields to Spatie Comment model
                    $commentData = [
                        'commentable_type' => 'App\Models\Post', // Assuming comments are tied to the Post model
                        'commentable_id' => $post->id,
                        'commentator_type' => null, // WordPress comments don't have a commentator type
                        'commentator_id' => null, // Assuming no authenticated user data
                        'original_text' => $wpComment['content']['rendered'],
                        'created_at' => Carbon::parse($wpComment['date_gmt'])->setTimezone('UTC'),
                        'updated_at' => Carbon::parse($wpComment['date_gmt'])->setTimezone('UTC'),
                        'approved_at' => Carbon::parse($wpComment['date_gmt'])->setTimezone('UTC'),
                        'parent_id' => null, // Assuming no threading, or could map if threadable
                        'extra' => json_encode([
                            'author' => $wpComment['author'] ?? null,
                            'author_email' => $wpComment['author_email'] ?? null,
                            'author_name' => $wpComment['author_name'] ?? null,
                        ]), // Map author fields to JSON
                    ];

                    // Create the comment in the database
                    Comment::create($commentData);

                    $this->info("Comment ID {$wpComment['id']} imported successfully.");
                }
            } else {
                $this->error("Failed to fetch comments from page {$page}.");
                break;
            }

            $page++; // Move to the next page
        } while (true);

        $this->info('All comments imported successfully.');
    }
}
