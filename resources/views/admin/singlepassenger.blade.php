<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    

    <div class="container mx-auto mt-10 px-4">
       
        <div class="max-w-5xl mx-auto bg-white rounded-xl shadow-md p-8">
            @if(session('error'))
                <div class="bg-red-400 border border-red-400 text-white px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <div class="flex flex-col md:flex-row gap-8 items-start">
                <!-- Left Side: Profile Image -->
                <div class="flex-shrink-0">
                    <img src="{{ asset('storage/' . $passenger->Applicant->photo) }}" alt="Applicant Photo" class="w-40 h-40 object-cover rounded-xl shadow">
                </div>

                <!-- Right Side: Key Details -->
                <div class="flex-1 space-y-2">
                    <h2 class="text-2xl font-bold text-gray-800">{{ $passenger->Applicant->full_name }}</h2>
                    <p><span class="font-semibold text-gray-700">Passenger ID:</span> {{ $passenger->id }}</p>

                    <p><span class="font-semibold text-gray-700">NIC:</span> {{ $passenger->Applicant->nic }}</p>
                    <p><span class="font-semibold text-gray-700">Email:</span> {{ $passenger->Applicant->email }}</p>
                    <p>
                        <span class="font-semibold text-gray-700">Status:</span>
                        @if($passenger->status == 'Expired')
                            <span class="inline-block bg-yellow-300 text-yellow-900 px-2 py-1 rounded ml-1">Expired</span>
                        @elseif($passenger->status == 'Active')
                            <span class="inline-block bg-green-500 text-white px-2 py-1 rounded ml-1">Active</span>
                        @else
                            <span class="inline-block bg-red-500 text-white px-2 py-1 rounded ml-1">Suspended</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Additional Info Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8 text-gray-700 text-lg">
                <p><span class="font-semibold">Application ID:</span> {{ $passenger->Applicant->id }}</p>
                <p><span class="font-semibold">Gender:</span> {{ $passenger->Applicant->gender }}</p>
                <p><span class="font-semibold">Date of Birth:</span> {{ $passenger->Applicant->date_of_birth }}</p>
                <p><span class="font-semibold">District:</span> {{ $passenger->Applicant->district }}</p>
                <p><span class="font-semibold">Province:</span> {{ $passenger->Applicant->province }}</p>
                <p><span class="font-semibold">Occupation:</span> {{ $passenger->Applicant->occupation }}</p>
                <p><span class="font-semibold">Address:</span> {{ $passenger->Applicant->address }}</p>
                <p><span class="font-semibold">Occupation Address:</span> {{ $passenger->Applicant->occupation_address }}</p>
                <p><span class="font-semibold">Home Station:</span> {{ $passenger->Applicant->home_station }}</p>
                <p><span class="font-semibold">Work Station:</span> {{ $passenger->Applicant->work_station }}</p>
            </div>

            <!-- Source of Proof Document -->
            <div class="mt-10">
                <span class="font-semibold text-gray-700 block mb-2">Source of Proof:</span>
                <iframe src="{{ asset('storage/' . $passenger->Applicant->source_of_proof) }}" class="w-full h-96 rounded-lg border border-gray-300" frameborder="0"></iframe>
            </div>

            <!-- Approve Button -->
           

            @if ($passenger->status != "Suspended")
            <x-suspend-passenger />
            @endif
            <!-- Hidden checkbox trigger -->


            <!-- Modal -->
            <div class="fixed inset-0 z-50 bg-black bg-opacity-50 hidden peer-checked:flex items-center justify-center">
                <div class="bg-white max-w-2xl w-full p-8 rounded-3xl border border-[#05445E] shadow-xl">
                    <h2 class="text-2xl font-bold mb-6 text-[#05445E] text-center">Suspend Reasons</h2>
                    <form method="POST" action="{{ route('passenger.suspend', ['passenger' => $passenger->id]) }}" class="space-y-4">
                        @csrf
                        @method('PATCH')
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <input type="checkbox" id="img" name="reasons[]" value="vandalism" class="w-5 h-5 text-blue-600 border-gray-300">
                                <label for="img" class="ml-3 text-gray-800">Vandalism</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="letter" name="reasons[]" value="card duplication" class="w-5 h-5 text-blue-600 border-gray-300">
                                <label for="letter" class="ml-3 text-gray-800">Card Duplication</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="contact" name="reasons[]" value="illegal journey" class="w-5 h-5 text-blue-600 border-gray-300">
                                <label for="contact" class="ml-3 text-gray-800">Illegal Journey</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="nic" name="reasons[]" value="suspicious journey" class="w-5 h-5 text-blue-600 border-gray-300">
                                <label for="nic" class="ml-3 text-gray-800">Suspicious Journey Records</label>
                            </div>
                            <div>
                                <label for="other" class="block mb-2 text-gray-700 font-medium">Other</label>
                                <textarea id="other" name="other_reason" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300 resize-none"></textarea>
                            </div>
                        </div>
                        <div class="flex justify-between mt-6">
                            <label for="modal-toggle" class="px-6 py-2 rounded bg-gray-600 text-white cursor-pointer hover:bg-gray-700">Cancel</label>
                            <button type="submit" class="px-6 py-2 rounded bg-red-600 text-white hover:bg-red-700">Suspend Passenger</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
