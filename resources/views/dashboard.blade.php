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
                class="bg-gray-100 text-gray-500 px-3 py-2 rounded-full flex items-center gap-2"
                id="createButton"
                onclick="toggleCreateDropdown()"
            >
                <span class="text-sm border-[1px] rounded-full w-[1.5vw] h-[3vh] bg-[#932a09] text-white">+</span>
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

                @if ($user->image)
                <a href={{ route('profile.edit') }}>
                    <img src="{{ asset('storage/' . $user->image) }}" alt="Profile Picture" class="w-10 h-10 rounded-full object-cover cursor-pointer ms-3">
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
        
    </div>
</section>





 {{-- main --}}
<div class="relative overflow-hidden mx-auto w-[75vw] mt-7 ms-48 shadow-lg rounded-3xl">
    <video
      autoplay
      loop
      muted
      playsinline
      class="w-full h-[50vh] rounded-3xl object-cover"
    >
      <source src="https://cdn.dribbble.com/userupload/17508582/file/original-7a18b76ade478383dbe5f7ac4b2d6c9d.mp4" type="video/mp4" />
      Your browser does not support the video tag.
    </video>
  </div>

  {{-- calendar --}}
   
  <section>
      <h1 class=" font-bold font-serif pt-10 ms-52 text-xl text-black me-48 ">Calendar</h1>
  </section>
    
  <div class="py-12 ms-20">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="w-[75vw] h-[90vh] bg-white rounded-3xl border p-12 shadow-xl" id="calendar"></div>
    </div>
</div>

<script>
    
document.addEventListener('DOMContentLoaded', async function() {
    try {
        const response = await fetch("/calendar/create");
        const data = await response.json();
        const events = data.events;
        
        var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
            headerToolbar: {
                left: 'timeGridWeek',
                center: 'title',
                // right: 'listMonth,listWeek,listDay'
            },
            initialView: 'timeGridWeek',
            slotMinTime: "09:00:00",
            slotMaxTime: "19:00:00",
            nowIndicator: true,
            selectable: true,
            selectMirror: true,
            selectOverlap: false,
            weekends: true,
            editable: true,
            events: events,

            eventContent: function(arg) {
                let event = arg.event;
                let priority = event.extendedProps.priority || '';
                let status = event.extendedProps.status || '';
                
                return {
                    html: `
                        <div class="fc-content p-1">
                            <div class="font-bold">${event.title}</div>
                            <div class="text-xs">
                                <span class="capitalize">${priority} Priority</span>
                                ${status ? `• ${status}` : ''}
                            </div>
                        </div>
                    `
                };
            },

            eventClick: function(info) {
                if (validateOwner(info)) {
                    if (confirm('Would you like to mark this task as completed?')) {
                        let taskId = info.event.id;
                        fetch(`/calendar/delete/${taskId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            }
                        }).then(() => {
                            window.location.reload();
                        });
                    }
                }
            },

            eventDrop: function(info) {
                if (validateOwner(info)) {
                    let taskId = info.event.id;
                    fetch(`/calendar/update/${taskId}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            start: info.event.start.toISOString()
                        })
                    }).then(() => {
                        window.location.reload();
                    });
                } else {
                    info.revert();
                }
            }
        });

        calendar.render();
    } catch (error) {
        console.error('Error loading calendar events:', error);
    }

    function validateOwner(info) {
        let owner = info.event.extendedProps.owner;
        let assignedTo = info.event.extendedProps.assigned_to;
        let authUser = {{ Auth::id() }};
        return owner == authUser || assignedTo == authUser;
    }
});

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