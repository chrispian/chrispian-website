@php
    use App\Models\Post;

@endphp
@extends('layouts.app')

@section('content')


    <!-- component -->

    <div class="overflow-x-hidden">
        @include('layouts.nav')
        <!-- Component Start -->
    <section class="relative flex flex-col justify-center bg-[#1c1d1f] overflow-hidden">
        <h2 class="ml-6 lg:ml-48 2xl:ml-96 text-4xl text-orange-700">Blog Posts</h2>
        <div class="w-full max-w-6xl mx-auto px-4 md:px-6 py-12">

            <div class="flex flex-col justify-center divide-y divide-slate-200 [&>*]:py-1">


                <div class="w-full max-w-3xl mx-auto">

                    <!-- Vertical Timeline #1 -->
                    <div class="-my-6">

                        @foreach ($posts as $post)
                            @component('components.timeline-item', ['post' => $post]) @endcomponent
                        @endforeach

                        <div class="flex mt-6 justify-end">
                        {{ $posts->links() }}
                        </div>


                    </div>
                    <!-- End: Vertical Timeline #1 -->

                </div>

            </div>
        </div>
    </section>


        @include('layouts.footer')
    </div>
@endsection



