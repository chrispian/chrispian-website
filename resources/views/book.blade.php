@php
    use App\Models\Post;
    use League\CommonMark\Environment\Environment;
    use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
    use League\CommonMark\MarkdownConverter;use Torchlight\Commonmark\V2\TorchlightExtension;


//    $is_draft = false;
//    if (in_array('Draft', $post->category->pluck('title')->toArray())) {
//        $is_draft = true;
//    }


@endphp
@extends('layouts.app')

@section('content')

    <!-- component -->

    <div class="overflow-x-hidden">
        @include('layouts.nav')


        <!-- Component Start -->
        <!-- component -->
        <section class="mb-12 relative flex flex-col justify-center bg-[#1c1d1f] overflow-hidden w-full">
            <div class="w-full lg:w-[80%] 2xl:w-[60%]  mx-auto justify-center">
                <div class="flex flex-col justify-center divide-y divide-slate-200 [&>*]:py-1">

                    <div class="w-full mx-auto">

                        <!-- Vertical Timeline #1 -->
                        <div class="w-full">

                            <!-- Post {{ $post->id }} -->
                            <div class="relative px-4 sm:px-4 md:px-6 lg:pl-32 py-6 group">
                                <!-- Purple label -->
                                <div class="font-medium text-neutral-500 mb-1 sm:mb-0">
{{--                                    {{ $post->category[0]->title ?? null }}--}}
                                </div>
                                <!-- Vertical line (::before) ~ Date ~ Title ~ Circle marker (::after) -->
                                <div class="
                                            flex
                                            flex-col
                                            items-start
                                            mb-1
                                            after:absolute
                                            after:left-2
                                            after:w-0
                                            after:h-0
                                            after:bg-neutral-600
                                            after:border-0
                                            sm:after:border-0
                                            lg:after:border-2

                                            after:box-content
                                            after:border-neutral-600
                                            after:rounded-full
                                            after:-translate-x-1/2
                                            after:translate-y-1.5
                                            sm:flex-row
                                            sm:p-0
                                            sm:m-0
                                            sm:before:left-0
                                            sm:before:ml-[6.5rem]
                                            sm:after:left-0
                                            sm:after:ml-[6.5rem]
                                            md:p2
                                            md:m-2
                                            md:after:w-2
                                            md:after:h-2

                                            group-last:before:hidden
                                            sm:group-last:before:hidden
                                            lg:group-last:before:inline-block

                                            before:absolute
                                            before:left-2
                                            before:h-full
                                            before:px-px
                                            before:bg-neutral-600
                                            before:self-start
                                            before:-translate-x-1/2
                                            before:translate-y-3



                                            ">
                                    <time class="sm:absolute left-0 translate-y-0.5 inline-flex items-center justify-center text-xs font-semibold uppercase w-20 h-6 mb-3 sm:mb-0 text-neutral-600">
                                        {{ $post->created_at->format('Y-m-d') }}
                                    </time>
                                    <div class="text-xl font-bold text-[#8cfbe6]">
                                        {{ $post->title }}
                                    </div>

                                </div>
                                <!-- Content -->
                                <div class="text-neutral-300 post-body">
                                    <style>
                                        p {
                                            margin-bottom: 1rem;
                                        }
                                    </style>

                                    <x-markdown>
                                        {!! $post->content !!}
                                    </x-markdown>




{{--                                    @if($is_draft)--}}
{{--                                        <x-draft-disclaimer />--}}
{{--                                    @endif--}}

                                </div>

                            </div>


                        </div>
                        <!-- End: Vertical Timeline #1 -->

                        <livewire:comments :model="$post"/>

                    </div>


                </div>
            </div>
        </section>

        @include('layouts.footer')
    </div>

@endsection




