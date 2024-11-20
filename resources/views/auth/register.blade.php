<x-guest-layout>
    <div class="w-full">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Create your account</h2>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Full name')" class="text-gray-700" />
                <x-text-input id="name" 
                    class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus
                    autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-gray-700" />
                <x-text-input id="email" 
                    class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="text-gray-700" />
                <x-text-input id="password" 
                    class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700" />
                <x-text-input id="password_confirmation" 
                    class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div>
                <x-primary-button class="w-full justify-center py-3 bg-[#ba3819]">
                    {{ __('Create account') }}
                </x-primary-button>
            </div>

            <p class="text-center text-sm text-gray-600">
                {{ __('Already have an account?') }}
                <a href="{{ route('login') }}" class="font-medium text-[#ba3819] ">
                    {{ __('Sign in') }}
                </a>
            </p>
        </form>
    </div>
</x-guest-layout>