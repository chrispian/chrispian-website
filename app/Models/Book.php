<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\Comments\Models\Concerns\HasComments;

class Book extends Model
{

    use HasComments;

    protected $guarded = [];

    public function categories(): MorphMany
    {
        return $this->morphMany(Category::class, 'object');
    }

    public function category(): MorphMany
    {
        return $this->morphMany(Category::class, 'object');
    }
    public function commentableName() : string
    {
        return $this->title;
    }

    public function commentUrl() : string
    {
        return route('posts.show', $this->slug);
    }

}
