@php use App\Models\Post; @endphp
@extends('layouts.app')

@section('content')


    <!-- component -->

    <div class="overflow-x-hidden">
        @include('layouts.nav')


        <section class="overflow-hidden w-full">
            <div class="px-4 w-full mx-auto">
                <div class="grid items-center grid-cols-1 w-3/4 mx-auto">

                    <div class="mt-8 w-full">
                        <img class="float-right ml-[250px] shadow-[0px_0px_15px_10px_#8cfbe6] rounded-full relative" src="https://secure.gravatar.com/avatar/e1948f61edff58e92f1e38e69cfc8eda?s=250&amp;d=mm&amp;r=g" alt="Profile Picture of Chrispian, wearing a heat and throwing up the rock symbol" />
                        <h2 class="text-3xl font-bold leading-tight text-black dark:text-white sm:text-4xl lg:text-5xl">
                            Hey ⚡ I am
                            <br class="block sm:hidden" />Chrispian Burks
                        </h2>
                        <p class="max-w-lg mt-3 text-xl leading-relaxed text-gray-600 dark:text-gray-300 md:mt-8">
                            ⚡ I am a software engineer, writer, and creator. I write about software development, productivity, and life. I am passionate about learning and sharing knowledge. I am always looking for new opportunities to grow and learn.
                        </p>

                        <p class="max-w-lg mt-3 text-xl leading-relaxed text-gray-600 dark:text-gray-300 md:mt-8">
                            My name is Chrispian and I like to make things. I’m a web developer and have been working in the computer / internet field for almost 26 years now. I also draw, write, make things, take pictures and love figuring stuff out.
                        </p>
                        <p class="max-w-lg mt-3 text-xl leading-relaxed text-gray-600 dark:text-gray-300 md:mt-8">
                            I started out in the BBS days and dabbled in programming, hardware, networking and just about anything computer related. My first job in the field was as a PC Tech where we repaired computers, did corporate installs, ran networks and set them up and everything related to PCs. A couple of years into my career the web was born and I learned some basic HTML from a friend and that was it! I started learning about web servers, web development and anything and everything related to how it all worked.
                        </p>
                        <p class="max-w-lg mt-3 text-xl leading-relaxed text-gray-600 dark:text-gray-300 md:mt-8">
                            Since then I’ve started an ISP, ran a Blog Network, freelanced, was Lead Developer at a local ISP and then Development Manager at my last job. I recently took a small step back to give myself a chance to get caught back up on more modern style web dev and now I’m on a path to become a senior / lead engineer.
                        </p>
                        <p class="max-w-lg mt-3 text-xl leading-relaxed text-gray-600 dark:text-gray-300 md:mt-8">
                            In my spare time I like to write, read, create content for pen & paper role playing games, listen to music and dabble in photography. My wife and I also have our own small brand where we make custom leather goods over at Makers South so make sure to check that out!
                        </p>

                    </div>

                </div>
            </div>
        </section>





        <!-- Component Start -->
        <!-- component -->
        <section class="relative min-h-screen flex flex-col justify-center bg-[#1c1d1f] overflow-hidden">
            <div class="w-full max-w-6xl mx-auto px-4 md:px-6 py-12">
                <div class="flex flex-col justify-center divide-y divide-slate-200 [&>*]:py-1">

                    <div class="w-full max-w-3xl mx-auto">





                    </div>

                </div>
            </div>
        </section>


        @include('layouts.footer')
    </div>
@endsection
