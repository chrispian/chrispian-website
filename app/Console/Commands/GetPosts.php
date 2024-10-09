<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use League\HTMLToMarkdown\HtmlConverter;
use Spatie\Tags\Tag;

class GetPosts extends Command
{
    protected $signature = 'wp:getposts';
    protected $description = 'Fetch posts from WordPress and insert them into the local database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $converter = new HtmlConverter();
        $page = 1;

        do {
            // Construct the dynamic API URL based on the current page
            $wpApiUrl = "https://YOURDOMAIN.com/wp-json/wp/v2/posts?page={$page}";
            $response = Http::get($wpApiUrl);

            if ($response->successful()) {
                $posts = $response->json();

                // If no posts are returned, stop the loop
                if (empty($posts)) {
                    break;
                }

                foreach ($posts as $wpPost) {
                    // Convert HTML to Markdown
                    $title = html_entity_decode($wpPost['title']['rendered']);
                    $summary = $converter->convert(html_entity_decode($wpPost['excerpt']['rendered']));
                    $content = $converter->convert(html_entity_decode($wpPost['content']['rendered']));

                    $post = Post::create([
                        'sort_order' => null,
                        'author_id' => 1,
                        'title' => $title,
                        'slug' => $wpPost['slug'],
                        'cover_image' => $wpPost['featured_media'], // Assuming featured_media URL is available
                        'summary' => $summary,
                        'content' => $content,
                        'status' => 'Published',
                        'project_id' => null,
                        'series_id' => null,
                        'related_posts' => null,
                        'wordpress_slug' => $wpPost['slug'],
                        'wordpress_id' => $wpPost['id'],
                        'created_at' => Carbon::parse($wpPost['date'])->setTimezone('UTC'),
                        'updated_at' => Carbon::parse($wpPost['modified'])->setTimezone('UTC'),

                    ]);

                    // Handle Tags
                    if (!empty($wpPost['tags'])) {
                        $tags = [];
                        foreach ($wpPost['tags'] as $wpTagId) {
                            $wpTag = Http::get("https://YOURDOMAIN.com/wp-json/wp/v2/tags/{$wpTagId}")->json();
                            $tag = Tag::firstOrCreate(['wordpress_id' => $wpTag['id']], [
                                'name' => $wpTag['name'],
                            ]);
                            $tags[] = $tag->id;
                        }
                        $post->tags()->sync($tags);
                    }

                    // Handle Categories
                    if (!empty($wpPost['categories'])) {
                        $categories = [];
                        foreach ($wpPost['categories'] as $wpCategoryId) {
                            $wpCategory = Http::get("https://YOURDOMAIN.com/wp-json/wp/v2/categories/{$wpCategoryId}")->json();
                            $category = Category::firstOrCreate([ 'id' => $wpCategory[ 'id']], [
                                'title' => $wpCategory['name'],
                                'slug' => Str::slug($wpCategory['name']),
                            ]);
                            $categories[] = $category->id;
                        }
                        $post->categories()->sync($categories);
                    }
                }

                $this->info("Posts from page {$page} imported successfully.");
            } else {
                $this->error("Failed to fetch posts from page {$page}.");
                break;
            }

            $page++; // Move to the next page
        } while (true);

        $this->info('All posts imported successfully.');
    }
}
