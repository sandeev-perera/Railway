<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-xl font-bold text-[#05445E]">Edit Profile</h2>
    <p>This is the Admin Edit Profile</p>
</div>

<div class="bg-white rounded-xl shadow-lg max-w-6xl mx-auto min-h-[50vh] p-10 md:mt-[100px] flex flex-col md:flex-row items-center gap-10">
    <!-- Passenger Image -->
    <img src="{{ asset('images/user.jpg') }}" alt="Passenger Image" class="w-[35vh] h-[35vh] md:ml-[100px] rounded-full border-4 border-gray-300 object-cover" /> {{-- dynamic --}}
  
    <!-- Passenger Info -->
    <div class="space-y-5 text-center md:text-left md:ml-[100px]">
       <p class="text-3xl font-semibold text-gray-800" name="full_name">Praveen Achintha Fernando</p> {{-- dynamic --}}
      <p class="text-xl text-gray-700">Passenger ID: <span class="font-bold text-gray-900" name="Passenger_id">3001</span></p> {{-- dynamic --}}
      <p class="text-xl text-gray-700">Sector: <span class="font-bold text-gray-900" name="sector">Private</span></p> {{-- dynamic --}}
      <p class="text-xl text-gray-700">Route: <span class="font-bold text-gray-900" name="route">Panadura-Colombo</span></p> {{-- dynamic --}}
  
      <!-- Ticket Status -->
      <p class="text-2xl mt-4">
        Ticket Status:
        <span class="font-extrabold text-green-600 text-4xl" name="ticket_status">ACTIVE</span> {{-- dynamic --}}


      </p>
    </div>
  </div>