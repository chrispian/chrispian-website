<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Release extends Model
{

    protected $guarded = [];
    protected $casts = [
        'formats' => 'array',
        'labels' => 'array',
        'artists' => 'array',
        'genres' => 'array',
        'styles' => 'array',
    ];

    public function folder()
    {
        return $this->morphTo(Category::class);
    }
}
