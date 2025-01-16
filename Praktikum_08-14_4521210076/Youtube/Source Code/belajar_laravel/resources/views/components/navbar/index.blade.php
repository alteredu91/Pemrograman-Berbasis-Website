<nav class="bg-blue-100">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="shrink-0">
                    <img class="size-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        {{-- Public Navigation Links --}}
                        <x-navbar.link href="/" route="home">Home</x-navbar.link>
                        <x-navbar.link href="/about" route="about">About</x-navbar.link>
                        <x-navbar.link href="/contact" route="contact">Contacts</x-navbar.link>
                        <x-navbar.link href="/gallery" route="gallery">Gallery</x-navbar.link>
                        
                        {{-- Protected Navigation Links --}}
                        @auth
                            <x-navbar.link href="/users" route="users.*">Users</x-navbar.link>
                        @endauth
                    </div>
                </div>
            </div>

            {{-- Authentication Links --}}
            <div class="hidden md:block">
                <div class="flex items-center space-x-4">
                    @guest
                        <x-navbar.link href="{{ route('login') }}" route="login">Login</x-navbar.link>
                        <x-navbar.link href="{{ route('register') }}" route="register">Register</x-navbar.link>
                    @else
                        <span class="text-blue-900">{{ auth()->user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-blue-900 hover:bg-white hover:text-black rounded-md px-3 py-2 text-sm font-medium">
                                Logout
                            </button>
                        </form>
                    @endguest
                </div>
            </div>

            {{-- Mobile Menu Button --}}
            <div class="-mr-2 flex md:hidden">
                <button type="button" 
                    class="relative inline-flex items-center justify-center rounded-md bg-blue-100 p-2 text-blue-500 hover:bg-white hover:text-black focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-offset-2 focus:ring-offset-blue-100" 
                    aria-controls="mobile-menu" 
                    aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            {{-- Public Mobile Links --}}
            <x-navbar.dropdown-item href="/" route="home">Home</x-navbar.dropdown-item>
            <x-navbar.dropdown-item href="/about" route="about">About</x-navbar.dropdown-item>
            <x-navbar.dropdown-item href="/contact" route="contact">Contact</x-navbar.dropdown-item>
            <x-navbar.dropdown-item href="/gallery" route="gallery">Gallery</x-navbar.dropdown-item>
            
            {{-- Protected Mobile Links --}}
            @auth
                <x-navbar.dropdown-item href="/users" route="users.*">Users</x-navbar.dropdown-item>
            @endauth

            {{-- Authentication Mobile Links --}}
            @guest
                <x-navbar.dropdown-item href="{{ route('login') }}" route="login">Login</x-navbar.dropdown-item>
                <x-navbar.dropdown-item href="{{ route('register') }}" route="register">Register</x-navbar.dropdown-item>
            @else
                <div class="px-3 py-2 text-sm text-blue-900">
                    {{ auth()->user()->name }}
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left text-blue-900 hover:bg-white hover:text-black rounded-md px-3 py-2 text-sm font-medium">
                        Logout
                    </button>
                </form>
            @endguest
        </div>
    </div>
</nav>