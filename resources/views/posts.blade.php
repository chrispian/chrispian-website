@php
    use App\Models\Post;

@endphp
@extends('layouts.app')

@section('content')


    <!-- component -->



    <div class="overflow-x-hidden">
        @include('layouts.nav')
        <!-- Component Start -->

        <div class="bg-black/10 mx-8 py-4">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:max-w-4xl">
                    <h2 class="text-2xl font-bold tracking-tight text-pretty sm:text-5xl">Articles</h2>
                    <p class="mt-2 text-lg/8 text-gray-600">I write to think.</p>

                    <div class="space-y-8 lg:mt-2 lg:space-y-8">
                        @foreach ($posts as $post)
                            @component('components.blog-post', ['post' => $post]) @endcomponent
                        @endforeach

                        <div class="flex mt-6 justify-end">
                            {{ $posts->links() }}
                        </div>


                    </div>
                </div>
            </div>
        </div>





        @include('layouts.footer')
    </div>
@endsection
