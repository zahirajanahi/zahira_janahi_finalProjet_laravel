<x-app-layout>
    
    <div>
        <img src="{{ asset('storage/images/home.jpeg') }}" class="mx-auto w-[90vw] mt-6 rounded-3xl" alt="">
    </div>

    <div class="pt-7 ps-32 pb-10">
        <h1 class="text-xl font-bold pb-2">Task Organization</h1>
        <div class=" border-[#ba3819] ps-2 border-s-2 h-[5vh] pt-1 text-gray-500">Create, organize, and prioritize tasks with our intuitive interface</div>

         <div class="flex gap-3">
            <div>
                <div class="relative mt-5">
                    <img src="{{ asset('storage/images/home2.jpeg') }}" class="rounded-3xl w-[20vw] h-[35vh] object-cover " alt="">
                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30 rounded-3xl">
                      <span class="text-white text-3xl font-serif font-bold">Daily</span>
                    </div>
                  </div>
                  <div class="ms-7 pt-2 text-gray-900 flex flex-col gap-2">
                    <div>                    
                     <i class="bi bi-calendar"></i> <span>Planner</span>
                    </div>
                    <div>                    
                        <i class="bi bi-check-circle-fill"></i> <span>Habits</span>
                     </div>
                     <div>                    
                        <i class="bi bi-book-half"></i> <span>Journal</span>
                    </div>

                  </div>
            </div>
          
            <div>
                <div class="mt-5 relative">
                    <img src="{{ asset('storage/images/home3.png') }}" class="rounded-3xl w-[20vw] h-[35vh] object-cover" alt="">
                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30  rounded-3xl">
                    <span class="text-white text-3xl font-serif font-bold">Planners</span>
                    </div>
                </div>
                <div class="ms-7 pt-2 text-gray-800 flex flex-col gap-2">
                    <div>                    
                        <i class="bi bi-border-style"></i>
                        <span> Meal Planner</span>
                    </div>
                    <div>                    
                        <i class="bi bi-pin-map"></i>
                        <span>Travel Planner</span>
                     </div>
                     <div>                    
                        <i class="bi bi-calendar"></i> <span>Workout Planner</span>
                    </div>

                  </div>
            </div>  
                
            <div>
                <div class="mt-5 relative">
                    <img src="{{ asset('storage/images/home1.png') }}" class="rounded-3xl w-[20vw] h-[35vh] object-cover" alt="">
                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30 rounded-3xl">
                        <span class="text-white text-3xl font-serif font-bold">Personal</span>
                    </div>
                 </div>
                 <div class="ms-7 pt-2 text-gray-800 flex flex-col gap-2">
                    <div>                    
                        <i class="bi bi-book"></i>
                        <span>Books</span>
                    </div>
                    <div>                    
                        <i class="bi bi-cash-stack"></i> <span>Finance</span>
                     </div>
                     <div>                    
                        <i class="bi bi-film"></i> <span>Movies & Series</span>
                    </div>

                  </div>
            </div>
            
           <div>
            <div class="mt-5 relative">
                <img src="{{ asset('storage/images/home4.png') }}" class="rounded-3xl w-[20vw] h-[35vh] object-cover" alt="">
                <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30 rounded-3xl">
                  <span class="text-white text-3xl font-serif font-bold">Goals</span>
                </div>
              </div>
              <div class="ms-7 pt-2 text-gray-800 flex flex-col gap-2">
                <div>                    
                    <i class="bi bi-alt"></i> <span>Goals</span>
                </div>
                <div>                    
                    <i class="bi bi-diagram-3"></i> <span>Vision</span>
                 </div>
                 <div>                    
                    <i class="bi bi-calendar"></i> <span>Health</span>
                </div>

              </div>
           </div>
             
                  
         </div>
    </div>

    <div class="pt-7 ps-32 pb-10 flex gap-2 items-center">
        {{-- <div class="border-[#ba3819] w-[1.5vw]  border-b-2 "></div> --}}
        <div class="text-gray-500  border-[#ba3819] ps-2 border-s-2 h-[6.2vh]"> Tasker platform helps you stayon top of your tasks <br> and track your time efficiently. </div>
    </div>
    <div class="rounded-3xl bg-gray-100 mx-auto h-[97vh] w-[90vw]  ">
        <img src="{{ asset('storage/images/dash.png') }}" class="w-[82vw]  rounded-xl mx-auto pt-10 h-[90vh]" alt="">
    </div>

    <div class="flex pt-10 mx-auto w-[80vw] gap-5">
        <div class=" w-[40vw] h-[60vh] rounded-3xl">
            <h1 class="text-black text-4xl  pt-16">Real-Time <span class="text-[#ba3819]">Chat</span> for </h1>
            <h1 class="text-black text-4xl pt-3 ">Seamless Collaboration</h1>
            <p class="text-gray-600 pt-4">Enhance team communication with our real time chat feature, you can share updates, discuss tasks. and collaborate effortessely to keep everyone on the same page and drive projects forward</p>
        </div>
        <div class="bg-gray-100 w-[35vw] h-[80vh] rounded-3xl"><img src="{{ asset('storage/images/chat.png') }}"  alt="">
        </div>
    </div>
     
    <div class="w-[90vw] mx-auto rounded-3xl bg-gray-100 h-[80vh] mt-10 flex gap-10">
        <div class="mt-20"><img src="{{ asset('storage/images/calendar.png') }}" class="w-[45vw] h-[60vh] rounded-3xl " alt=""></div>
        <div>
            <h1 class="text-4xl text-black mt-28">Your Task <span class="text-[#ba3819]">Calendar</span> </h1>
            <p class="text-gray-600 pt-5">Stay on top of your schedule with our interactive calendar, designed to organize <br> and display all your tasks and deadlines in one convenient view</p>
        </div>
    </div>

    <footer class="bg-white py-12 mx-20 border-t pb-10 pt-10 mt-10">
        <div class="container mx-auto px-4">
       
    
          <div class="flex flex-wrap justify-center text-center lg:text-left lg:justify-between">
            <div class="w-full lg:w-1/3 mb-6 lg:mb-0">
              <h2 class="font-bold text-lg text-gray-800">Planify</h2>
              <p class="text-gray-500 mt-4">
                Planify is a web-based platform designed to facilitate effective teamwork and collaboration among team members.
              </p>
              <button class="mt-4 px-4 py-2 bg-[#843420] text-white rounded-lg">Sign up</button>
            </div>
            <div class="w-full lg:w-1/3 mb-6 ps-20 lg:mb-0">
              <h3 class="font-medium text-gray-800">Navigation</h3>
              <ul class="mt-4 space-y-2 text-gray-500">
                <li>Products</li>
                <li>Services</li>
                <li>Contact</li>
              </ul>
            </div>
            <div class="w-full lg:w-1/3">
              <h3 class="font-medium text-gray-800">Follow Us</h3>
              <ul class="mt-4 space-y-2 text-gray-500">
                <li>LinkedIn</li>
                <li>X</li>
                <li>Instagram</li>
                <li>Facebook</li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    
    
      <div class="fixed bottom-4 right-4">
        <a href="#hero">
            <button class="bg-[#843420] text-white px-4 py-3 rounded-full shadow-lg">
                <i class="bi bi-arrow-up-short"></i>
            </button>
        </a>
    
      </div>
    
</x-app-layout>
