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
    
    
           
            </div>
    
            <!-- Search Bar -->
            <input
                type="text"
                placeholder="Search"
                class="w-[40vw] px-4 py-2 rounded-full bg-gray-100 border-none text-black focus:border-gray-100 focus:outline-none focus:ring-0"
            />
    
            <!-- User Dropdown -->
            <div class="relative pe-20">
                <button
                    class="flex items-center text-sm font-medium text-[#270906] focus:outline-none"
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
   <!-- Sidebar Menu -->
   <section>
    <div
        id="sidebar"
        class="fixed top-0 left-0 h-full w-20 bg-white shadow-lg flex flex-col items-center py-6 space-y-6 transition-all duration-300"
    >
        <!-- Logo -->
        <div class="flex flex-col items-center">
            <img src="{{ asset('storage/images/logo.png') }}" class="w-12 mb-4" alt="logo">
        </div>

        <!-- Sidebar Menu -->
        <ul class="flex flex-col items-center pt-28 space-y-6">
            <li class="relative group">
                <a
                    href="{{ route('dashboard') }}"
                    class="flex flex-col items-center text-[#6b0c02] bg-gray-100 px-3 rounded-full py-2 transition"
                >
                    <i class="bi bi-house-door-fill text-xl"></i>
                </a>
                <!-- Tooltip -->
                <div
                    class="absolute left-16 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white text-sm px-2 py-1 rounded opacity-0 group-hover:opacity-100 group-hover:translate-x-2 transition"
                >
                    Dashboard
                </div>
            </li>
            <li class="relative group">
                <a
                    href="{{ route('task.index') }}"
                    class="flex flex-col items-center text-[#6b0c02] bg-gray-100 px-3 rounded-full py-2 transition"
                >
                    <i class="bi bi-list-check text-xl"></i>
                </a>
                <!-- Tooltip -->
                <div
                    class="absolute left-16 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white text-sm px-2 py-1 rounded opacity-0 group-hover:opacity-100 group-hover:translate-x-2 transition"
                >
                    Tasks
                </div>
            </li>
            <li class="relative group">
                <a
                    href="{{ route('team.index') }}"
                    class="flex flex-col items-center text-[#6b0c02] bg-gray-100 px-3 rounded-full py-2 transition"
                >
                    <i class="bi bi-people-fill text-xl"></i>
                </a>
                <!-- Tooltip -->
                <div
                    class="absolute left-16 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white text-sm px-2 py-1 rounded opacity-0 group-hover:opacity-100 group-hover:translate-x-2 transition"
                >
                    Team
                </div>
            </li>
            <li class="relative group">
                <a
                    href="#"
                    class="flex flex-col items-center text-black transition mt-60"
                >
                    <i class="bi bi-box-arrow-right text-2xl"></i>
                </a>
           
            </li>
        </ul>
    </div>
</section>

   

<!-- Main Content -->
<div class="relative h-[27vh] w-[94.6vw] bg-black ml-[5.4vw]">
    <!-- Image -->
    <img src="{{ asset('storage/images/task3.png') }}" class="h-full w-full object-cover opacity-80" alt="">
    
    <!-- Overlay Text -->
    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-40 text-white ">
        <p class="text-4xl font-bold font-serif">Let's Creat Your Own Task</p>
    </div>
