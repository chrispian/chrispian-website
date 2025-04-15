@php use App\Models\Post; @endphp
@extends('layouts.app')

@section('content')


    <!-- component -->

    <div class="overflow-x-hidden">
        @include('layouts.nav')


        <section class="overflow-hidden w-full mb-12">
            <div class="px-4 w-full mx-auto">
                <div class="grid items-center grid-cols-1 sm:w-full lg:w-6/12 mx-auto">
                    <div class="shadow-[0px_0px_15px_10px_#8cfbe6] mt-8 rounded-full items-center content-center place-content-center justify-center center justify-self-center w-[150px] mx-auto"/>
                        <img class="rounded-full items-center content-center place-content-center justify-center center justify-self-center w-[150px] mx-auto" src="https://secure.gravatar.com/avatar/e1948f61edff58e92f1e38e69cfc8eda?s=500&amp;d=mm&amp;r=g" alt="Profile Picture of Chrispian, wearing a heat and throwing up the rock symbol" />
                    </div>
                    <div class="mt-8 w-full">

                        <h2 class="mx-auto w-6/12 sm:w-full text-center text-2xl sm:text-1xl font-bold leading-tight text-black dark:text-white">
                            ⚡ About Me
                        </h2>
                        <p class="mt-3 text-xl leading-relaxed text-gray-600 dark:text-gray-300 md:mt-8">
                            Hi, I'm Chrispian—a lifelong maker, curious technologist, and storyteller at heart.
                        </p>

                        <p class="mt-3 text-xl leading-relaxed text-gray-600 dark:text-gray-300 md:mt-8">
                            For over 25 years, I've navigated the evolving landscapes of the internet—from the days of BBS and dial-up to today's dynamic web. My journey began as a PC technician, delving into hardware and networking, and evolved into a deep passion for web development. Along the way, I've worn many hats: ISP founder, blog network runner, lead developer, and development manager. Each role has been a chapter in my ongoing story of exploration and creation.
                        </p>

                        <p class="mt-3 text-xl leading-relaxed text-gray-600 dark:text-gray-300 md:mt-8">
                            But my interests extend beyond code. I'm a writer, illustrator, photographer, and tabletop RPG enthusiast. I believe in the power of storytelling—whether through a well-crafted article, a compelling game narrative, or a striking photograph.
                        </p>

                        <p class="mt-3 text-xl leading-relaxed text-gray-600 dark:text-gray-300 md:mt-8">
                            Together with my wife, I co-founded Makers South, where we handcraft custom leather goods. It's a tangible extension of our shared commitment to quality, creativity, and craftsmanship.
                        </p>

                        <p class="mt-3 text-xl leading-relaxed text-gray-600 dark:text-gray-300 md:mt-8">
                            This site is a reflection of my eclectic pursuits—a space where technology meets art, and where ideas are free to roam. I invite you to explore, connect, and join me on this ever-evolving journey.
                        </p>

                    </div>

                </div>
        </section>

       @include('layouts.footer')
    </div>
@endsection
