<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\Comments\Models\Concerns\HasComments;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Spatie\Tags\HasTags;

class Post extends Model implements Sortable, Feedable
{
    use HasComments;
    use HasTags;
    use SortableTrait;
    use HasSEO;

    protected $casts = [
      'content' => 'array',
      'related_posts' => 'array'
    ];

    protected $guarded = [];


    public function categories(): MorphToMany
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    public function author() : BelongsTo
    {
        // return $this->belongsToMany('Category::class');
        return $this->belongsTo(User::class);
    }

    public function project() : BelongsTo
    {
        return $this->belongsTo(PostProject::class);
    }

    public function series() : BelongsTo
    {
        return $this->belongsTo(PostSeries::class);
    }

    function posts() : BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    function post() : BelongsToMany
    {
        // return $this->belongsToMany(Post::class);
        return $this->belongsToMany(Post::class, 'id');
    }

    function related() : BelongsToMany{
        // return $this->belongsToMany(Post::class);
        return $this->BelongsToMany(Post::class, 'related_id');
    }

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];

    public function commentableName() : string
    {
        return $this->title;
    }

    public function commentUrl() : string
    {
        return route('posts.show', $this->slug);
    }

    public function getDynamicSEOData(): SEOData
    {
        return new SEOData(
            title: $this->title,
            description: $this->summary,
            author: $this->author->name,
        );
    }

    public function toFeedItem() : FeedItem
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary($this->summary)
            ->updated($this->updated_at)
            ->link($this->commentUrl())
            // TODO: Move this to config
            ->authorName('Chrispian H. Burks')
            ->authorEmail('chrispian@gmail.com');
    }

    public static function getAllFeedItems()
    {
        return Post::all();
    }
}
