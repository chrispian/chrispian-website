<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use RalphJSmit\Laravel\SEO\Facades\SEOManager;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        SEOManager::SEODataTransformer(function (SEOData $SEOData): SEOData {


            // TODO: Add home/about page summary/description


            // TODO: Extract this to a config file or something
            $tagline = 'Tagline Here';

            if (request()->path() === '/') {
                $SEOData->title = 'Chrispian.com - ' . $tagline;
            } else {
                $SEOData->title = $SEOData->title . ' - ' . 'Chrispian.com';
            }

            // This will change the title on *EVERY* page. Do any logic you want here, e.g. based on the current request.
            if (pathinfo(request()->path(), PATHINFO_FILENAME) === 'about') {
                $SEOData->title = 'About Me - Chrispian.com';
            }


            return $SEOData;
        });
    }
}
