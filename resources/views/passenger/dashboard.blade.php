<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
    <!-- Profile Card -->
    <div class="bg-[#E0F7FA] p-6 shadow-lg rounded-lg flex flex-col items-center md:col-span-2 w-full">
        <img src="{{ asset('storage/'.session("user")->photo) }}" alt="Profile Photo" class="w-24 h-24 md:w-32 md:h-32 rounded-full object-cover border-4 border-gray-300">
        <h3 class="font-bold text-lg md:text-xl mt-4 text-center">{{session("user")->full_name}}</h3>
        <p class="text-gray-600 text-sm md:text-base text-center">NIC : {{session("user")->nic}}</p>
        <p class="text-gray-600 text-sm md:text-base text-center">Email : {{session("user")->email}}</p>
        <p class="text-gray-600 text-sm md:text-base text-center">Applicant ID : {{session("user")->id}}</p>
        <p class="text-gray-600 text-sm md:text-base text-center">Passenger ID : --</p>

    </div>
    
    <!-- Support Section -->
    <div class="bg-[#E0F7FA] p-6 shadow-lg rounded-lg text-center w-full">
        <h3 class="font-bold text-xl md:text-2xl mt-21 md:mb-8">Support</h3>
        <p class="text-gray-600 mt-4 text-sm md:text-base font-bold">Tap & Go Hotline: 0112 001 122</p>
        <p class="text-gray-600 mt-4 text-sm md:text-base">
            Support Email: 
            <a href="mailto:taptogosupport@gmail.com" class="text-lg font-bold text-cyan-700">
                tapandgosupport@gmail.com
            </a>
        </p>
    </div>
</div>


<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
    <!-- Active Tickets -->
    <div class="bg-[#E0F7FA] p-6 shadow-lg rounded-lg text-center">
        <div class="text-2xl">🎫</div>
        <h3 class="font-bold">Active Tickets</h3>
        <p class="text-lg mt-2">1</p>
    </div>
    
    <!-- Upcoming Renewals -->
    <div class="bg-[#E0F7FA] p-6 shadow-lg rounded-lg text-center">
        <div class="text-2xl">🔄</div>
        <h3 class="font-bold">Upcoming Renewals</h3>
        <p class="text-lg mt-2">14, May</p>
    </div>
    
    <!-- Selected Route -->
    <div class="bg-[#E0F7FA] p-6 shadow-lg rounded-lg text-center">
        <div class="text-2xl">📍</div>
        <h3 class="font-bold">Selected Route</h3>
        <p class="text-lg mt-2 font-bold">Colombo - Kandy</p>
    </div>
</div>




{{-- <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
    <!-- Card 1 -->
    <div class="bg-[#E0F7FA] p-6 shadow-lg rounded-lg text-center">
        <div class="text-2xl">🎫</div>
        <h3 class="font-bold">Active Tickets</h3>
        <p class="text-lg mt-2">1</p>
    </div>

    <!-- Card 2 -->
    <div class="bg-[#E0F7FA] p-6 shadow-lg rounded-lg text-center">
        <div class="text-2xl">🔄</div>
        <h3 class="font-bold">Upcoming Renewals</h3>
        <p class="text-lg mt-2">14, May</p>
    </div>

    <!-- Card 3 -->
    <div class="bg-[#E0F7FA] p-6 shadow-lg rounded-lg text-center">
        <div class="text-2xl">📍</div>
        <h3 class="font-bold">Selected Route</h3>
        <p class="text-lg mt-2 font-bold">Colombo - Kandy</p>
    </div> --}}

    <h1>Welcome, {{ session('user')->full_name }}</h1>
    <p>Email: {{ session('user')->email }}</p>

</div>


