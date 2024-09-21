<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TimelineItem extends Component
{

    public function __construct(
        public string $title,
    ) {}



    public function render() : View
    {
        return view( 'components.timeline-item' );
    }
}
