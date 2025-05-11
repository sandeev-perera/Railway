@php
    $status = $user->passenger->status ?? 'unknown';

    $statusClass = match($status) {
        'Active' => 'bg-green-200',
        'Expired' => 'bg-yellow-100',
        'Suspended' => 'bg-red-100',
        default => 'bg-gray-100'
    };
@endphp

@if(session('success'))
<div class="bg-green-100 text-green-900 border-l-4 border-green-600 px-5 py-3 rounded-md mb-5 font-medium max-w-[700px] mx-auto">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="bg-red-100 text-red-900 border-l-4 border-red-600 px-5 py-3 rounded-md mb-5 font-medium max-w-[700px] mx-auto">
    {{ session('error') }}
</div>
@endif

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">


    <!-- Profile Card -->
    <div class="bg-[#E0F7FA] p-6 shadow-lg rounded-lg flex flex-col items-center md:col-span-2 w-full">
        <img src="{{ asset('storage/'.$user->photo) }}" alt="Profile Photo" class="w-24 h-24 md:w-32 md:h-32 rounded-full object-cover border-4 border-gray-300">
        <h3 class="font-bold text-lg md:text-xl mt-4 text-center">{{$user->full_name}}</h3>
        <h5 class="inline-block text-white bg-green-400 px-4 py-1 rounded-full font-semibold text-sm md:text-base text-center shadow-md">
            {{ ucfirst(session('role')) }}
        </h5>
        <p class="text-gray-600 text-sm md:text-base text-center">NIC : {{$user->nic}}</p>
        <p class="text-gray-600 text-sm md:text-base text-center">Email : {{$user->email}}</p>
        <p class="text-gray-600 text-sm md:text-base text-center">Applicant ID : {{$user->id}}</p>
        @if (session("role")== "passenger")
        <p class="text-gray-600 text-sm md:text-base text-center">Passenger ID : {{session("passengerID")}}</p>         
        @endif
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
    <div class="p-6 shadow-lg rounded-lg text-center {{$statusClass}}">
        <div class="text-2xl">🎫</div>
        <h3 class="font-bold">Ticket Status</h3>
        @if (session('role') == "applicant")
            <p class="text-lg mt-2">Pending Payment</p>
        @else
        <p class="text-lg font-semibold px-3 py-1 rounded-full inline-block mt-2">
            {{ $status }}
        </p>
        @endif
        </div>
    
    
    @if (session('role') == "passenger")
    <div class="bg-[#E0F7FA] p-6 shadow-lg rounded-lg text-center">
        <div class="text-2xl">🔄</div>
        <h3 class="font-bold">Upcoming Renewals</h3>
        <p class="text-lg mt-2">{{$user->passenger->BarcodeCard->expire_date}}</p>
    </div>
    @endif
    <!-- Upcoming Renewals -->

    
    <!-- Selected Route -->
    <div class="bg-[#E0F7FA] p-6 shadow-lg rounded-lg text-center">
        <div class="text-2xl">📍</div>
        <h3 class="font-bold">Selected Route</h3>
        <p class="text-lg mt-2 font-bold">{{$user->home_station}} - {{$user->work_station}}</p>
    </div>
</div>