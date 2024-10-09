<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Book extends Model
{

    protected $guarded = [];

    public function categories(): MorphMany
    {
        return $this->morphMany(Category::class, 'object');
    }
}
