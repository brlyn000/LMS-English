<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-white">
        <div class="max-w-4xl w-full grid grid-cols-1 md:grid-cols-2 shadow-2xl rounded-xl overflow-hidden border border-red-600">

            <!-- Informasi / Gambar -->
            <div class="bg-red-600 text-white p-10 flex flex-col justify-center relative">
                <h2 class="text-3xl font-bold mb-4 animate-pulse">Forgot Your Password?</h2>
                <p class="text-base">Enter your email and we’ll send you a reset link to restore access to your LMS account.</p>
                <img src="https://cdn-icons-png.flaticon.com/512/295/295128.png" alt="Forgot Password" class="w-40 h-40 mx-auto mt-8 animate-fade-in">
                <div class="absolute bottom-4 right-4 text-sm text-white/70">Sekolah LMS - Red & White Edition</div>
            </div>

            <!-- Formulir -->
            <div class="bg-white p-10">
                <h1 class="text-2xl font-semibold text-red-600 mb-6">Reset Link Request</h1>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full border border-red-400" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="flex justify-end mt-6">
                        <x-primary-button class="bg-red-600 hover:bg-red-700 border border-red-700">
                            {{ __('Email Password Reset Link') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
