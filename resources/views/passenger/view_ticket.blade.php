
{{-- <div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-xl font-bold text-[#05445E]">Your Tickets</h2>
    <p>View and manage your purchased tickets.</p>
</div> --}}



<div class="flex flex-col items-center space-y-8 my-22 max-w-full">
    
    <!-- Front Side -->
    <div class="w-[350px] max-w-full bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
      <!-- Top Blue Bar -->
      <div class="bg-[#0f3b55] h-[40px] flex items-center px-4">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-12">
      </div>
      
      <!-- Content Area -->
      <div class="flex flex-row px-4 py-3">
        <!-- Profile Picture -->
        <div class="w-24 h-24 rounded-md overflow-hidden border border-gray-300 mr-4 flex-shrink-0">
          <img src="{{ asset('storage/'.$user->photo) }}" alt="profile image" class="w-full h-full object-cover"/>
        </div>

        <!-- Info -->
        <div class="text-sm space-y-1">
          <div><span class="font-semibold" name="full_name">Name: </span>{{$user->full_name}}</div>
          <div><span class="font-semibold" name="passenger_id">Passenger ID: </span>{{$user->passenger->id}}</div>
      <div><span class="font-semibold" name="sector">Sector: </span>{{$user->occupation_sector}}</div>
          <div><span class="font-semibold" name="route">Route: </span>{{$user->home_station}} - {{$user->work_station}}</div>
        </div>
      </div>

      <!-- Barcode -->
      <div class="px-4 pb-3">
        <div class="w-40 h-8">
          {!! DNS1D::getBarcodeHTML($user->passenger->passenger_token, 'C128', 0.74, 30) !!}
        </div>
      </div>
    </div>

    <!-- Back Side -->
    <div class="w-[350px] max-w-full bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
      <!-- Top Blue Bar -->
      <div class="bg-[#0f3b55] h-[40px]"></div>
      <!-- Content Area -->
      <div class="flex items-center justify-center h-[160px]">
        <p class="text-sm text-gray-700" name="date">Issued Date: {{ optional($user->passenger->barcodeCard)->created_at->format('Y-m-d') }}
        </p>
      </div>
    </div>

  </div>

<div class="p-6 bg-white rounded shadow text-center">
    <h2 class="text-lg font-bold mb-4">Passenger Barcode</h2>

    {{-- Barcode --}} <div class="text_center w-[50%] m-auto">
      {!! DNS1D::getBarcodeHTML($user->passenger->passenger_token, 'C128', 1.5, 80) !!}

    </div>

    {{-- Readable Token --}}
    {{-- <div class="mt-2 text-sm font-semibold tracking-widest">
        {{ $passenger->passenger_token }}
    </div> --}}
</div>
