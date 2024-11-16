<nav x-data="{ open: false }" class="bg-white  py-3">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-3">
        <!-- Left Section: Links -->
        <div class="flex items-center gap-6 text-black  ps-5 font-bold ">
            <a href="#" class="hover:text-gray-800">About Us</a>
            <a href="#" class="hover:text-gray-800">Products</a>
            <a href="#" class="hover:text-gray-800">Services</a>
            <a href="#" class="hover:text-gray-800">Features</a>
        </div>

        <!-- Center Section: Logo -->
        <div class="text-black font-bold me-28 text-xl">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                <img src="{{ asset('storage/images/logo.png') }}" class="w-[3vw]" alt="logo">
                <span>Planify</span> 
            </a>
        </div>

        <!-- Right Section: Auth Links -->
        <div class="flex items-center gap-4">
            @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="ml-1 w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @else
                <a href="{{ route('login') }}" class="text-black hover:text-gray-800">Log In</a>
                <a href="{{ route('register') }}" class="text-white bg-black rounded-full px-4 py-2 hover:bg-gray-800 me-5">
                    Sign Up
                </a>
            @endauth
        </div>
    </div>
</nav>
