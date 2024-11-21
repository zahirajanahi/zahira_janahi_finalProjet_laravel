<nav x-data="{ open: false }" class="p-4">    
    <div class="max-w-7xl mx-auto flex justify-between items-center px-3">
        <!-- Left Section: Links -->
        <div class="flex items-center gap-6 text-black ps-5 font-bold hidden md:flex">
            @guest
                <a href="#" class="hover:text-gray-800">About Us</a>
                <a href="#" class="hover:text-gray-800">Products</a>
                <a href="#" class="hover:text-gray-800">Services</a>
                <a href="#" class="hover:text-gray-800">Features</a>
            @endguest
        </div>

      
    

   <!-- Right Section: Auth Links -->
<div class="flex items-center gap-4 hidden md:flex">
    
    @auth
        <!-- Dropdown Menu -->
        <div class="relative" x-data="{ dropdownOpen: false }">
            <button @click="dropdownOpen = !dropdownOpen" class="flex items-center text-sm font-medium text-white focus:outline-none">
                <span>{{ Auth::user()->name }}</span>
                <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>

            <!-- Dropdown Menu Content -->
            <div 
                x-show="dropdownOpen" 
                @click.away="dropdownOpen = false" 
                class="absolute right-0 mt-2 w-48 bg-gray-700 rounded-md shadow-lg z-10">
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-white hover:bg-gray-600">
                    Profile
                </a>
                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-white hover:bg-gray-600">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    @else
        <!-- Show login and signup for guests -->
        <a href="{{ route('login') }}" class="text-black hover:text-gray-800">Log In</a>
        <a href="{{ route('register') }}" class="text-white bg-[#70220e] rounded-full px-4 py-2 hover:bg-[#843420] transition duration-500 me-5">
            Sign Up
        </a>
    @endauth
     </div>

        <!-- Hamburger Menu (for mobile) -->
        <div class="md:hidden flex items-center">
            <button @click="open = !open" class="text-black">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu (Hidden by default) -->
    <div x-show="open" class="md:hidden">
        <div class="flex flex-col gap-6 text-center text-black font-bold py-4 bg-white">
            @guest
                <a href="#" class="hover:text-gray-800">About Us</a>
                <a href="#" class="hover:text-gray-800">Products</a>
                <a href="#" class="hover:text-gray-800">Services</a>
                <a href="#" class="hover:text-gray-800">Features</a>
                <a href="{{ route('login') }}" class="text-black hover:text-gray-800">Log In</a>
                <a href="{{ route('register') }}" class="text-white bg-black rounded-full px-4 py-2 hover:bg-gray-800">
                    Sign Up
                </a>
            @else
                <!-- Show dropdown menu in mobile -->
                <div class="relative" x-data="{ dropdownOpenMobile: false }">
                    <button @click="dropdownOpenMobile = !dropdownOpenMobile" class="text-black text-sm font-medium">
                        {{ Auth::user()->name }}
                    </button>
                    <div 
                        x-show="dropdownOpenMobile" 
                        @click.away="dropdownOpenMobile = false" 
                        class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            @endguest
        </div>
    </div>
</nav>
