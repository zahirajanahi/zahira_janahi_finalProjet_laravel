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
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white team">
    {{-- flesh messages --}}
    <div class="z-50">
        {{-- script for the flash messages --}}
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const flashMessage = document.getElementById('flashMessage');

                if (flashMessage) {
                    setTimeout(() => {
                        flashMessage.style.right = '20px';
                    }, 100);

                    setTimeout(() => {
                        flashMessage.style.right = '-300px';
                    }, 3000);

                    setTimeout(() => {
                        flashMessage.remove();
                    }, 3500);
                }
            });
        </script>


        @if (session('success'))
            <div id="flashMessage"
                class="fixed flex items-center gap-2 right-[-300px] top-5 flash-message bg-[#6dc489] text-white px-4 py-4 rounded-md mb-4 shadow-lg transition-all duration-300">
                <i class="fa-solid fa-thumbs-up text-[15px]"></i>
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div id="flashMessage"
                class="fixed flex items-center gap-2 right-[-300px] top-5 flash-message bg-red-500 text-white px-4 py-4 rounded-md mb-4 shadow-lg transition-all duration-300">
                <i class="fa-solid fa-thumbs-up text-[15px]"></i>
                {{ session('error') }}
            </div>
        @endif

        @if (session('info'))
            <div id="flashMessage"
                class="fixed flex items-center gap-2 right-[-300px] top-5 flash-message bg-[#6737f5] text-white px-4 py-4 rounded-md mb-4 shadow-lg transition-all duration-300">
                <i class="fa-solid fa-thumbs-up text-[15px]"></i>
                {{ session('info') }}
            </div>
        @endif

    </div>

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
                class="w-[40vw] px-4 py-2 rounded-full bg-gray-100 border-none text-black focus:border-gray-100 focus:outline-none focus:ring-0"
            />
    
            <!-- User Dropdown -->
            <div class="relative pe-20">
                <button
                    class="flex items-center text-sm font-medium text-[#270906] focus:outline-none"
                    id="dropdownButton"
                    onclick="toggleDropdown()"
                >
                    <span class="me-3">{{ Auth::user()->name }}</span>
    
                    @if ($users->image)
                    <a href={{ route('profile.edit') }}>
                        <img src="{{ asset('storage/' . $users->image) }}" alt="Profile Picture" class="w-10 h-10 rounded-full object-cover cursor-pointer ms-3">
                    </a>
                    @else
                    <a href={{ route('profile.edit') }}>
                        <i class="fas fa-user-circle text-[#2e2e2e] text-4xl"></i>
                    </a>
                    @endif
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
        <div id="sidebar"
            class="fixed top-0 left-0 h-full w-20 bg-white shadow-lg flex flex-col items-center py-6 space-y-6 transition-all duration-300">
            <!-- Logo -->
            <div class="flex flex-col items-center">
                <img src="{{ asset('storage/images/logo2.png') }}" class="w-12 mb-4" alt="logo">
            </div>

            <!-- Sidebar Menu -->
            <ul class="flex flex-col items-center pt-28 space-y-6">
                <li class="relative group">
                    <a href="{{ route('dashboard') }}"
                        class="flex flex-col items-center text-[#6b0c02] bg-gray-100 px-3 rounded-full py-2 transition">
                        <i class="bi bi-house-door-fill text-xl"></i>
                    </a>
                    <!-- Tooltip -->
                    <div
                        class="absolute left-16 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white text-sm px-2 py-1 rounded opacity-0 group-hover:opacity-100 group-hover:translate-x-2 transition">
                        Dashboard
                    </div>
                </li>
                <li class="relative group">
                    <a href="{{ route('task.index') }}"
                        class="flex flex-col items-center text-[#6b0c02] bg-gray-100 px-3 rounded-full py-2 transition">
                        <i class="bi bi-list-check text-xl"></i>
                    </a>
                    <!-- Tooltip -->
                    <div
                        class="absolute left-16 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white text-sm px-2 py-1 rounded opacity-0 group-hover:opacity-100 group-hover:translate-x-2 transition">
                        Tasks
                    </div>
                </li>
                <li class="relative group">
                    <a href="{{ route('team.index') }}"
                        class="flex flex-col items-center text-[#6b0c02] bg-gray-100 px-3 rounded-full py-2 transition">
                        <i class="bi bi-people-fill text-xl"></i>
                    </a>
                    <!-- Tooltip -->
                    <div
                        class="absolute left-16 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white text-sm px-2 py-1 rounded opacity-0 group-hover:opacity-100 group-hover:translate-x-2 transition">
                        Team
                    </div>
                </li>
                <li class="relative group">
                    <a href="#" class="flex flex-col items-center text-black transition mt-60">
                        <i class="bi bi-box-arrow-right text-2xl"></i>
                    </a>

                </li>
            </ul>
        </div>
    </section>




    <!-- Main Content -->
    <div class="relative h-[27vh] w-[94.6vw] bg-black ml-[5.4vw]">
        <!-- Image -->
        <img src="{{ asset('storage/images/createteam.png') }}" class="h-full w-full object-cover opacity-80"
            alt="">

        <!-- Overlay Text -->
        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-40 text-white ">
            <p class="text-4xl font-bold font-serif">Let's Creat Your Team</p>
        </div>
    </div>


    <div class="">
        <button onclick="document.getElementById('createTaskModal').classList.remove('hidden');"
            class="ms-40 mt-5 border-[#ba3819] ps-2 border-s-2 h-[5vh] pt-1 px-4  py-2  text-gray-600">Create
            Team</button>
    </div>

    <div id="createTaskModal"
        class="fixed inset-0 bg-gray-500 bg-opacity-30 flex items-center justify-center z-50 hidden transition-opacity duration-300">
        <!-- Modal content -->
        <div class="bg-white border border-gray-300 rounded-2xl shadow-lg w-full max-w-md p-6">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Create a Team</h2>
                <button
                    class="text-gray-400 hover:text-gray-600 text-2xl focus:outline-none cursor-pointer transition duration-200"
                    onclick="document.getElementById('createTaskModal').classList.add('hidden');">
                    &times;
                </button>
            </div>

            <!-- Modal form -->
            <form action="{{ route('team.store') }}" method="POST" class="mt-4">
                @csrf

                <!-- Task name -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-600 text-sm font-medium mb-1">Team Name</label>
                    <input id="name" type="text" name="name"
                        class="block w-full px-4 py-2 text-gray-800 bg-gray-100 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                        placeholder="Enter team name" required />
                </div>

                <!-- Task description -->
                <div class="mb-4">
                    <label for="description" class="block text-gray-600 text-sm font-medium mb-1">Team
                        Description</label>
                    <textarea name="description" id="description" rows="2"
                        class="block w-full px-4 py-2 text-gray-800 bg-gray-100 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                        placeholder="Enter team description"></textarea>
                </div>



                <!-- Submit and cancel buttons -->
                <div class="flex justify-end gap-3">
                    <button type="button"
                        class="px-4 py-2 text-sm font-medium rounded-full text-gray-700 bg-gray-200 border border-gray-300  hover:bg-gray-300 transition duration-200"
                        onclick="document.getElementById('createTaskModal').classList.add('hidden');">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-[#932a09] border rounded-full transition duration-200">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- DISPLAY ALL TEAM --}}
    <div class="flex flex-wrap gap-3 ms-40">
        @foreach ($teams as $team)
            <div class="w-[30vw] mt-10 bg-gray-100 p-6 rounded-3xl h-[30vh] cursor-pointer relative"
                onclick="showSidebar('{{ $team->id }}', '{{ $team->name }}', '{{ $team->description }}')">
                <div class="justify-between flex">
                    <h1 class="text-black font-bold text-xl">{{ $team->name }}</h1>
                    <div class="flex gap-2">
                        <button
                            onclick="event.stopPropagation(); document.getElementById('createTask{{ $team->id }}').classList.remove('hidden');">
                            <i class="bi bi-plus-circle text-lg font-bold text-[#6b0c02]"></i>
                        </button>
                        <button
                            onclick="event.stopPropagation(); document.getElementById('invite{{ $team->id }}').classList.remove('hidden');">
                            <i class="bi bi-person-plus text-lg font-bold text-[#6b0c02]"></i>
                        </button>
                    </div>
                </div>
                <p class="text-gray-500 pt-4">{{ $team->description }}</p>
                  
                <div>

                </div>
                {{-- Team members display --}}
                <div class="flex items-center absolute  bottom-3 left-12 right-0">
                    @foreach ($team->users as $index => $user)
                        @if ($user->pivot->role =='member')
                            <div class="{{ $index > 0 ? '-ml-6' : '' }} rounded-full p-2 z-{{ 30 - $index * 10 }}">
                                <div
                                    class="w-7 h-7 rounded-full bg-[#932a09] text-white flex items-center justify-center">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                    
                                </div>
                        
                            </div>
                        @endif
                    @endforeach
                    @if ($team->users->count() > 3)
                        <span class="text-sm text-gray-500 pb-1 ps-1">+{{ $team->users->count() - 3 }} more</span>
                    @endif
                    <form action="{{ route('team.destroy', $team) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this team?');">
                        @csrf
                        @method('DELETE')
    
                        @if ($team->owner_id === auth()->id())
                            <button type="submit" class="btn btn-danger ms-64 text-gray-500">remove</button>
                        @endif
                    </form>
                </div>
            </div>

            {{-- Create Task Modal --}}
            <div id="createTask{{ $team->id }}"
                class="fixed inset-0 bg-gray-500 bg-opacity-30 flex items-center justify-center z-50 hidden transition-opacity duration-300">
                <div class="bg-white border border-gray-300 rounded-2xl shadow-lg w-full max-w-md p-6">
                    <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-800">Create Task</h2>
                        <button class="text-gray-400 hover:text-gray-600 text-2xl focus:outline-none"
                            onclick="document.getElementById('createTask{{ $team->id }}').classList.add('hidden');">&times;</button>
                    </div>

                    <form action="{{ route('tasks.store') }}" method="POST" class="mt-4">
                        @csrf
                        <input type="hidden" name="team_id" value="{{ $team->id }}">

                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-medium mb-1">Task Name</label>
                            <input type="text" name="name" required
                                class="block w-full px-4 py-2 text-gray-800 bg-gray-100 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-medium mb-1">Description</label>
                            <textarea name="description" rows="2"
                                class="block w-full px-4 py-2 text-gray-800 bg-gray-100 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-gray-600 text-sm font-medium mb-1">Start Date</label>
                                <input type="date" name="start" required
                                    class="block w-full px-4 py-2 text-gray-800 bg-gray-100 border border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label class="block text-gray-600 text-sm font-medium mb-1">End Date</label>
                                <input type="date" name="end" required
                                    class="block w-full px-4 py-2 text-gray-800 bg-gray-100 border border-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-medium mb-1">Priority</label>
                            <select name="priority" required
                                class="block w-full px-4 py-2 text-gray-800 bg-gray-100 border border-gray-300 rounded-md">
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>

                        @if (auth()->id() === $team->owner_id)
                            <div class="mb-4">
                                <label class="block text-gray-600 text-sm font-medium mb-1">Assign To</label>
                                <select name="assigned_to"
                                    class="block w-full px-4 py-2 text-gray-800 bg-gray-100 border border-gray-300 rounded-md">
                                    <option value="">Select team member</option>
                                    @foreach ($team->users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        <div class="flex justify-end gap-3">
                            <button type="button"
                                class="px-4 py-2 text-sm font-medium rounded-full text-gray-700 bg-gray-200 border border-gray-300"
                                onclick="document.getElementById('createTask{{ $team->id }}').classList.add('hidden');">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-[#932a09] rounded-full">
                                Create Task
                            </button>
                        </div>
                    </form>
                </div>
            </div>


            {{-- invite modal --}}
            <div id="invite{{ $team->id }}"
                class="fixed inset-0 bg-gray-500 bg-opacity-30 flex items-center justify-center z-50 hidden transition-opacity duration-300">
                <!-- Modal content -->
                <div class="bg-white border border-gray-300 rounded-2xl shadow-lg w-full max-w-md p-6">
                    <!-- Modal header -->
                    <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-800">Send Invitation</h2>
                        <button
                            class="text-gray-400 hover:text-gray-600 text-2xl focus:outline-none cursor-pointer transition duration-200"
                            onclick="document.getElementById('invite{{ $team->id }}').classList.add('hidden');">
                            &times;
                        </button>
                    </div>

                    <!-- Modal form -->
                    <form action="{{ route('invite.store', $team->id) }}" method="POST" class="mt-4">
                        @csrf

                        <!-- Task name -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-600 text-sm font-medium mb-1">Invite by
                                email</label>
                            <input id="email" type="email" name="email"
                                class="block w-full px-4 py-2 text-gray-800 bg-gray-100 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                placeholder="Add members to join your team" required />
                        </div>




                        <!-- Submit and cancel buttons -->
                        <div class="flex justify-end gap-3">
                            <button type="button"
                                class="px-4 py-2 text-sm font-medium rounded-full text-gray-700 bg-gray-200 border border-gray-300  hover:bg-gray-300 transition duration-200"
                                onclick="document.getElementById('invite{{ $team->id }}').classList.add('hidden');">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-[#932a09] border rounded-full transition duration-200">
                                Send
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Team Sidebar with Tasks -->
    <div id="team-sidebar"
        class="fixed top-0 right-0 w-[50vw] h-full bg-gray-100 shadow-2xl p-6 z-50 mt-20 transform translate-x-full transition-transform duration-500 rounded-3xl overflow-y-auto">
        <div class="flex gap-3 float-end items-end">
            <a href="/chatify"><i class="bi bi-chat cursor-pointer"></i></a>
            <button class="text-[#6b0c02] float-right text-xl font-bold" onclick="hideSidebar()">×</button>
           
        </div>
        <div class="space-y-6">
            <div>
                <h2 id="sidebar-title" class="text-2xl font-bold text-gray-900"></h2>
                <p id="sidebar-description" class="mt-2 text-gray-600"></p>
            </div>

            <div class="mt-8">
                <h3 class="text-lg font-semibold mb-4">Team Tasks</h3>
                <div id="team-tasks" class="space-y-4">
                </div>
            </div>
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


        function toggleDropdown(taskId) {
            const dropdown = document.getElementById(`dropdown-${taskId}`);
            dropdown.classList.toggle('hidden');
        }

        async function showSidebar(teamId, name, description) {
    const sidebar = document.getElementById('team-sidebar');
    sidebar.classList.remove('translate-x-full');
    sidebar.classList.add('translate-x-0');
    
    document.getElementById('sidebar-title').textContent = name;
    document.getElementById('sidebar-description').textContent = description;
    
    const tasksContainer = document.getElementById('team-tasks');
    tasksContainer.innerHTML = 'Loading tasks...';
    
    try {
        const response = await fetch(`/teams/${teamId}/tasks`);
        const tasks = await response.json();
        
        tasksContainer.innerHTML = tasks.length ? tasks.map(task => `
            <div class="bg-white rounded-lg p-4 shadow">
                <div class="flex justify-between items-start">
                    <div class="flex items-center gap-3">
                        <input type="checkbox" 
                            class="form-checkbox h-5 w-5 text-[#932a09] rounded border-gray-300 focus:ring-[#932a09]"
                            ${task.status === 'completed' ? 'checked' : ''}
                            onchange="toggleTaskStatus(${task.id}, this)"
                        >
                        <div>
                            <h4 class="font-semibold text-gray-900 ${task.status === 'completed' ? 'line-through text-gray-500' : ''}">${task.name}</h4>
                            <p class="text-sm text-gray-600">${task.description || 'No description'}</p>
                        </div>
                    </div>
                    <span class="px-2 py-1 text-xs rounded-full ${getPriorityClass(task.priority)}">
                        ${task.priority}
                    </span>
                </div>
                <div class="mt-2 text-sm text-gray-500">
                    <p>Due: ${new Date(task.end).toLocaleDateString()}</p>
                    ${task.assigned_to ? `<p>Assigned to: ${task.assigned_user.name}</p>` : ''}
                    <p>Status: <span class="font-medium ${task.status === 'completed' ? 'text-green-600' : 'text-yellow-600'}">${task.status}</span></p>
                </div>
            </div>
        `).join('') : '<p class="text-gray-500">No tasks yet</p>';
    } catch (error) {
        tasksContainer.innerHTML = '<p class="text-red-500">Error loading tasks</p>';
    }
}

async function toggleTaskStatus(taskId, checkbox) {
    try {
        const response = await fetch(`/tasks/${taskId}/toggle-status`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        });
        
        const data = await response.json();
        
        if (data.success) {
            const taskElement = checkbox.closest('.bg-white');
            const taskTitle = taskElement.querySelector('h4');
            
            if (data.status === 'completed') {
                taskTitle.classList.add('line-through', 'text-gray-500');
            } else {
                taskTitle.classList.remove('line-through', 'text-gray-500');
            }
            
            const statusSpan = taskElement.querySelector('span.font-medium');
            statusSpan.textContent = data.status;
            statusSpan.className = `font-medium ${data.status === 'completed' ? 'text-green-600' : 'text-yellow-600'}`;
        }
    } catch (error) {
        console.error('Error toggling task status:', error);
        checkbox.checked = !checkbox.checked; // Revert checkbox state
    }
}

function getPriorityClass(priority) {
    const classes = {
        low: 'bg-green-100 text-green-800',
        medium: 'bg-yellow-100 text-yellow-800',
        high: 'bg-red-100 text-red-800'
    };
    return classes[priority] || classes.low;
}
        // Function to hide the sidebar
        function hideSidebar() {
            const sidebar = document.getElementById('team-sidebar');
            sidebar.classList.remove('translate-x-0');
            sidebar.classList.add('translate-x-full');
        }
    </script>


</body>

</html>
