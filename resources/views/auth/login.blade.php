<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center p-6 bg-image">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden w-full max-w-4xl grid grid-cols-1 md:grid-cols-2">
            <!-- Left Banner / Illustration Side -->
            <div class="hidden md:flex bg-red-600 text-white flex-col items-center justify-center p-10">
                <div class="text-left">
                    <i class="fas fa-graduation-cap text-4xl"></i>
                    <h2 class="text-3xl font-bold tracking-wide">Welcome to Real World</h2>
                    <p class="mt-4 text-lg">For English Class Students of:</p>
                    <ul class="mt-4 text-sm list-disc list-inside">
                        
                        <li>Accounting</li>
                        <li>Office Administration</li>
                        <li>Mechanical Engineering</li>
                        <li>Information Technology</li>
                    </ul>
                </div>
            </div>

            <!-- Right Form Side -->
            <div class="p-8 md:p-12 bg-white">
                <h2 class="text-2xl font-bold text-center text-red-700">Log in to Your Real World Account</h2>
                <p class="text-center text-sm text-gray-500 mb-6">Please enter your credentials to continue</p>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <!-- NIM or Email -->
                    <div>
                        <x-input-label for="login" :value="__('NIM or Email')" />
                        <x-text-input id="login" class="block mt-1 w-full border-red-600" type="text" name="login" :value="old('login')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('login')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full border-red-600" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-red-600 shadow-sm focus:ring-red-500" name="remember">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-600">{{ __('Remember me') }}</label>
                    </div>

                    <div class="flex flex-col gap-3 items-center justify-between">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-red-600 hover:text-red-800" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                            <a class="underline text-sm text-red-600 hover:text-red-800" href="{{ route('register') }}">
                                {{ __('Dont have account?') }}
                            </a>
                        @endif
                        <x-primary-button class="bg-red-600 hover:bg-red-700">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>

                <div class="mt-6 text-center text-xs text-gray-400">
                    &copy; {{ date('Y') }} LMS - All Rights Reserved
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
