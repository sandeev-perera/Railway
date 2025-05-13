{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Payment Page</title>
</head>
<body class="bg-gray-100">

<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
    <h2 class="text-2xl font-bold text-center text-[#05445E] mb-6">Confirm and Pay</h2>

    <form>
        @csrf

<div class="space-y-2 text-sm font-medium mb-6">
    <div class="flex justify-between">
        <span class="text-gray-700">Route</span>
        <span class="text-gray-900 font-semibold">{{$data['start_station']}} → {{$data["end_station"]}}</span>
    </div>
    <div class="flex justify-between">
        <span class="text-gray-700">Class</span>
        <span class="text-gray-900 font-semibold">{{$data['class']}}</span>
    </div>
    <div class="flex justify-between">
        <span class="text-gray-700">Sector</span>
        <span class="text-gray-900 font-semibold">{{$data['sector']}}</span>
    </div>
    <div class="flex justify-between">
        <span class="text-gray-700">Duration</span>
        <span class="text-gray-900 font-semibold">{{$data['ticket_duration']}}</span>
    </div>
    <div class="flex justify-between">
        <span class="text-gray-700">Full Payment</span>
        <span class="text-gray-900 font-semibold">Rs.{{$data['price']}}</span>
    </div>
</div>

        <!-- Hidden Inputs -->
        <input type="hidden" name="class" value="2nd">
        <input type="hidden" name="ticket_duration" value="M">
        <input type="hidden" name="sector" value="GOV">
        <input type="hidden" name="route" value="Colombo-Maharagama">

        <!-- Stripe Card Element -->
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Card Details</label>
            <div id="card-element" class="p-3 border rounded bg-gray-100"></div>
            <div id="card-errors" class="text-red-600 mt-2 text-sm"></div>
        </div>

        <hr class="my-6">

        <div class="text-center">
            <button type="button" id="submit-button" class="bg-[#05445E] text-white px-6 py-2 rounded-full hover:bg-[#032f3e] transition mt-3" onclick="createToken()">
                Pay Now
            </button>
        </div>
    </form>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        var stripe = Stripe('{{ env("STRIPE_KEY") }}');
        var elements = stripe.elements();
        var cardElement = elements.create('card');

        cardElement.mount('#card-element'); // Correct mount target

        const form = document.getElementById('payment-form');
        const submitButton = document.getElementById('submit-button');
        const errorDisplay = document.getElementById('card-errors');

        function createToken(){
            stripe.createToken(cardElement).then(function(result) {
                console.log(result);
    // Handle result.error or result.token
            });

        }


        form.addEventListener('submit', async function (e) {
            e.preventDefault();
            submitButton.disabled = true;

            const {paymentMethod, error} = await stripe.createPaymentMethod({
                type: 'card',
                card: cardElement,
            });

            if (error) {
                errorDisplay.textContent = error.message;
                submitButton.disabled = false;
            } else {
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'payment_method';
                hiddenInput.value = paymentMethod.id;
                form.appendChild(hiddenInput);
                form.submit();
            }
        });
    });
</script>


</body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
    <h2 class="text-2xl font-bold text-center text-[#05445E] mb-6">Confirm and Pay</h2>

    <form method="post" id="payment-form" action='{{ $data['type'] == 'Registration'
                 ? route('passenger.register', ['applicant' => session('user')])
                 : route('passenger.renew', ['passenger' => session('passengerID')]) }}'>
        @csrf

        <!-- Summary Display -->
        <div class="space-y-2 text-lg font-medium mb-6">
            <div class="flex justify-between">
                <span class="text-gray-700">Payment For</span>
                <span class="text-gray-900 font-semibold">{{$data['type']}}</span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-700">Route</span>
                <span class="text-gray-900 font-semibold">{{ $data['start_station'] }} → {{ $data["end_station"] }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-700">Class</span>
                <span class="text-gray-900 font-semibold">{{ $data['class'] }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-700">Sector</span>
                <span class="text-gray-900 font-semibold">{{ $data['sector'] }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-700">Duration</span>
                <span class="text-gray-900 font-semibold">
                    {{ $data['ticket_duration'] === 'M' ? 'Monthly' : 'Quarterly' }}
                </span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-700">Full Payment</span>
                <span class="text-gray-900 font-semibold">Rs.{{ $data['price'] }}</span>
            </div>
        </div>

        <!-- Hidden Inputs -->
        <input type="hidden" name="class" value="{{ $data['class'] }}">
        <input type="hidden" name="ticket_duration" value="{{ $data['ticket_duration'] }}">
        
        <!-- Stripe Card Element -->
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Card Details</label>
            <div id="card-element" class="p-3 border rounded bg-gray-100"></div>
            <div id="card-errors" class="text-red-600 mt-2 text-sm"></div>
        </div>

        <hr class="my-6">

        <div class="text-center">
            <button type="submit" id="submit-button" class="bg-[#05445E] text-white px-6 py-2 rounded-full hover:bg-[#032f3e] transition mt-3">
                Pay Now
            </button>
        </div>
    </form>
</div>

<script>
        const stripe = Stripe("{{ env('STRIPE_KEY') }}");
        const elements = stripe.elements();
        const card = elements.create('card');
        card.mount('#card-element');
</script>

{{-- <script>
    document.addEventListener("DOMContentLoaded", function () {
        const stripe = Stripe("{{ env('STRIPE_KEY') }}");
        const elements = stripe.elements();
        const card = elements.create('card');
        card.mount('#card-element');

        const form = document.getElementById('payment-form');
        const submitButton = document.getElementById('submit-button');
        const errorDisplay = document.getElementById('card-errors');

        form.addEventListener('submit', async function (e) {
            e.preventDefault();
            submitButton.disabled = true;
            console.log()

            const {paymentMethod, error} = await stripe.createPaymentMethod({
                type: 'card',
                card: card,
            });

            if (error) {
                errorDisplay.textContent = error.message;
                submitButton.disabled = false;
            } else {
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'payment_method';
                hiddenInput.value = paymentMethod.id;
                form.appendChild(hiddenInput);
                form.submit();
            }
        });
    });
</script> --}}

</body>
</html>

