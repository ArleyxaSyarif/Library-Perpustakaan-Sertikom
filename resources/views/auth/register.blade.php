<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div
            class="bg-gradient-to-r from-blue-400 via-indigo-700 to-purple-600 rounded-lg shadow-lg p-8 flex flex-col items-center justify-center">
            <h4 class="text-3xl font-extrabold text-white mb-6 text-center leading-tight">
                Register
            </h4>
            <img src="/img/login.png" alt="Logo" class="w-50 h-40 mb-4">

            <!-- Name -->
            <div class="w-full">
                <x-input-label for="name" :value="__('Name')" class="text-white" />
                <x-text-input id="name"
                    class="block mt-1 w-full border border-indigo-400 rounded-lg p-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-indigo-100"
                    type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
            </div>

            <!-- Email Address -->
            <div class="mt-4 w-full">
                <x-input-label for="email" :value="__('Email')" class="text-white" />
                <x-text-input id="email"
                    class="block mt-1 w-full border border-indigo-400 rounded-lg p-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-indigo-100"
                    type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
            </div>

            <!-- Password -->
            <div class="mt-4 w-full">
                <x-input-label for="password" :value="__('Password')" class="text-white" />
                <x-text-input id="password"
                    class="block mt-1 w-full border border-indigo-400 rounded-lg p-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-indigo-100"
                    type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4 w-full">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-white" />
                <x-text-input id="password_confirmation"
                    class="block mt-1 w-full border border-indigo-400 rounded-lg p-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-indigo-100"
                    type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
            </div>

            <!-- Already Registered and Register Button -->
            <div class="flex items-center justify-between mt-4 w-full">
                <a class="underline text-sm text-white hover:text-gray-200" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button
                    class="ml-3 bg-indigo-500 text-white hover:bg-indigo-700 hover:text-gray-100 px-6 py-2 rounded-lg shadow-md">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>
