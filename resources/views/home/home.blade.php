<x-app-layout>
    <div class="flex justify-center pt-10 gap-36">
        <div class="pt-10">
            <p class="bg-[#d5e1ff] rounded-full py-2 px-4 w-[13vw]">Welcome To Planify</p>
            <h1 class="text-6xl pt-5 text-[#202023]" > Boost Productivity </h1>
            <h1 class="text-6xl pt-2 text-[#202023]"> Through <span class=" border-orange-300 border-b-4">Effortless</span> </h1>
            <h1 class="text-6xl pt-2 text-[#202023]"> Team Management </h1>

            <div class="buutons flex pt-10 ps-5 gap-3">
                <button class="bg-[#202023] text-white rounded-lg px-4 py-2">Get started Today</button>
                <button class="text-[#202023]">See Our Features</button>
            </div>
              
            <div class="pt-10 ps-5 flex gap-5">
                <div class="bg-[#202023] w-[18vw] h-[36vh] rounded-lg ">
                    <div class="flex justify-between">
                        <p class="text-white text-sm ps-5 pt-6">[ RATING ]</p>
                        <p class="text-white font-semibold text-5xl pe-6 pt-10">4.8 <span class="text-yellow-400 text-xl ">★</span></p>
                    </div>
                    <p class="mt-2 text-gray-400 text-sm ps-5">The perfect team management and collaboration.</p>

                </div>
                 
                <div class="bg-[#f6f6f5] w-[18vw] h-[36vh] rounded-lg "></div>
            </div>
            
        </div>
         
       


        <div class="">
            <img src="{{ asset('storage/images/lnding (2).png') }}" class="w-[35vw] h-[95vh]" alt="logo">

        </div>
    </div>
</x-app-layout>
