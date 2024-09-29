<nav class="px-6 py-4" x-data="{ open: false }">
    <div class="container flex flex-col mx-auto md:flex-row md:items-center md:justify-between">
        <div class="flex items-center justify-between">
            <div>
                <a href="/" class="text-xl font-bold md:text-2xl">Chrispian H. Burks</a>
            </div>
            <div>
                <!-- Hamburger menu button with toggle -->
                <button
                    @click="open = !open"
                    class="block hover:text-gray-600 focus:text-gray-600 focus:outline-none md:hidden"
                >
                    <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                        <path d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <!-- Mobile menu links -->
        <div
            :class="{ 'hidden': !open, 'block': open }"
            class="flex-col mt-2 space-y-2 md:hidden place-content-end"
        >
            <a href="/" class="block my-1 hover:text-blue-500">Home</a>
            <a href="/blog" class="block my-1 hover:text-blue-500">Blog</a>
            <a href="/about" class="block my-1 hover:text-blue-500">About Me</a>
        </div>
        <!-- Desktop menu links -->
        <div class="hidden md:flex md:flex-row md:-mx-4">
            <a href="/" class="my-1 hover:text-blue-500 md:mx-4 md:my-0">Home</a>
            <a href="/blog" class="my-1 hover:text-blue-500 md:mx-4 md:my-0">Blog</a>
            <a href="/about" class="my-1 hover:text-blue-500 md:mx-4 md:my-0">About Me</a>
        </div>
    </div>
</nav>
