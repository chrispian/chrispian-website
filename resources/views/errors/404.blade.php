@php use App\Models\Post; @endphp
@extends('layouts.app')

@section('content')


    <!-- component -->

    <div class="overflow-x-hidden content-center">



        <!-- component -->
        <!-- This is an example component -->
        <div class="error_404 w-2/3 mx-auto flex items-center content-center">
            <div class="w-full flex flex-col md:flex-row items-center justify-center px-5 text-gray-700">
                <div class="max-w-md">
                    <div class="text-5xl text-[#8cfbe6] font-bold">404</div>
                    <p class="text-2xl md:text-3xl font-light text-orange-700">
                        Sorry we couldn't find this page.
                    </p>
                    <p class="mb-8 text-neutral-400">
                        But dont worry, not all who wander are lost.
                    </p>

                    <button x-data @click="window.location.href='{{ url('/') }}'" class="animate-pulse shadow-[0px_0px_15px_10px_#8cfbe6] px-4 inline py-2 text-5xl font-bold uppercase text-yellow-900 transition-colors duration-150 rounded-lg focus:outline-none focus:shadow-outline-blue bg-[#8cfbe6]">
                        HOME
                    </button>

                </div>
                <div class="max-w-lg">

                    <img class="shadow-[0px_0px_15px_10px_#8cfbe6] rounded-full items-center content-center place-content-center justify-center center justify-self-center w-[150px] mx-auto" src="http://chrispian.com/storage/media/a7e4d93d-9dc5-4364-8d7e-7de5589d6c95.jpg" alt="Young kid climbing through a doggie door making a face to be funny." />
                </div>

            </div>
        </div>


    </div>
@endsection



