@if(session('success'))
<div class="bg-green-100 text-green-900 border-l-4 border-green-600 px-5 py-3 rounded-md mb-5 font-medium max-w-[700px] mx-auto">
    {{ session('success') }}
</div>
@endif

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
    <!-- Profile Card -->
    <div class="bg-[#E0F7FA] p-6 shadow-lg rounded-lg flex flex-col items-center md:col-span-2 w-full">
        <img src="{{ asset('storage/'.$user->photo) }}" alt="Profile Photo" class="w-24 md:w-32 md:h-32 rounded-full object-cover border-4 border-gray-300">
        <h3 class="font-bold text-lg md:text-xl mt-4 text-center">{{$user->full_name}}</h3>
    <h4 class="font-medium text-sm md:text-base mt-2 text-center text-gray-600">{{ session("role_name") }}</h4>        
    <p class="text-gray-600 text-sm md:text-base text-center">Email : {{$user->email}}</p>
        <p class="text-gray-600 text-sm md:text-base text-center">Admin ID : {{$user->id}}</p>      
    </div>
    
    <!-- Support Section -->
    <div class="bg-[#E0F7FA] p-6 shadow-lg rounded-lg text-center w-full">
        <h3 class="font-bold text-xl md:text-2xl mt-21 md:mb-8">Support</h3>
        <p class="text-gray-600 mt-4 text-sm md:text-base font-bold">Tap & Go Hotline: 0112 001 122</p>
        <p class="text-gray-600 mt-4 text-sm md:text-base">
            Support Email: 
            <a href="mailto:taptogosupport@gmail.com" class="text-lg font-bold text-cyan-700">
                tapandgoadminsupport@gmail.com
            </a>
        </p>
    </div>
</div>