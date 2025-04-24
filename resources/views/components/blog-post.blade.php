<article class="relative isolate p-6 flex flex-col gap-8 lg:flex-row h-[260px] bg-black/25 rounded-lg">

    <div class="relative aspect-video sm:aspect-2/1 lg:aspect-square lg:w-64 lg:shrink-0">
        <figure class="h-[200px] overflow-hidden relative size-full rounded-2xl bg-gray-50 object-cover">
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
                    class="object-cover"
                    width="540"
                    height="300"
                    loading="lazy"
                />
            @endif


        </figure>
    </div>

    <div>
        <div class="flex items-center gap-x-4 text-xs">
            <time datetime="2020-03-16" class="text-gray-500">{{ $post->created_at->format('Y-m-d') }}</time>
            <ul class="flex flex-wrap text-xs font-medium -m-1">
                @foreach($post->categories as $category)
                    <li class="m-1">
                        <span class="inline-flex text-center text-gray-100 py-1 px-3 rounded-full bg-blue-500 hover:bg-blue-600 transition duration-150 ease-in-out" href="#0">{{ $category->title }}</span>
                    </li>
                @endforeach
            </ul>

        </div>
        <div class="group relative max-w-xl">
            <h3 class="mt-3 transition duration-150 ease-in-out uppercase text-sm text-orange-700">
                <a href="{{ route('posts.show', ['slug' => $post->slug]) }}">
                    <span class="absolute inset-0"></span>
                    {{ $post->title }}
                </a>
            </h3>
            <p class="mt-5 text-sm/6 text-gray-600">
                {{ Str::limit($post->summary, 200) }}
                [<a class="uppercase text-sm text-orange-700 underline" href="{{ route('posts.show', ['slug' => $post->slug]) }}">read more</a>]
            </p>
        </div>
    </div>
</article>
