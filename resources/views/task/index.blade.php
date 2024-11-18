<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>planify</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white">
<nav class="p-4 border-b pb-4">
    <div class="flex justify-between items-center">
        <!-- Create Button with Dropdown -->
        <div class="relative ps-20 flex items-center gap-4">
            <button
            class=" text-gray-600 text-xl"
            id="toggleSidebarButton"
            onclick="toggleSidebar()"
        >
            <i class="bi bi-list"></i> 
        </button>


        <div class="relative ps-20 flex items-center gap-4">
            <button
                class="bg-[#dddddda8] text-gray-500 px-3 py-2 rounded-full flex items-center gap-2"
                id="createButton"
                onclick="toggleCreateDropdown()"
            >
                <span class="text-sm border-[1px] rounded-full w-[1.5vw] h-[3vh] bg-black text-white">+</span>
                Create
            </button>
            <div
                id="createDropdown"
                class="hidden absolute rihgt-10 mt-40 w-40   text-gray-800 border border-gray-200 bg-white rounded-md shadow-lg z-10"
            >
                <div class="pt-3">
                    <a 
                        href="{{ route('task.index') }}" 
                        class="font-bold flex items-center gap-2 text-gray-400 px-4 py-2 hover:bg-gray-200 rounded-md"
                    >
                        <i class="bi bi-list-task"></i> Task
                    </a>
                </div>
                <div class="pb-3">
                    <a 
                        href="#" 
                        class="font-bold flex items-center gap-2 text-gray-400 px-4 py-2 hover:bg-gray-200 rounded-md"
                    >
                        <i class="bi bi-people"></i> Team
                    </a>
                </div>
            </div>
        </div>
        
        </div>

        <!-- Search Bar -->
        <input
            type="text"
            placeholder="Search"
            class="w-[40vw] px-4 py-2 rounded-full bg-[#dddddda8] text-white border border-gray-200"
        />

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
                class="hidden absolute right-0 mt-2 w-48 text-gray-800 border border-gray-200 bg-white rounded-md shadow-lg z-10 pb-3 pt-3"
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

    
<!-- Sidebar -->
<div
    id="sidebar"
    class="fixed top-0 left-0 h-full w-64 bg-[#f5f5f5] text-gray-800 shadow-lg transform -translate-x-full transition-transform duration-300"
>
    <div class="p-4 ">
        <div class="flex gap-3 pb-2">
            <button
            class="  text-xl"
            id="toggleSidebarButton"
            onclick="toggleSidebar()"
        >
            <i class="bi bi-list"></i> 
           </button>
    
           
           <div class="flex items-center ps-2">
            <img src="{{ asset('storage/images/logo.png') }}" class="w-[3vw]" alt="logo"><span><a href="{{ route('dashboard') }}">lanify</a></span>
          </div>
        </div>
     
        
        <ul class="mt-4 border-b border-t">
            <li class="mb-2 mt-2">
                <a href="#" class="block px-4 py-2 hover:bg-[#dddd] rounded-lg  hover:text-black duration-300 transition"> <i class="bi bi-house"></i> Home</a>
            </li>
            <li class="mb-2">
                <a href="{{ route('task.index') }}" class="block px-4 py-2 hover:bg-[#dddd] rounded-lg hover:text-black duration-300 transition"> <i class="bi bi-list-check"></i> Create Tasks</a>
            </li>
            <li class="mb-2">
                <a href="#" class="block px-4 py-2 hover:bg-[#dddd] rounded-lg hover:text-black duration-300 transition"><i class="bi bi-people"></i> Create Team</a>
            </li>
        </ul>
    </div>
</div>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById("dropdownContent");
        dropdown.classList.toggle("hidden");
    }

    function toggleCreateDropdown() {
        const dropdown = document.getElementById("createDropdown");
        dropdown.classList.toggle("hidden");
    }


    function toggleSidebar() {
        const sidebar = document.getElementById("sidebar");
        if (sidebar.classList.contains("-translate-x-full")) {
            sidebar.classList.remove("-translate-x-full");
        } else {
            sidebar.classList.add("-translate-x-full");
        }
    }
</script>
</body>
</html>
