<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class MigratePostCategoriesToPolymorphic extends Command
{
    protected $signature = 'migrate:post-categories';
    protected $description = 'Migrate post categories from many-to-many to the polymorphic structure';

    public function handle()
    {
        // Retrieve all entries from the pivot table `post_post_category`
        $pivotEntries = DB::table('post_post_category')->get();

        foreach ($pivotEntries as $entry) {
            // Retrieve the category and post IDs directly from the pivot table
            $postId = $entry->post_id;
            $categoryId = $entry->post_category_id;

            // Retrieve the existing category record to get its details
            $category = Category::find($categoryId);

            if ($category) {
                // Duplicate the category entry with polymorphic association for this post
                Category::create([
                    'title' => $category->title,
                    'slug' => $category->slug,
                    'sort_order' => $category->sort_order,
                    'notes' => $category->notes,
                    'object_id' => $postId,
                    'object_type' => Post::class,
                ]);

                $this->info("Migrated category '{$category->title}' (ID {$category->id}) for post ID {$postId}.");
            } else {
                $this->warn("Category ID {$categoryId} not found.");
            }
        }

        $this->info("Migration of post categories to polymorphic structure completed.");
        return Command::SUCCESS;
    }
}
