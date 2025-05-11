<div class="container mx-auto px-4 mt-10">
    <h2 class="text-2xl font-bold text-[#05445E] mb-6 text-center">My Journeys</h2>


    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-[#05445E] text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Checked In</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Checked Out</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Checked Out Time</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>                         
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($journeys as $journey)
                        @php
                            $status = $journey->status ?? 'unknown';

                            $statusClass = match($status) {
                                'Completed' => 'bg-green-200',
                                'Suspecious' => 'bg-yellow-100',
                                'Illegal' => 'bg-red-100',
                                'Ongoing' => 'bg-green-400',
                                default => 'bg-gray-900'
                            };
                        @endphp
                            <tr 
                                class="cursor-pointer hover:bg-[#D4F1F4] transition duration-150">
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $journey->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $journey->created_at}}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $journey->startstation?->station_name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{$journey->endstation?->station_name}}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{$journey->checked_out_time}}</td>
                                <td class="px-6 py-4 text-sm text-gray-900 {{$statusClass}}">{{$status}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">No Journeys found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
    </div>

    <div class="mt-6">
        {{-- {{ $applicants->links() }} --}}
    </div>
</div>