</div>


  <div class="">
    <button onclick="document.getElementById('createTaskModal').classList.remove('hidden');" class="ms-40 mt-5 text-[#10375c] border border-[#10375c] px-4  py-2  rounded-full">Create Task</button>
  </div>

  <div id="createTaskModal" class="fixed inset-0 bg-gray-500 bg-opacity-30 flex items-center justify-center z-50 hidden transition-opacity duration-300">
    <!-- Modal content -->
    <div class="bg-white border border-gray-300 rounded-2xl shadow-lg w-full max-w-md p-6">
        <!-- Modal header -->
        <div class="flex justify-between items-center pb-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">Create a Task</h2>
            <button
                class="text-gray-400 hover:text-gray-600 text-2xl focus:outline-none cursor-pointer transition duration-200"
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
                <label for="name" class="block text-gray-600 text-sm font-medium mb-1">Task Name</label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    class="block w-full px-4 py-2 text-gray-800 bg-gray-100 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                    placeholder="Enter task name"
                    required
                />
            </div>

            <!-- Task description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-600 text-sm font-medium mb-1">Task Description</label>
                <textarea
                    name="description"
                    id="description"
                    rows="2"
                    class="block w-full px-4 py-2 text-gray-800 bg-gray-100 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                    placeholder="Enter task description"
                ></textarea>
            </div>

            <!-- Task deadline -->
            <div class="mb-4">
                <label for="start" class="block text-gray-600 text-sm font-medium mb-1">Start Date & Time</label>
                <input
                    type="datetime-local"
                    id="start"
                    name="start"
                    class="block w-full px-4 py-2 text-gray-800 bg-gray-100 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                    min="{{ date('Y-m-d\TH:i') }}"
                    required
                />
            </div>
            <div class="mb-4">
                <label for="end" class="block text-gray-600 text-sm font-medium mb-1">End Date & Time</label>
                <input
                    type="datetime-local"
                    id="end"
                    name="end"
                    class="block w-full px-4 py-2 text-gray-800 bg-gray-100 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                    min="{{ date('Y-m-d\TH:i') }}"
                    required
                />
            </div>

            <!-- Task Priority -->
            <div class="mb-4">
                <label for="priority" class="block text-gray-600 text-sm font-medium mb-1">Task Priority</label>
                <select
                    id="priority"
                    name="priority"
                    class="block w-full px-4 py-2 text-gray-800 bg-gray-100 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                    required
                >
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
            </div>

            <!-- Submit and cancel buttons -->
            <div class="flex justify-end gap-3">
                <button
                    type="button"
                    class="px-4 py-2 text-sm font-medium rounded-full text-gray-700 bg-gray-200 border border-gray-300  hover:bg-gray-300 transition duration-200"
                    onclick="document.getElementById('createTaskModal').classList.add('hidden');"
                >
                    Cancel
                </button>
                <button
                    type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-[#932a09] border rounded-full transition duration-200"
                >
                    Create
                </button>
            </div>
        </form>
    </div>
</div>





{{-- display tasks --}}
<div class="">
    <div class="max-w-7xl mx-auto">
        <div >
            <div class="p-6 ">
                @if($personalTasks->count() > 0)
                    @php
                        $colors = [
                            'bg-[#e5d9e5]',
                            'bg-[#b5c7d3]',
                            'bg-[#FFD09B]',
                            'bg-[#D0E8C5]',
                            'bg-[#927e6d]',
                            'bg-[#829791]',


                        ];
                    @endphp
                    <!-- Card Grid -->
                    <div class="flex flex-wrap gap-3">
                        @foreach($personalTasks as $index => $task)
                            <!-- Task Card -->
                            <div class="{{ $colors[$index % count($colors)] }} text-black relative shadow-sm h-[40vh] w-[18vw] rounded-xl p-6 border border-gray-200 hover:shadow-lg transition-shadow">
                                <div class="flex justify-between items-center">
                                    <h3 class="font-bold text-black">{{ $task->name }}</h3>
                                    <p class="text-sm mb-2  mt-2">
                                        <span class="px-2 py-1 rounded-full 
                                            {{ $task->priority === 'high' ? ' text-red-700 border border-red-700 rounded-lg ' : 
                                               ($task->priority === 'medium' ? ' text-yellow-700 border border-yellow-700 rounded-lg' : ' text-green-700 border border-green-600 rounded-lg') }}
                                               ">
                                            {{ ucfirst($task->priority) }}
                                        </span>
                                    </p>
                                </div>

                                @if($task->description)
                                    <p class="text-black mt-2">
                                        {{ $task->description }}
                                    </p>
                                @endif

                                <div class="flex justify-between items-center absolute top-60">
                                    <p class="text-sm text-black mt-2">
                                        <strong>Deadline:</strong> {{ \Carbon\Carbon::parse($task->deadline)->format('d-m-y') }}
                                    </p>

                                    <!-- Dropdown Menu -->
                                    <div class="relative">
                                        <button class="text-black hover:text-gray-800 pt-2 ps-20" onclick="toggleDropdown({{ $task->id }})">
                                           <i class="bi bi-three-dots"></i>
                                        </button>
                                        <!-- Dropdown Menu Content -->
                                        <div id="dropdown-{{ $task->id }}" class="hidden z-10 absolute right-0 mt-2 w-32 bg-white rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                                            <div class="py-1">
                                                <button
                                                data-task-id="{{ $task->id }}"
                                                type="button"
                                                onclick="document.getElementById('editModal-{{ $task->id }}').classList.remove('hidden');"
                                                class="text-gray-600 block px-4 py-2 text-sm"
                                            >
                                                Edit
                                            </button>
                                                <form action="{{ route('tasks.personal.destroy', $task) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 block px-4 py-2 text-sm " onclick="return confirm('Are you sure?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500">No personal tasks found.</p>
                @endif
            </div>
        </div>
    </div>
</div>


{{-- <!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-[#1c1c1c] border-[1px] border-[#444] rounded-2xl shadow-md shadow-black/50 w-full max-w-md p-6">

        <!-- Modal header -->
        <div class="flex justify-between items-center pb-4">
            <h2 class="text-lg font-medium text-gray-200">Create a Task</h2>
            <button
                class="text-[#ffd997] hover:text-[#fff] text-[25px] focus:outline-none cursor-pointer transition duration-300"
                onclick="document.getElementById('editModal').classList.add('hidden');"
            >
                &times;
            </button>
        </div>

       
            <!-- Modal form -->
        <form action="{{ route('task.update') }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')

            <!-- Task name -->
            <div class="mb-4">
                <label for="name" class="block text-gray-300 text-sm font-medium mb-1">Task Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name', $task->name) }}"
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
                    rows="3"
                    class="block w-full px-4 py-2 text-sm text-gray-100 bg-[#2a2a2a] border border-[#555] rounded-md focus:ring-[#6737f5] focus:border-[#6737f5] transition duration-300"
                >{{ old('description', $task->description) }}</textarea>
            </div>

            <!-- Task deadline -->
            <div class="mb-4">
                <label for="deadline" class="block text-gray-300 text-sm font-medium mb-1">Task Deadline</label>
                <input
                    id="deadline"
                    type="date"
                    name="deadline"
                    value="{{ old('deadline', $task->deadline ) }}"
                    class="block w-full px-4 py-2 text-sm text-gray-100 bg-[#2a2a2a] border border-[#555] rounded-md focus:ring-[#6737f5] focus:border-[#6737f5] transition duration-300"
                    required
                />
            </div>

            <!-- Task Priority -->
            <div class="mb-4">
                <label for="priority" class="block text-gray-300 text-sm font-medium mb-1">Task Priority</label>
                <select
                    id="priority"
                    name="priority"
                    class="block w-full px-4 py-2 text-sm text-gray-100 bg-[#2a2a2a] border border-[#555] rounded-md focus:ring-[#6737f5] focus:border-[#6737f5] transition duration-300"
                    required
                >
                    <option value="low" {{ old('priority', $task->priority) === 'low' ? 'selected' : '' }}>Low</option>
                    <option value="medium" {{ old('priority', $task->priority) === 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="high" {{ old('priority', $task->priority) === 'high' ? 'selected' : '' }}>High</option>
                </select>
            </div>

            <!-- Assigned To -->
            @if($task->team)
            <div class="mb-4">
                <label for="assigned_to" class="block text-gray-300 text-sm font-medium mb-1">Assign To</label>
                <select
                    id="assigned_to"
                    name="assigned_to"
                    class="block w-full px-4 py-2 text-sm text-gray-100 bg-[#2a2a2a] border border-[#555] rounded-md focus:ring-[#6737f5] focus:border-[#6737f5] transition duration-300"
                >
                    <option value="">Select Team Member</option>
                    @foreach($task->team->users as $user)
                    <option value="{{ $user->id }}" {{ old('assigned_to', $task->assigned_to) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            @endif

            <!-- Status -->
            <div class="mb-4">
                <label for="status" class="block text-gray-300 text-sm font-medium mb-1">Status</label>
                <select
                    id="status"
                    name="status"
                    class="block w-full px-4 py-2 text-sm text-gray-100 bg-[#2a2a2a] border border-[#555] rounded-md focus:ring-[#6737f5] focus:border-[#6737f5] transition duration-300"
                >
                    <option value="pending" {{ old('status', $task->status) === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ old('status', $task->status) === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ old('status', $task->status) === 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <!-- Submit and cancel buttons -->
            <div class="flex justify-end gap-3">
                <a href="{{ route('task.index') }}" class="px-4 py-2 text-sm font-medium text-gray-300 bg-transparent border border-[#444] rounded-md hover:bg-[#444] transition duration-300">
                    Cancel
                </a>
                <button
                    type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-[#ffd997] border border-[#ffd997] rounded-md transition duration-300"
                >
                    Update
                </button>
            </div>
        </form>
 </div>




</div> --}}






























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


    function toggleDropdown(taskId) {
        const dropdown = document.getElementById(`dropdown-${taskId}`);
        dropdown.classList.toggle('hidden');
    }

</script>
</body>
</html>
