<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Profile</title>
</head>
<body>

    <nav class="p-3 border-b ">
        <div class="flex justify-between items-center">

              <div class="flex items-center ps-20">
                <img src="{{ asset('storage/images/logo.png') }}" class="w-[3vw]" alt="logo"><span><a href="{{ route('dashboard') }}">lanify</a></span>

              </div>
            <!-- User Dropdown -->
            <div class="relative pe-20">
                <button
                    class="flex items-center text-sm font-medium text-gray-500 focus:outline-none"
                    id="dropdownButton"
                    onclick="toggleDropdown()"
                >
                    <span>{{ Auth::user()->name }}</span>
                    <svg
                        class="ml-2 w-4 h-4"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </button>
    
                <!-- Dropdown Content -->
                <div
                    id="dropdownContent"
                    class="hidden absolute right-0 mt-2 w-48 text-gray-500 bg-white rounded-md shadow-lg z-10 pb-3 pt-3"
                >
                    <a
                        href="{{ route('profile.edit') }}"
                        class="block px-4 py-2 text-sm"
                    >
                        Profile
                    </a>
                    <form
                        method="POST"
                        action="{{ route('logout') }}"
                        class="block"
                    >
                        @csrf
                        <button
                            type="submit"
                            class="w-full text-left px-4 py-2 text-sm"
                        >
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    
 

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 border border-gray-800 rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 border border-gray-800 rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 border border-gray-800 rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

 
</body>
</html>
   