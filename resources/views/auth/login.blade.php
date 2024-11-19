<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="('Email')" />
            <x-text-input id="email" class="block mt-1 w-full rounded-lg bg-white" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="('Password')" />

            <x-text-input id="password" class="block mt-1 w-full rounded-lg"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded  text-[#eb8541] shadow-sm" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ ('Remember me') }}</span>
            </label>
        </div>
          <div class="flex justify-end items-center pt-5 gap-3">
            <div>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-[#eb8541]/60  hover:text-[#eb8541] transition duration-300" href="{{ route('password.request') }}">
                        {{ ('Forgot your password?') }}
                    </a>
                @endif
    
    
            </div>
            <x-primary-button class="px-5 py-3  text-white rounded-full bg-black">
                {{ __('Log in') }}
            </x-primary-button>
          </div>
     
    </form>
</x-guest-layout>