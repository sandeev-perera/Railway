<div class="container mx-auto px-4 mt-10">
    <h2 class="text-2xl font-bold text-[#05445E] mb-6 text-center">Admin List</h2>

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
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Role</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Assigned Station</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($admins as $admin)
                    <tr 
                        {{-- onclick="window.location='{{ route('admin.applicants.show', ['passenger' => $passenger->id]) }}'"  --}}
                        class="cursor-pointer hover:bg-[#D4F1F4] transition duration-150"
                    >
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $admin->id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $admin->full_name}}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $admin->adminrole->role_name}}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ optional($admin->station)->station_name ?? 'Not Assigned' }}</td>

                        {{-- <td class="px-6 py-4 text-sm text-gray-900">{{ $passenger->created_at }}</td> --}}
                        {{-- <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                Pending
                            </span>
                        </td> --}}
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">No passengers found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{-- {{ $admins->links() }} --}}
    </div>
</div>