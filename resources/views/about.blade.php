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
                            I am a software engineer, writer, and creator. I write about software development, productivity, and life. I am passionate about learning and sharing knowledge. I am always looking for new opportunities to grow and learn.
                        </p>

                        <p class="mt-3 text-xl leading-relaxed text-gray-600 dark:text-gray-300 md:mt-8">
                            My name is Chrispian and I like to make things. I’m a web developer and have been working in the computer / internet field for almost 26 years now. I also draw, write, make things, take pictures and love figuring stuff out.
                        </p>
                        <p class="mt-3 text-xl leading-relaxed text-gray-600 dark:text-gray-300 md:mt-8">
                            I started out in the BBS days and dabbled in programming, hardware, networking and just about anything computer related. My first job in the field was as a PC Tech where we repaired computers, did corporate installs, ran networks and set them up and everything related to PCs. A couple of years into my career the web was born and I learned some basic HTML from a friend and that was it! I started learning about web servers, web development and anything and everything related to how it all worked.
                        </p>
                        <p class="mt-3 text-xl leading-relaxed text-gray-600 dark:text-gray-300 md:mt-8">
                            Since then I’ve started an ISP, ran a Blog Network, freelanced, was Lead Developer at a local ISP and then Development Manager at my last job. I recently took a small step back to give myself a chance to get caught back up on more modern style web dev and now I’m on a path to become a senior / lead engineer.
                        </p>
                        <p class="mt-3 text-xl leading-relaxed text-gray-600 dark:text-gray-300 md:mt-8">
                            In my spare time I like to write, read, create content for pen & paper role playing games, listen to music and dabble in photography. My wife and I also have our own small brand where we make custom leather goods over at Makers South so make sure to check that out!
                        </p>

                    </div>

                </div>
            </div>
        </section>

       @include('layouts.footer')
    </div>
@endsection
