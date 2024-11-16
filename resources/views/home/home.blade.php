<x-app-layout>
    <div class="flex justify-center pt-10 gap-36 flex-wrap lg:flex-nowrap">
        <div class="pt-10 w-full lg:w-auto">
            <p class="bg-[#d5e1ff] text-center rounded-full py-2 px-4 w-[45vw] sm:w-[50%] md:w-[40%]">Welcome To Planify</p>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl pt-5 text-[#202023]">Boost Productivity</h1>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl pt-2 text-[#202023]">Through <span class="italic border-[#ffd997] border-b-4">Effortless</span></h1>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl pt-2 text-[#202023]">Team Management</h1>

            <div class="buutons flex pt-10 ps-5 gap-3 flex-wrap">
                <button class="bg-[#202023] text-white rounded-lg px-4 py-2">Get started Today</button>
                <button class="text-[#202023]">See Our Features</button>
            </div>

            <div class="pt-10 ps-5 flex gap-5 flex-wrap lg:flex-nowrap">
                <div class="bg-[#202023] w-full sm:w-[45%] lg:w-[18vw] h-[36vh] rounded-lg mb-5 lg:mb-0">
                    <div class="flex justify-between">
                        <p class="text-white text-sm ps-5 pt-6">[ RATING ]</p>
                        <p class="text-white font-semibold text-5xl pe-6 pt-10">4.8 <span class="text-yellow-400 text-xl">★</span></p>
                    </div>
                    <p class="mt-28 text-gray-400 text-sm ms-5 border-t border-gray-400 me-6 pt-2">The perfect team management and collaboration.</p>
                </div>

                <div class="bg-[#f6f6f5] w-full sm:w-[45%] lg:w-[18vw] h-[36vh] rounded-lg">
                    <p class="p-6 text-lg font-medium text-[#202023]">Revolution The Way Your Teams Work Together With Our Intuitive Platform</p>
                    <a href="#" class="flex items-center gap-2 mt-20 ps-5 text-[#202023] font-semibold">
                        <span>View Video</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#ffd997] rounded-full" fill="#ffd997" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-5.197-3.74a1 1 0 00-1.555.832v7.48a1 1 0 001.555.832l5.197-3.74a1 1 0 000-1.664z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-auto hidden lg:flex">
            <img src="{{ asset('storage/images/lnding (2) (1).png') }}" class="w-full lg:w-[35vw] h-auto lg:h-[95vh]" alt="logo">
        </div>
    </div>

    <div class="bg-[#d5e0ff] mb-20 mt-16 rounded-xl mx-auto w-[80vw] h-[75vh]" >
        <div class="flex justify-between">
            <div class="text-5xl font-thin pt-10 ps-20">Powerful Tools For <br> Effective Team <br> Collaboration</div>
            <div class="pe-20 pt-10 ">  
                <p class=" text-gray-500 w-[30vw] ">Unleash Your Team's Potential With Our Comprehensive Set Of Collaboration Tools. From Task Delegation To Real-Time Messaging, we've Got Everything Your Team needs In one Place.</p>
                <div class="buutons flex pt-10  gap-3 flex-wrap">
                    <button class="bg-[#202023] text-white rounded-lg px-4 py-2">See Our Features</button>
                    <button class="text-[#202023]">Sing Up free</button>
                </div>
            </div>
        </div>
        <div class="flex justify-evenly pt-12">
            <div class="bg-[#ffd997] w-[17vw] h-[40vh] rounded-xl ps-8  pt-10 text-lg">Comprehensive Tailored <br> <span class="ps-4">Toolkit To Optimize</span>  <br> <span class="ps-10">Teamwork</span> 
         <img src="{{ asset('storage/images/note.png') }}" class=" mx-auto w-48 " alt="logo">

            </div>
            <div class=" w-[17vw] h-[40vh] ps-8  pt-10 text-lg">All On One Platform To <br> <span class="ps-7">Manage Projects</span>
                <img src="{{ asset('storage/images/circle.png') }}"  alt="logo">

            </div>
            <div class=" w-[17vw] h-[40vh] ps-8  pt-10 text-lg">Intuitive Interface Design<br>And Customizable Options
                <img src="{{ asset('storage/images/data.png') }}" class="pt-5" alt="logo">
            </div>
        </div>
    </div>


    
</x-app-layout>
