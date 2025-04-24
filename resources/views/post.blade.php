@php
    use App\Models\Post;
    use League\CommonMark\Environment\Environment;
    use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
    use League\CommonMark\MarkdownConverter;use Torchlight\Commonmark\V2\TorchlightExtension;


    $is_draft = false;
    if ($post->categories->pluck('title')->contains('Draft')) {
        $is_draft = true;
    }




@endphp
@extends('layouts.app')

@section('content')

    <!-- component -->

    <div class="overflow-x-hidden">
        @include('layouts.nav')


        <!-- Component Start -->

        <div class>
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-4xl">

                    <div class="space-y-8 lg:mt-2 lg:space-y-8 w-full">

                        <article class="w-full relative isolate p-6 flex flex-col gap-8 lg:flex-row  bg-black/25 rounded-lg">
                            <div class="">
                                <h3 class="text-2xl font-bold text-[#8cfbe6] mb-4" >
                                    <a href="{{ route('posts.show', ['slug' => $post->slug]) }}">
                                        {{ $post->title }}
                                    </a>
                                </h3>

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
                                <div class="group relative m-full">
                                    <div class="float-right aspect-video sm:aspect-2/1 lg:aspect-square lg:w-64 lg:shrink-0">
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

                                    <p class="mt-5 text-sm/6 text-gray-600">
                                        <x-markdown class="markdown" :options="['commonmark' => ['enable_strong' => true, 'enable_em' => true]]">
                                            {!! $post->content !!}
                                        </x-markdown>

                                        @if($is_draft)
                                            <x-draft-disclaimer />
                                        @endif


                                    </p>
                                </div>
                            </div>
                        </article>


                        <livewire:comments :model="$post"/>


                    </div>
                </div>
            </div>
        </div>




        <section class="mb-12 relative flex flex-col justify-center bg-[#1c1d1f] overflow-hidden w-full">
            <div class="w-full lg:w-[80%] 2xl:w-[60%]  mx-auto justify-center">
                <div class="flex flex-col justify-center divide-y divide-slate-200 [&>*]:py-1">

                    <div class="w-full mx-auto">




                    </div>


                </div>
            </div>
        </section>

        @include('layouts.footer')
    </div>

@endsection
