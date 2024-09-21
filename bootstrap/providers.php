<?php

use GrahamCampbell\Markdown\MarkdownServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\Filament\VorpalPanelProvider::class,
    MarkdownServiceProvider::class,
];
