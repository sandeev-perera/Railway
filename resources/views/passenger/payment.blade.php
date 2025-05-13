<!DOCTYPE html>
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

    <form id="payment-form" method="POST" action="">
        @csrf

<div class="space-y-2 text-sm font-medium mb-6">
    <div class="flex justify-between">
        <span class="text-gray-700">Route</span>
        <span class="text-gray-900 font-semibold">Colombo → Maharagama</span>
    </div>
    <div class="flex justify-between">
        <span class="text-gray-700">Class</span>
        <span class="text-gray-900 font-semibold">2nd</span>
    </div>
    <div class="flex justify-between">
        <span class="text-gray-700">Sector</span>
        <span class="text-gray-900 font-semibold">GOV</span>
    </div>
    <div class="flex justify-between">
        <span class="text-gray-700">Duration</span>
        <span class="text-gray-900 font-semibold">Monthly</span>
    </div>
    <div class="flex justify-between">
        <span class="text-gray-700">Full Payment</span>
        <span class="text-gray-900 font-semibold">Rs. 1200</span>
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
            <button type="submit" id="submit-button" class="bg-[#05445E] text-white px-6 py-2 rounded-full hover:bg-[#032f3e] transition mt-3" onclick="">
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
</html>
