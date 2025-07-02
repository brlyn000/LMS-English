<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-red-600 via-white to-red-600 flex items-center justify-center p-6">
        <div class="max-w-6xl w-full grid grid-cols-1 md:grid-cols-2 shadow-2xl rounded-xl overflow-hidden border border-red-600">
            
            <!-- Side Info / Illustration -->
            <div class="bg-red-600 text-white p-10 flex flex-col justify-center relative">
                <h2 class="text-4xl font-bold mb-4 animate-pulse">Welcome to Red-White LMS</h2>
                <p class="text-lg">Register to get access to your class and discussion forum. Let's learn and grow together!</p>
                <img src="https://cdn-icons-png.flaticon.com/512/3039/3039430.png" alt="Education" class="w-48 h-48 mx-auto mt-8 ">
                <div class="absolute bottom-4 right-4 text-sm text-white/70">Powered by Laravel Breeze</div>
            </div>

            <!-- Registration Form -->
            <div class="bg-white p-10">
                <h1 class="text-3xl font-semibold text-red-600 mb-6">Create Your Account</h1>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Full Name')" />
                        <x-text-input id="name" class="block mt-1 w-full border border-red-400" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="lg:flex gap-3 sm:flex-row">
                        <!-- NIM -->
                        <div class="mt-4">
                            <x-input-label for="nim" :value="__('NIM')" />
                            <x-text-input id="nim" class="block mt-1 w-full  border-red-400" type="text" name="nim" :value="old('nim')" required />
                            <x-input-error :messages="$errors->get('nim')" class="mt-2" />
                        </div>
                        <!-- Program Studi -->
                        <div class="mt-4">
                            <x-input-label for="program_studi_id" :value="__('Program Studi')" />
                            <select id="program_studi_id" name="program_studi_id" required class="block mt-1 w-full rounded border-red-600  focus:ring-red-600 text-center">
                                <option value="">Select Program Studi</option>
                                <option value="2">Akuntansi</option>
                                <option value="3">Administrasi Perkantoran</option>
                                <option value="4">Teknologi Mesin</option>
                                <option value="1">Teknologi Informasi</option>
                            </select>
                            <x-input-error :messages="$errors->get('program_studi_id')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full border border-red-400" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full border border-red-400"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
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

                    <div class="flex items-center justify-between mt-6">
                        <a class="underline text-sm text-red-600 hover:text-red-800" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                        <x-primary-button class="bg-red-600 hover:bg-red-700 border border-red-700">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
