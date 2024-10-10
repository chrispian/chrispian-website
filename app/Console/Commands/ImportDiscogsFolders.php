<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;
use Illuminate\Support\Facades\Http;

class ImportDiscogsFolders extends Command
{
    protected $signature = 'import:discogs-folders {username}';
    protected $description = 'Import Discogs folders as categories for the specified username';

    public function handle()
    {
        $username = $this->argument('username');
        $url = "https://api.discogs.com/users/{$username}/collection/folders";

        $response = Http::get($url);

        if ($response->successful()) {
            $folders = $response->json();

            if (is_array($folders) && !empty($folders)) {
                foreach ($folders as $folderData) {
                    // Check if required fields exist
                    if (isset($folderData['id'], $folderData['name'], $folderData['count'], $folderData['resource_url'])) {
                        Category::updateOrCreate(
                            [
                                'title' => $folderData['name'],
                                'object_id' => $username, // Replace with the appropriate user or owner ID
                                'object_type' => 'App\Models\User', // Update to the correct model type
                            ],
                            [
                                'discogs_id' => $folderData['id'],
                                'slug' => str_slug($folderData['name']),
                                'notes' => null,
                                'sort_order' => 0, // Default sort order if needed
                            ]
                        );
                        $this->info("Imported folder as category: {$folderData['name']}");
                    } else {
                        $this->warn("Folder data is missing required fields: " . json_encode($folderData));
                    }
                }
                $this->info("Folders import complete.");
            } else {
                $this->error("The response did not contain folder data as expected.");
            }
        } else {
            $this->error("Failed to fetch folders. Status: {$response->status()}");
        }
    }
}
