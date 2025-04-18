<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-xl font-bold text-[#05445E]">Search Passenger</h2>

    <input type="text" wire:model="token" placeholder="Enter 36-character Passenger Token"
           maxlength="36"
           class="border border-gray-300 rounded px-4 py-2 mt-2 w-full max-w-md" />

    @if (session()->has('error'))
        <p class="text-red-500 mt-2">{{ session('error') }}</p>
    @endif
</div>

@if (isset($passenger))
    <div class="bg-white rounded-xl shadow-lg max-w-6xl mx-auto min-h-[50vh] p-10 md:mt-[40px] flex flex-col md:flex-row items-center gap-10">
        <img src="{{ asset('images/user.jpg') }}" alt="Passenger Image"
             class="w-[35vh] h-[35vh] md:ml-[100px] rounded-full border-4 border-gray-300 object-cover" />

        <div class="space-y-5 text-center md:text-left md:ml-[100px]">
            <p class="text-3xl font-semibold text-gray-800">{{ $passenger->full_name }}</p>
            <p class="text-xl text-gray-700">Passenger ID:
                <span class="font-bold text-gray-900">{{ $passenger->id }}</span>
            </p>
            <p class="text-xl text-gray-700">Sector:
                <span class="font-bold text-gray-900">{{ $passenger->sector }}</span>
            </p>
            <p class="text-xl text-gray-700">Route:
                <span class="font-bold text-gray-900">{{ $passenger->route }}</span>
            </p>
            <p class="text-2xl mt-4">
                Ticket Status:
                <span class="font-extrabold text-green-600 text-4xl">{{ $passenger->ticket_status }}</span>
            </p>
        </div>
    </div>
@endif
