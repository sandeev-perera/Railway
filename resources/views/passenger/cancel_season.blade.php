{{-- <form action="" method="POST" onsubmit="return confirm('Are you sure you want to cancel your season ticket?')">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger">Cancel Season Ticket</button>
</form> --}}

<div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-semibold mb-4">Cancel Season Ticket</h2>

    <p class="mb-4 text-gray-700">
        Canceling your season ticket will permanently remove your access. This action cannot be undone.
    </p>

    <form action="{{ route('cancel.passenger', session('user')) }}" method="POST">
        @csrf

        <label for="confirmation_string" class="block font-medium mb-2">
            Please type <strong class="text-red-600">CANCEL</strong> to confirm:
        </label>
        <input
            type="text"
            name="confirmation_string"
            id="confirmation_string"
            class="w-full border border-gray-300 p-2 rounded mb-4"
            placeholder="Type CANCEL here"
            required
        >

        <button
            type="submit"
            class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
        >
            Confirm Cancellation
        </button>
    </form>
</div>