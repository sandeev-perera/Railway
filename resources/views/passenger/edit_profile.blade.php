{{-- <div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-xl font-bold text-[#05445E]">Edit Profile</h2>
    <p>This is the Edit Profile</p>
</div> --}}


{{-- <div class="">
    <img src="{{asset('storage/'.$user->photo)}}" alt="Passenger Image" class="w-[35vh] h-[35vh] md:ml-[100px] rounded-full border-4 border-gray-300 object-cover" />
</div> --}}

<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Edit Profile</h2>

    <form action="{{route('passenger.update' , ['applicant' => $user->id])}}" method="POST">
        @csrf
        @method('PUT')

        {{-- Top Section --}}
        <div class="flex flex-col md:flex-row gap-6 mb-4">
            {{-- User Image --}}
            <div class="md:w-1/3 flex justify-center">
                <img src="{{asset('storage/'.$user->photo)}}" alt="User Image" class="w-32 h-32 rounded-full object-cover">
            </div>

            {{-- View-Only Details --}}
            <div class="md:w-2/3 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-600 font-semibold mb-1">Full Name</label>
                    <p class="text-gray-800">{{ $user->full_name }}</p>
                </div>
                <div>
                    <label class="block text-gray-600 font-semibold mb-1">NIC</label>
                    <p class="text-gray-800">{{ $user->nic }}</p>
                </div>
                <div>
                    <label class="block text-gray-600 font-semibold mb-1">Date of Birth</label>
                    <p class="text-gray-800">{{ $user->date_of_birth }}</p>
                </div>
                <div>
                    <label class="block text-gray-600 font-semibold mb-1">Email</label>
                    <p class="text-gray-800">{{ $user->email }}</p>
                </div>
            </div>
        </div>

        {{-- Editable Fields --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 font-medium mb-1">Address</label>
                <input type="text" name="address" class="w-full border rounded px-3 py-2" value="{{ old('address', $user->address) }}">
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-1">District</label>
                <select name="district" class="form-control mb-2">
                    <option value="" disabled {{ old('district', $user->district) ? '' : 'selected' }}>
                        -- Select District --
                    </option>
                    @php
                        $districts = [
                            "Ampara", "Anuradhapura", "Badulla", "Batticaloa", "Colombo", "Galle", "Gampaha", "Hambantota", "Jaffna", 
                            "Kalutara", "Kandy", "Kegalle", "Kilinochchi", "Kurunegala", "Mannar", "Matale", "Matara", "Monaragala", 
                            "Mullaitivu", "Nuwara Eliya", "Polonnaruwa", "Puttalam", "Ratnapura", "Trincomalee", "Vavuniya"
                        ];
                    @endphp
                
                    @foreach($districts as $district)
                        <option value="{{ $district }}" {{ old('district', $user->district) == $district ? 'selected' : '' }}>
                            {{ $district }}
                        </option>
                    @endforeach
                </select>
                
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-1">Occupation</label>
                <input type="text" name="occupation" class="w-full border rounded px-3 py-2" value="{{ old('occupation', $user->occupation) }}">
            </div>
            
        </div>

        {{-- Contact Fields --}}
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Contact Numbers</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Mobile</label>
                    <input type="text" name="personal_contact" class="w-full border rounded px-3 py-2" value="{{ old('personal_contact', $personal_contact) }}">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Home</label>
                    <input type="text" name="lan_contact" class="w-full border rounded px-3 py-2" value="{{ old('lan_contact', $lan_contact) }}">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Work</label>
                    <input type="text" name="work_contact" class="w-full border rounded px-3 py-2" value="{{ old('work_contact', $work_contact) }}">
                </div>
            </div>
        </div>

        {{-- Submit --}}
        <div class="text-center">
            <button type="submit" class="px-4 py-2 bg-[#05445E] text-white rounded-full cursor-pointer">
                Save Changes
            </button>
        </div>
    </form>
</div>

{{-- 
right side - full_name, nic, dob, email, 

bottom - address, district , occupation, occupation-sector, address
bottom- contact 
        home, lan, work


editable - address, district, occupation, occupation address, all contacts. --}}
