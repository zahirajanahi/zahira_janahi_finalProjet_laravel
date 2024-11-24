<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Upgrade Your Plan - Planify</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://js.stripe.com/v3/"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="min-h-screen flex flex-col items-center justify-center p-4">
        <div class="bg-white w-full max-w-lg p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Choose Your Plan</h1>
                <p class="text-gray-600">Upgrade to unlock additional features or continue with the free plan.</p>
            </div>

            <div class="flex gap-6 ms-48">
                <!-- Free Plan -->
                <div class="bg-gray-50 rounded-xl w-[30vw] h-[65vh] p-6 border border-gray-200">
                    <div class="text-center mb-4">
                        <h2 class="text-xl font-semibold text-gray-900">Free Plan</h2>
                        <p class="text-2xl font-bold text-gray-900">Free</p>
                    </div>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center mt-20">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Create up to 3 teams
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Basic analytics
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Standard support
                        </li>
                    </ul>
                    <div class=" text-center mt-40">
                        <button class="w-full bg-gray-200 text-gray-800 py-3 px-6 rounded-full font-semibold cursor-not-allowed">
                            Current Plan
                        </button>
                    </div>
                </div>

                <!-- Premium Plan -->
                <div class="bg-[#fef8f6] rounded-xl w-[30vw] p-6 border border-[#932a09]">
                    <div class="text-center mb-4">
                        <h2 class="text-xl font-semibold text-[#932a09]">Premium Plan</h2>
                        <p class="text-2xl font-bold text-[#932a09]">$9.99/month</p>
                    </div>
                    <ul class="space-y-3 text-gray-600 mt-20">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Create unlimited teams
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Priority support
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Advanced team analytics
                        </li>
                    </ul>
                    <div class=" text-center mt-40 ">
                        <form id="payment-form">
                            @csrf
                            <button
                                type="submit"
                                id="checkout-button"
                                class="w-full bg-[#932a09] text-white py-3 px-6 rounded-full font-semibold hover:bg-[#6b0c02] transition duration-200"
                            >
                                Upgrade Now
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <p class="text-center text-sm text-gray-500 mt-8">
                Secure payment powered by Stripe
            </p>
        </div>
    </div>

    <script>
        document.getElementById('payment-form').addEventListener('submit', async function(e) {
            e.preventDefault();
            const button = document.getElementById('checkout-button');
            button.disabled = true;
            button.textContent = 'Loading...';

            try {
                const response = await fetch('{{ route("subscription.checkout") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({})
                });

                const data = await response.json();

                if (data.url) {
                    window.location.href = data.url;
                } else {
                    throw new Error('Failed to create checkout session');
                }
            } catch (error) {
                console.error('Error:', error);
                button.disabled = false;
                button.textContent = 'Upgrade Now';
                alert('An error occurred. Please try again.');
            }
        });
    </script>
</body>
</html>
