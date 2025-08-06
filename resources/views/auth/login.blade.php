<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf




        <div
            class="bg-gradient-to-r from-blue-400 via-indigo-700 to-purple-600 rounded-lg shadow-lg p-8 flex flex-col items-center justify-center">
            <h4 class="text-3xl font-extrabold text-white mb-6 text-center leading-tight">
                Log In
            </h4>
            <img src="/img/login.png" alt="Logo" class="w-60 h-50 mb-4">

            <!-- Email Address -->
            <div class="w-full">
                <x-input-label for="email" :value="__('Email')" class="text-white" />
                <x-text-input id="email"
                    class="block mt-1 w-full border border-indigo-400 rounded-lg p-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-indigo-100"
                    type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-white" />
            </div>

            <!-- Password -->
            <div class="mt-4 w-full">
                <x-input-label for="password" :value="__('Password')" class="text-white" />
                <x-text-input id="password"
                    class="block mt-1 w-full border border-indigo-400 rounded-lg p-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-indigo-100"
                    type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-white" />

            </div>

            <!-- Remember Me -->


            <!-- Forgot Password and Login Button -->
            <div class="flex items-center justify-between mt-4 w-full">
                {{-- @if (Route::has('password.request'))
                    <a class="underline text-sm text-white hover:text-gray-200" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif --}}
                @if (Route::has('register'))
                    <a class="underline text-sm text-white hover:text-gray-200" href="{{ route('register') }}">
                        {{ __('No have account?') }}
                    </a>
                @endif

                <x-primary-button
                    class="ml-3 bg-indigo-500 text-white hover:bg-indigo-700 hover:text-gray-100 px-6 py-2 rounded-lg shadow-md">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>
