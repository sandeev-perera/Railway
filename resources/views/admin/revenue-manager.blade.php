<div class="container mx-auto px-4 mt-10">
    <h2 class="text-2xl font-bold text-[#05445E] mb-6 text-center">Passengers List</h2>

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
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Passenger ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Amount</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Type</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Payment Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($payments as $payment)
                    <tr 
                        {{-- onclick="window.location='{{ route('admin.applicants.show', ['passenger' => $passenger->id]) }}'"  --}}
                        class="cursor-pointer hover:bg-[#D4F1F4] transition duration-150"
                    >
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $payment->id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $payment->passenger_id}}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $payment->Amount }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ucwords($payment->payment_type)}}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{$payment->payment_date}}</td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">No Payments found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{-- {{ $passengers->links() }} --}}
    </div>
</div>