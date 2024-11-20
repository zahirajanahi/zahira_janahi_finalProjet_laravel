<x-guest-layout>
    <div class="w-full">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Welcome back</h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-gray-700" />
                <x-text-input id="email" 
                    class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
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
                    autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Options -->
            <div class="flex items-center justify-between">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me"
                        type="checkbox"
                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm text-black"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <div>
                <x-primary-button class="w-full justify-center py-3 bg-[#ba3819]">
                    {{ __('Sign in') }}
                </x-primary-button>
            </div>

            <p class="text-center text-sm text-gray-600">
                {{ __("Don't have an account?") }}
                <a href="{{ route('register') }}" class="font-medium text-[#ba3819]">
                    {{ __('Sign up') }}
                </a>
            </p>
        </form>
    </div>
</x-guest-layout>