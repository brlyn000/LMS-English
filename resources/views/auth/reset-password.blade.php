<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-white">
        <div class="max-w-4xl w-full grid grid-cols-1 md:grid-cols-2 shadow-2xl rounded-xl overflow-hidden border border-red-600">
            
            <!-- Ilustrasi / Info -->
            <div class="bg-red-600 text-white p-10 flex flex-col justify-center relative">
                <h2 class="text-4xl font-bold mb-4 animate-pulse">Reset Your Password</h2>
                <p class="text-lg">Enter your new password below to regain access to your LMS account.</p>
                <img src="https://cdn-icons-png.flaticon.com/512/4018/4018430.png" alt="Reset" class="w-44 h-44 mx-auto mt-8 animate-fade-in">
                <div class="absolute bottom-4 right-4 text-sm text-white/70">Powered by Laravel Breeze</div>
            </div>

            <!-- Form -->
            <div class="bg-white p-10">
                <h1 class="text-2xl font-semibold text-red-600 mb-6">New Password Form</h1>

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full border border-red-400" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full border border-red-400" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full border border-red-400"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex justify-end mt-6">
                        <x-primary-button class="bg-red-600 hover:bg-red-700 border border-red-700">
                            {{ __('Reset Password') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
