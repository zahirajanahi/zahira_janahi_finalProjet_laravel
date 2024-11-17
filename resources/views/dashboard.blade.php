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
<body class="bg-gradient-to-r from-black via-gray-900 to-gray-800">
<nav class="p-4">
    <div class="flex justify-between items-center">
        <!-- Create Button with Dropdown -->
        <div class="relative ps-20">
            <button
                class="bg-gray-900 text-gray-200 px-3 py-2 rounded-full flex items-center gap-2"
                id="createButton"
                onclick="toggleCreateDropdown()"
            >
                <span class="text-sm border-[1px] rounded-full w-[1.5vw] h-[3vh] bg-[#eec16e]">+</span>
                Create
            </button>

            <!-- creat  Dropdown Content -->
            <div
                id="createDropdown"
                class="hidden absolute right-100 mt-2 w-40 bg-gray-800 text-white rounded-md shadow-lg p-4 z-10"
            >
                <div class="mb-3">
                    <button id="showTaskForm" class="font-bold flex items-center gap-2 text-gray-400">
                        <i class="bi bi-list-task text-gray-400"></i> Task
                    </button>
                    
                </div>
                <div>
                    <button class="font-bold flex items-center gap-2 text-gray-400">
                        <i class="bi bi-people text-gray-400"></i>Team
                    </button>
                </div>
            </div>
        </div>

        <!-- Search Bar -->
        <input
            type="text"
            placeholder="Search"
            class="w-[40vw] px-4 py-2 rounded-full bg-gray-800 text-white border border-gray-700"
        />

        <!-- User Dropdown -->
        <div class="relative pe-20">
            <button
                class="flex items-center text-sm font-medium text-white focus:outline-none"
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
                class="hidden absolute right-0 mt-2 w-48 bg-gray-800 rounded-md shadow-lg z-10"
            >
                <a
                    href="{{ route('profile.edit') }}"
                    class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
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
                        class="w-full text-left px-4 py-2 text-sm text-white hover:bg-gray-700"
                    >
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<div id="taskSection" class="hidden p-6 bg-gray-800 rounded-md shadow-lg w-[50vw] mx-auto mt-20">
    <h2 class="text-lg font-bold text-white mb-4">Create Task</h2>
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-200">Task Name:</label>
            <input
                type="text"
                id="name"
                name="name"
                class="w-full px-4 py-2 rounded-md bg-gray-700 text-white border border-gray-600"
                required
            />
        </div>
      
        <div class="mb-4">
            <label for="deadline" class="block text-gray-200">Deadline:</label>
            <input
                type="date"
                id="deadline"
                name="deadline"
                class="w-full px-4 py-2 rounded-md bg-gray-700 text-white border border-gray-600"
                required
            />
        </div>
        <div class="mb-4">
            <label for="priority" class="block text-gray-200">Priority:</label>
            <select
                id="priority"
                name="priority"
                class="w-full px-4 py-2 rounded-md bg-gray-700 text-white border border-gray-600"
                required
            >
                <option value="low">Low</option>
                <option value="medium" selected>Medium</option>
                <option value="high">High</option>
            </select>
        </div>
        <button
            type="submit"
            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700"
        >
            Create Task
        </button>
    </form>
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

    const taskButton = document.getElementById("showTaskForm");
    const taskSection = document.getElementById("taskSection");

    taskButton.addEventListener("click", () => {
        taskSection.classList.toggle("hidden");
    });

</script>
</body>
</html>
