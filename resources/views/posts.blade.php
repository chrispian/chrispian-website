@php use App\Models\Post; @endphp
@extends('layouts.app')

@section('content')


    <!-- component -->

    <div class="overflow-x-hidden">
        @include('layouts.nav')
        <!-- Component Start -->
    <section class="relative min-h-screen flex flex-col justify-center bg-[#1c1d1f] overflow-hidden">
        <div class="w-full max-w-6xl mx-auto px-4 md:px-6 py-12">
            <div class="flex flex-col justify-center divide-y divide-slate-200 [&>*]:py-1">

                <div class="w-full max-w-3xl mx-auto">

                    <!-- Vertical Timeline #1 -->
                    <div class="-my-6">

                        <?php
                        //$posts = Post::take( 10 )->orderBy( 'created_at', 'desc' )->get();
                        $posts = Post::simplePaginate( 10 );

                        ?>

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



