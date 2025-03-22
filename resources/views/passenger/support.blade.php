<div class="p-6  bg-white rounded-lg shadow-lg">
    <h2 class="text-3xl font-bold text-[#05445E] text-center mb-10 mt-10">Get your Seasonal Ticket</h2>
    <form class="space-y-4 mt-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold">From</label>
                <input type="text" class="w-full p-2 border border-gray-400 rounded-[15px] bg-gray-100" value="{{session('user')->home_station}}" disabled >
            </div>
            <div>
                <label class="block font-semibold">To</label>
                <input type="text" class="w-full p-2 border border-gray-400 rounded-[15px] bg-gray-100" value="{{session('user')->work_station}}" disabled>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- <div>
                <label class="block font-semibold">Sector</label>
                <div class="flex space-x-4">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" checked>
                        <span>Government</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox">
                        <span>Private</span>
                    </label>
                </div>
            </div> --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Sector</label>
                <div class="px-4 py-2 bg-gray-100 text-gray-800 rounded-md shadow-sm inline-block font-semibold">
                    {{ ucfirst(session('user')->occupation_sector) }}
                </div>
            </div>
            <div>
                <label class="block font-semibold">Price</label>
                <input type="text" class="w-full p-2 border border-gray-400 rounded-[15px] bg-gray-100" value="Rs.1200" disabled>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold">Travel Class</label>
                <select class="w-full p-2 border border-gray-400 rounded-[15px] hover:bg-[#D4F1F4]">
                    <option>1st Class</option>
                    <option>2nd Class</option>
                    <option>3rd Class</option>
                </select>
            </div>
            <div>
                <label class="block font-semibold">Duration</label>
                <select class="w-full p-2 border border-gray-400 rounded-[15px] hover:bg-[#D4F1F4]">
                    <option>Monthly</option>
                    <option>Quarterly</option>
                </select>
            </div>
        </div>
        <div>
            <label class="block font-semibold">Payment Method</label>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                <label class="flex items-center space-x-2 p-2 border border-gray-400 rounded-[15px] hover:bg-[#D4F1F4] cursor-pointer">
                    <img src="{{url('images/visa.png')}}" class="w-6" alt="Visa">
                    <span>Pay with visa</span>
                </label>
                <label class="flex items-center space-x-2 p-2 border border-gray-400 rounded-[15px] hover:bg-[#D4F1F4] cursor-pointer">
                    <img src="{{url('images/master_card.png')}}" class="w-6" alt="MasterCard">
                    <span>Pay with master card</span>
                </label>
                <label class="flex items-center space-x-2 p-2 border border-gray-400 rounded-[15px] hover:bg-[#D4F1F4] cursor-pointer">
                    <img src="{{url('images/cash.png')}}" class="w-6" alt="Cash">
                    <span>Pay with cash</span>
                </label>
            </div>
        </div>
        <div class="flex space-x-4 ">
            <button type="submit" class="px-4 py-2 bg-[#05445E] text-white rounded-full cursor-pointer">Submit and Pay</button>
        </div>
    </form>
</div>


