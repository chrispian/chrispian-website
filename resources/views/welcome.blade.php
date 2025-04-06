@php use App\Models\Book;use App\Models\Post; @endphp
@extends('layouts.app')

@section('content')

    <!-- component -->

    <div class="overflow-x-hidden">
        @include('layouts.nav')


        <section class="overflow-hidden pt-4 sm:w-full xl:w-11/12 mx-auto">
            <div class="px-4 mx-auto sm:px-6 lg:px-8 w-full">
                <div class="grid items-center grid-cols-1 md:grid-cols-2 w-full 2xl:w-7/12 mx-auto">

                    <div class="mt-8">
                        <h2 class="text-3xl font-bold leading-tight text-black dark:text-white sm:text-4xl lg:text-5xl">
                            Hi 🤟 I'm
                            <br class="block sm:hidden"/>Chrispian Burks
                        </h2>
                        <p class="max-w-lg mt-3 text-xl leading-relaxed text-gray-600 dark:text-gray-300 md:mt-8">
                            I am a software engineer, writer, and creator. I write about software development, productivity, and life. I am passionate about learning and sharing knowledge. I am always looking for new opportunities to grow and learn.
                        </p>


                        <p class="max-w-lg mt-3 text-xl leading-relaxed text-gray-600 dark:text-gray-300 md:mt-8">
                            Want to know about who I am and what I do? Then head over to my <a href="/about" class="uppercase text-sm text-orange-700 underline">about me</a> page for details.
                        </p>

                    </div>

                    <div class="relative mb-[30px] hidden sm:hidden md:block">
                        <img class="shadow-[0px_0px_15px_10px_#8cfbe6] rounded-full relative xl:mx-auto" src="https://secure.gravatar.com/avatar/e1948f61edff58e92f1e38e69cfc8eda?s=400&amp;d=mm&amp;r=g" alt="Profile Picture of Chrispian, wearing a heat and throwing up the rock symbol"/>
                    </div>


                </div>
            </div>
        </section>

        <!-- Component Start -->
        <!-- component -->
        <section class="mb-12 mt-12 relative flex flex-col bg-[#1c1d1f] overflow-hidden">
            <div class="mx-auto px-4 md:px-6">
                <div class="flex flex-col justify-center divide-y divide-slate-200 [&>*]:py-1">

                    <div class="mx-auto w-full 2xl:w-[60%]">

                        <!-- Vertical Timeline #1 -->
                        <div>

                            <?php
                            // TODO: Add status check here
                            $posts = Post::with( 'categories' )->orderBy( 'created_at', 'desc' )->take( 4 )->get();
                            ?>

                            @foreach ($posts as $post)
                                @component('components.timeline-item', ['post' => $post]) @endcomponent
                            @endforeach


                        </div>
                        <!-- End: Vertical Timeline #1 -->


                        <!-- Vertical Timeline #1 -->
                        <div class="mt-12">
                            <h3 class="relative pl-8 sm:pl-32 py-8 pt-0 ">Recently Finished Books</h3>
                            <?php
                            // TODO: Add status check here
                            $books = Book::with( 'category' )->where('date_read', '>', 0)->orderBy( 'date_read', 'desc' )->take( 4 )->get();
                            ?>

                            @foreach ($books as $book)
                                @component('components.book-timeline-item', ['book' => $book]) @endcomponent
                            @endforeach


                        </div>
                        <!-- End: Vertical Timeline #1 -->


                    </div>

                </div>
            </div>
        </section>


        @include('layouts.footer')
    </div>
@endsection
