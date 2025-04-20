<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Details</title>
    <link rel="shortcut icon" href="{{url('images/train.png')}}" type="image/x-icon">

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
            <div class="flex flex-col md:flex-row gap-8 items-start">
                <!-- Left Side: Profile Image -->
                <div class="flex-shrink-0">
                    <img src="{{ asset('storage/' . $applicant->photo) }}" alt="Applicant Photo" class="w-40 h-40 object-cover rounded-xl shadow">
                </div>

                <!-- Right Side: Key Details -->
                <div class="flex-1 space-y-2">
                    <h2 class="text-2xl font-bold text-gray-800">{{ $applicant->full_name }}</h2>
                    <p><span class="font-semibold text-gray-700">NIC:</span> {{ $applicant->nic }}</p>
                    <p><span class="font-semibold text-gray-700">Email:</span> {{ $applicant->email }}</p>
                    <p>
                        <span class="font-semibold text-gray-700">Status:</span>
                        @if($applicant->status == 'Pending')
                            <span class="inline-block bg-yellow-300 text-yellow-900 px-2 py-1 rounded ml-1">Pending</span>
                        @elseif($applicant->status == 'Approved')
                            <span class="inline-block bg-green-500 text-white px-2 py-1 rounded ml-1">Approved</span>
                        @else
                            <span class="inline-block bg-red-500 text-white px-2 py-1 rounded ml-1">Rejected</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Additional Info Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8 text-gray-700 text-lg">
                <p><span class="font-semibold">ID:</span> {{ $applicant->id }}</p>
                <p><span class="font-semibold">Gender:</span> {{ $applicant->gender }}</p>
                <p><span class="font-semibold">Date of Birth:</span> {{ $applicant->date_of_birth }}</p>
                <p><span class="font-semibold">District:</span> {{ $applicant->district }}</p>
                <p><span class="font-semibold">Province:</span> {{ $applicant->province }}</p>
                <p><span class="font-semibold">Occupation:</span> {{ $applicant->occupation }}</p>
                <p><span class="font-semibold">Address:</span> {{ $applicant->address }}</p>
                <p><span class="font-semibold">Occupation Address:</span> {{ $applicant->occupation_address }}</p>
                <p><span class="font-semibold">Home Station:</span> {{ $applicant->home_station }}</p>
                <p><span class="font-semibold">Work Station:</span> {{ $applicant->work_station }}</p>
            </div>

            <!-- Source of Proof Document -->
            <div class="mt-10">
                <span class="font-semibold text-gray-700 block mb-2">Source of Proof:</span>
                <iframe src="{{ asset('storage/' . $applicant->source_of_proof) }}" class="w-full h-96 rounded-lg border border-gray-300" frameborder="0"></iframe>
            </div>

            <!-- Approve Button -->
            <form action="{{ route('admin.applications.approve', ['applicant' => $applicant->id]) }}" method="POST" class="inline-block mt-6">
                @csrf
                @method('PATCH')
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Approve</button>
            </form>

            <!-- Hidden checkbox trigger -->
            <label for="modal-toggle" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 cursor-pointer ml-2 mt-6 inline-block">Reject</label>
            <input type="checkbox" id="modal-toggle" class="hidden peer">

            <!-- Modal -->
            <div class="fixed inset-0 z-50 bg-black bg-opacity-50 hidden peer-checked:flex items-center justify-center">
                <div class="bg-white max-w-2xl w-full p-8 rounded-3xl border border-[#05445E] shadow-xl">
                    <h2 class="text-2xl font-bold mb-6 text-[#05445E] text-center">Rejection Reasons</h2>
                    <form method="POST" action="{{ route('admin.applications.reject', ['applicant' => $applicant->id]) }}" class="space-y-4">
                        @csrf
                        @method('PATCH')
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <input type="checkbox" id="img" name="reasons[]" value="Unacceptable profile image" class="w-5 h-5 text-blue-600 border-gray-300">
                                <label for="img" class="ml-3 text-gray-800">Unacceptable profile image</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="letter" name="reasons[]" value="Unacceptable letter" class="w-5 h-5 text-blue-600 border-gray-300">
                                <label for="letter" class="ml-3 text-gray-800">Unacceptable letter</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="contact" name="reasons[]" value="Contact number not valid" class="w-5 h-5 text-blue-600 border-gray-300">
                                <label for="contact" class="ml-3 text-gray-800">Contact Number is not valid</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="nic" name="reasons[]" value="NIC not valid" class="w-5 h-5 text-blue-600 border-gray-300">
                                <label for="nic" class="ml-3 text-gray-800">NIC not valid</label>
                            </div>
                            <div>
                                <label for="other" class="block mb-2 text-gray-700 font-medium">Other</label>
                                <textarea id="other" name="other_reason" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300 resize-none"></textarea>
                            </div>
                        </div>
                        <div class="flex justify-between mt-6">
                            <label for="modal-toggle" class="px-6 py-2 rounded bg-gray-600 text-white cursor-pointer hover:bg-gray-700">Cancel</label>
                            <button type="submit" class="px-6 py-2 rounded bg-red-600 text-white hover:bg-red-700">Reject with Email</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
