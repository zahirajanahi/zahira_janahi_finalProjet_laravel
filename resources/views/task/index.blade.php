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
    class="fixed top-0 left-0 h-full w-20 bg-gray-100 shadow-lg flex flex-col items-center py-6 space-y-6 transition-all duration-300"
>
    <!-- Logo -->
    <div class="flex flex-col items-center">
        <img src="{{ asset('storage/images/logo.png') }}" class="w-12 mb-4" alt="logo">
    </div>

    <!-- Sidebar Menu -->
    <ul class="flex flex-col items-center space-y-6">
        <li>
            <a
                href="{{ route('dashboard') }}"
                class="flex flex-col items-center text-gray-500 hover:text-black transition"
            >
                <i class="bi bi-house text-2xl"></i>
                <span class="text-xs mt-1">Home</span>
            </a>
        </li>
        <li>
            <a
                href="{{ route('task.index') }}"
                class="flex flex-col items-center text-gray-500 hover:text-black transition"
            >
                <i class="bi bi-list-check text-2xl"></i>
                <span class="text-xs mt-1">Tasks</span>
            </a>
        </li>
        <li>
            <a
                href="#"
                class="flex flex-col items-center text-gray-500 hover:text-black transition"
            >
                <i class="bi bi-people text-2xl"></i>
                <span class="text-xs mt-1">Team</span>
            </a>
        </li>
        
        <li>
            <a
            href="#"
            class="flex flex-col items-center text-gray-500 hover:text-black transition mt-80"
        >
        <i class="bi bi-box-arrow-right text-2xl"></i>
            <span class="text-xs mt-1">Log out</span>
        </a>
        </li>
    </ul>
</div>


{{-- main --}}
  <div class="">
    <button onclick="document.getElementById('createTaskModal').classList.remove('hidden');" class="ms-96 mt-20 text-white bg-black px-5  py-3 rounded-full">Create Task</button>
  </div>

  <div id="createTaskModal" class="fixed inset-0 bg-[#101010] bg-opacity-80 flex items-center justify-center z-50 hidden transition-opacity duration-300">
    <!-- Modal content -->
    <div class="bg-[#1c1c1c] border-[1px] border-[#444] rounded-2xl shadow-md shadow-black/50 w-full max-w-md p-6">

        <!-- Modal header -->
        <div class="flex justify-between items-center pb-4">
            <h2 class="text-lg font-medium text-gray-200">Create a Task</h2>
            <button
                class="text-[#ffd997] hover:text-[#fff] text-[25px] focus:outline-none cursor-pointer transition duration-300"
                onclick="document.getElementById('createTaskModal').classList.add('hidden');"
            >
                &times;
            </button>
        </div>

        <!-- Modal form -->
        <form action="{{ route('tasks.store') }}" method="POST" class="mt-4">
            @csrf

            <!-- Task name -->
            <div class="mb-4">
                <label for="name" class="block text-gray-300 text-sm font-medium mb-1">Task Name</label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    class="block w-full px-4 py-2 text-sm text-gray-100 bg-[#2a2a2a] border border-[#555] rounded-md focus:ring-[#6737f5] focus:border-[#6737f5] transition duration-300"
                    required
                />
            </div>

            <!-- Task description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-300 text-sm font-medium mb-1">Task Description</label>
                <textarea
                    name="description"
                    id="description"
                    rows="2"
                    class="block w-full px-4 py-2 text-sm text-gray-100 bg-[#2a2a2a] border border-[#555] rounded-md focus:ring-[#6737f5] focus:border-[#6737f5] transition duration-300"
                ></textarea>
            </div>

            <!-- Task deadline -->
            <div class="mb-4">
                <label for="deadline" class="block text-gray-300 text-sm font-medium mb-1">Task Deadline</label>
                <input
                    id="deadline"
                    type="date"
                    name="deadline"
                    class="block w-full px-4 py-2 text-sm text-gray-100 bg-[#2a2a2a] border border-[#555] rounded-md focus:ring-[#6737f5] focus:border-[#6737f5] transition duration-300"
                    required
                />
            </div>


            {{-- Task Priority --}}
            <div class="mb-4">
                <x-input-label for="priority" :value="__('Task priority')" class="text-white pb-2 text-sm"/>
                <select 
                    id="priority" 
                    name="priority" 
                    class="block w-full px-4 py-2 text-sm text-gray-100 bg-[#2a2a2a] border border-[#555] rounded-md focus:ring-[#6737f5] focus:border-[#6737f5] transition duration-300"
                    required
                >
                    <option value="low" class="text-[#000]">Low</option>
                    <option value="medium" class="text-[#000]">Medium</option>
                    <option value="high" class="text-[#000]">High</option>
                </select>
            </div>

            <!-- Submit and cancel buttons -->
            <div class="flex justify-end gap-3">
                <button
                    type="button"
                    class="px-4 py-2 text-sm font-medium text-gray-300 bg-transparent border border-[#444] rounded-md hover:bg-[#444] transition duration-300"
                    onclick="document.getElementById('createTaskModal').classList.add('hidden');"
                >
                    Cancel
                </button>
                <button
                    type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-[#ffd997] border border-[#ffd997] rounded-md  transition duration-300"
                >
                    Create
                </button>
            </div>
        </form>
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
