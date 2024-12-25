<nav class="bg-blue-100">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="shrink-0">
                    <img class="size-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <x-navbar.link href="/" class="hover:bg-white hover:text-black">Home</x-navbar.link>
                        <x-navbar.link href="/about" class="hover:bg-white hover:text-black">About</x-navbar.link>
                        <x-navbar.link href="/contact" class="hover:bg-white hover:text-black">Contacts</x-navbar.link>
                        <x-navbar.link href="/gallery" class="hover:bg-white hover:text-black">Gallery</x-navbar.link>
                    </div>
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-blue-100 p-2 text-blue-500 hover:bg-white hover:text-black focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-offset-2 focus:ring-offset-blue-100" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <x-navbar.dropdown-item href="/" class="hover:bg-white hover:text-black">Home</x-navbar.dropdown-item>
            <x-navbar.dropdown-item href="/about" class="hover:bg-white hover:text-black">About</x-navbar.dropdown-item>
            <x-navbar.dropdown-item href="/contact" class="hover:bg-white hover:text-black">Contact</x-navbar.dropdown-item>
            <x-navbar.dropdown-item href="/gallery" class="hover:bg-white hover:text-black">Gallery</x-navbar.dropdown-item>
        </div>
    </div>
</nav>
