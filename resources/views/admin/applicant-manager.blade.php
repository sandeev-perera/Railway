<div class="container mx-auto px-4 mt-10">
    <h2 class="text-2xl font-bold text-[#05445E] mb-6 text-center">Applicants List</h2>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-[#05445E] text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Full Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">District</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Applied Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <h1 class="text-lg text-gray-600 font-semibold p-4">Province: {{ session("province") }}</h1>
                @forelse ($applicants as $applicant)
                    <tr 
                        onclick="window.location='{{ route('admin.applications.show', ['applicant' => $applicant->id]) }}'" 
                        class="cursor-pointer hover:bg-[#D4F1F4] transition duration-150"
                    >
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $applicant->id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $applicant->full_name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $applicant->district }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $applicant->created_at }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                Pending
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">No applicants found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{-- {{ $applicants->links() }} --}}
    </div>
</div>

