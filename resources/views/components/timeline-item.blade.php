<!-- Item #1 -->
<div class="relative pl-8 sm:pl-32 py-6 group">
	<!-- Purple label -->
	<div class="font-medium text-neutral-500 mb-1 sm:mb-0">
        {{ $post->category[0]->title ?? 'Uncategorized' }}
    </div>
	<!-- Vertical line (::before) ~ Date ~ Title ~ Circle marker (::after) -->
	<div class="flex flex-col sm:flex-row items-start mb-1 group-last:before:hidden before:absolute before:left-2 sm:before:left-0 before:h-full before:px-px before:bg-neutral-600 sm:before:ml-[6.5rem] before:self-start before:-translate-x-1/2 before:translate-y-3 after:absolute after:left-2 sm:after:left-0 after:w-2 after:h-2 after:bg-neutral-600 after:border-2 after:box-content after:border-neutral-600 after:rounded-full sm:after:ml-[6.5rem] after:-translate-x-1/2 after:translate-y-1.5">
		<time class="sm:absolute left-0 translate-y-0.5 inline-flex items-center justify-center text-xs font-semibold uppercase w-20 h-6 mb-3 sm:mb-0 text-neutral-600">
            {{ $post->created_at->format('Y-m-d') }}
		</time>
		<div class="text-xl font-bold text-[#8cfbe6]">
            {{ $post->title }}
		</div>

	</div>
	<!-- Content -->
	<div class="text-neutral-300">
		{{ Str::limit($post->summary, 200) }}
        [<a class="uppercase text-sm text-orange-700 underline" href="{{ route('posts.show', ['slug' => $post->slug]) }}">read more</a>]

        @if(in_array('Draft', $post->category->pluck('title')->toArray()))
            <x-draft-disclaimer />
        @endif


    </div>

</div>
