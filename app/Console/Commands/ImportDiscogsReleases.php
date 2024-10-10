<?php

// app/Console/Commands/ImportDiscogsReleases.php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Release;
use Illuminate\Support\Facades\Http;

class ImportDiscogsReleases extends Command
{
    protected $signature = 'import:discogs-releases {username}';
    protected $description = 'Import Discogs releases for the specified username without folder references';

    public function handle()
    {
        $username = $this->argument('username');
        $page = 1;

        do {
            // Discogs API endpoint for paginated release data
            $url = "https://api.discogs.com/users/{$username}/collection/folders/0/releases?page={$page}&per_page=50";
            $response = Http::get($url);

            if ($response->successful()) {
                $data = $response->json();

                foreach ($data['releases'] as $releaseData) {
                    $basicInfo = $releaseData['basic_information'];
                    Release::updateOrCreate(
                        ['discogs_id' => $basicInfo['id']],
                        [
                            'title' => $basicInfo['title'],
                            'year' => $basicInfo['year'],
                            'resource_url' => $basicInfo['resource_url'],
                            'thumb' => $basicInfo['thumb'],
                            'cover_image' => $basicInfo['cover_image'],
                            'formats' => $basicInfo['formats'],
                            'labels' => $basicInfo['labels'],
                            'artists' => $basicInfo['artists'],
                            'genres' => $basicInfo['genres'],
                            'styles' => $basicInfo['styles'],
                            'rating' => $releaseData['rating'],
                            'notes' => $this->getNotes($releaseData),
                        ]
                    );
                    $this->info("Imported release: {$basicInfo['title']}");
                }
                $page = $data['pagination']['page'] + 1;
            } else {
                $this->error("Failed to fetch releases. Status: {$response->status()}");
                break;
            }
        } while ($data['pagination']['page'] < $data['pagination']['pages']);

        $this->info("Releases import complete.");
        return Command::SUCCESS;
    }

    private function getNotes(array $releaseData): ?string
    {
        return $releaseData['notes'][0]['value'] ?? null;
    }
}
