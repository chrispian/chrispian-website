<!-- Snippet -->
<section class="flex flex-col justify-center antialiased bg-[#242628] text-gray-200">
    <div class="max-w-6xl mx-auto p-4 sm:px-6 h-full mt-4 mb-4">
        <!-- Blog post -->
        <article class="max-w-sm mx-auto md:max-w-none grid md:grid-cols-2 gap-6 md:gap-8 lg:gap-12 xl:gap-16 items-center">
            <a class="relative block group" href="#0">
                <div class="absolute inset-0 bg-[#3d3f43] hidden md:block transform md:translate-y-2 md:translate-x-4 xl:translate-y-4 xl:translate-x-8 group-hover:translate-x-0 group-hover:translate-y-0 transition duration-700 ease-out pointer-events-none" aria-hidden="true"></div>
                <figure class="relative h-0 pb-[56.25%] md:pb-[75%] lg:pb-[56.25%] overflow-hidden transform md:-translate-y-2 xl:-translate-y-4 group-hover:translate-x-0 group-hover:translate-y-0 transition duration-700 ease-out">
                    @php
                        $media = $post->getFirstMedia('cover_image');
                    @endphp

                    @if ($media)
                        <img
                            src="{{ $media->getUrl('thumb') }}"
                            srcset="
                            {{ $media->getUrl('thumb') }} 300w,
                            {{ $media->getUrl('medium') }} 540w,
                            {{ $media->getUrl('large') }} 1024w
        "
                            sizes="(max-width: 600px) 300px, (max-width: 1024px) 540px, 1024px"
                            alt="{{ $post->title }} cover image"
                            role="img"
                            class="absolute inset-0 w-full h-full object-cover transform hover:scale-105 transition duration-700 ease-out"
                            width="540"
                            height="300"
                            loading="lazy"
                        />
{{--                    @else--}}
{{--                        <img--}}
{{--                            src="/images/fallback.jpg"--}}
{{--                            alt="Placeholder cover image"--}}
{{--                            class="absolute inset-0 w-full h-full object-cover"--}}
{{--                            width="540"--}}
{{--                            height="300"--}}
{{--                            loading="lazy"--}}
{{--                        />--}}
                    @endif


                </figure>
            </a>
            <div>
                <header>
                    <div class="mb-3">
                        <ul class="flex flex-wrap text-xs font-medium -m-1">
                            @foreach($post->categories as $category)
                                <li class="m-1">
                                    <span class="inline-flex text-center text-gray-100 py-1 px-3 rounded-full bg-blue-500 hover:bg-blue-600 transition duration-150 ease-in-out" href="#0">{{ $category->title }}</span>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                    <h3 class="text-2xl lg:text-3xl font-bold leading-tight mb-2">
                        <a class="hover:text-gray-100 transition duration-150 ease-in-out uppercase text-sm text-orange-700 underline" href="{{ route('posts.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                    </h3>
                </header>
                <p class="text-lg text-gray-400 flex-grow">
                    {{ Str::limit($post->summary, 200) }}
                    [<a class="uppercase text-sm text-orange-700 underline" href="{{ route('posts.show', ['slug' => $post->slug]) }}">read more</a>]
                </p>
                <footer class="flex items-center mt-4">
                    <a href="/about">
                        <img class="rounded-full flex-shrink-0 mr-4" src="https://secure.gravatar.com/avatar/e1948f61edff58e92f1e38e69cfc8eda?s=400&amp;d=mm&amp;r=g" width="40" height="40" alt="Profile Picture of Chrispian, wearing a heat and throwing up the rock symbol.">
                    </a>
                    <div>
                        <a href="/about" class="font-medium text-gray-200 hover:text-gray-100 transition duration-150 ease-in-out">{{ $post->author->name }}</a>
                        <span class="text-gray-700"> - </span>
                        <span class="text-gray-500">{{ $post->created_at->format('Y-m-d') }}</span>
                    </div>
                </footer>
            </div>
        </article>
    </div>
</section>






{{--<!-- Item #1 -->--}}
{{--<div class="relative pl-8 sm:pl-32 py-8 pt-0 group">--}}
{{--	<!-- Purple label -->--}}
{{--	<div class="font-medium text-neutral-500 mb-1 sm:mb-0">--}}
{{--        @foreach($post->categories as $category)--}}
{{--            <span class="text-sm text-gray-600">{{ $category->title }}</span>@if(!$loop->last), @endif--}}
{{--        @endforeach--}}

{{--    </div>--}}
{{--	<!-- Vertical line (::before) ~ Date ~ Title ~ Circle marker (::after) -->--}}
{{--    <div class="--}}
{{--            flex--}}
{{--            flex-col--}}
{{--            items-start--}}
{{--            mb-1--}}
{{--            after:absolute--}}
{{--            after:left-2--}}
{{--            after:w-0--}}
{{--            after:h-0--}}
{{--            after:bg-neutral-600--}}
{{--            after:border-0--}}
{{--            sm:after:border-0--}}
{{--            lg:after:border-2--}}

{{--            after:box-content--}}
{{--            after:border-neutral-600--}}
{{--            after:rounded-full--}}
{{--            after:-translate-x-1/2--}}
{{--            after:translate-y-1.5--}}
{{--            sm:flex-row--}}
{{--            sm:p-0--}}
{{--            sm:m-0--}}
{{--            sm:before:left-0--}}
{{--            sm:before:ml-[6.5rem]--}}
{{--            sm:after:left-0--}}
{{--            sm:after:ml-[6.5rem]--}}
{{--            md:p2--}}
{{--            md:m-2--}}
{{--            md:after:w-2--}}
{{--            md:after:h-2--}}

{{--            group-last:before:hidden--}}
{{--            sm:group-last:before:hidden--}}
{{--            lg:group-last:before:inline-block--}}

{{--            before:absolute--}}
{{--            before:left-2--}}
{{--            before:h-full--}}
{{--            before:px-px--}}
{{--            before:bg-neutral-600--}}
{{--            before:self-start--}}
{{--            before:-translate-x-1/2--}}
{{--            before:translate-y-3--}}



{{--            ">--}}
{{--        <time class="sm:absolute left-0 translate-y-0.5 inline-flex items-center justify-center text-xs font-semibold uppercase w-20 h-6 mb-3 sm:mb-0 text-neutral-600">--}}
{{--            {{ $post->created_at->format('Y-m-d') }}--}}
{{--        </time>--}}
{{--        <div class="text-xl font-bold text-[#8cfbe6]">--}}
{{--            {{ $post->title }}--}}
{{--        </div>--}}

{{--	</div>--}}
{{--	<!-- Content -->--}}
{{--	<div class="text-neutral-300">--}}
{{--		{{ Str::limit($post->summary, 200) }}--}}
{{--        [<a class="uppercase text-sm text-orange-700 underline" href="{{ route('posts.show', ['slug' => $post->slug]) }}">read more</a>]--}}


{{--        @if(in_array('Draft', $post->category->pluck('title')->toArray()))--}}
{{--            <x-draft-disclaimer />--}}
{{--        @endif--}}


{{--    </div>--}}

{{--</div>--}}
