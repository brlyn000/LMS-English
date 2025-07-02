<x-admin-layout>
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Edit User</h1>
        <a href="{{ route('admin.users') }}" class="flex items-center text-red-600 hover:text-red-800">
            <i class="fas fa-arrow-left mr-2"></i> Back to Users
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="p-6">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- User Avatar -->
                    <div class="flex flex-col items-center">
                        <div class="relative mb-4">
                            <img class="h-32 w-32 rounded-full border-4 border-white shadow-lg" 
                                 src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random" 
                                 alt="{{ $user->name }}">

                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">{{ $user->name }}</h3>
                        <p class="text-sm text-gray-500">{{ $user->email }}</p>
                    </div>

                    <!-- Basic Information -->
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent @error('email') border-red-500 @enderror">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Academic Information -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-800 border-b pb-2">Academic Information</h3>

                        <div>
                            <label for="nim" class="block text-sm font-medium text-gray-700 mb-1">Student ID (NIM)</label>
                            <input type="text" name="nim" id="nim" value="{{ old('nim', $user->nim) }}" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent @error('nim') border-red-500 @enderror">
                            @error('nim')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="program_studi_id" class="block text-sm font-medium text-gray-700 mb-1">Study Program</label>
                            <select name="program_studi_id" id="program_studi_id" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent @error('program_studi_id') border-red-500 @enderror">
                                <option value="">Select Program</option>
                                @foreach($programStudis as $program)
                                    <option value="{{ $program->id }}" {{ old('program_studi_id', $user->program_studi_id) == $program->id ? 'selected' : '' }}>
                                        {{ $program->nama_prodi }}
                                    </option>
                                @endforeach
                            </select>
                            @error('program_studi_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Account Settings -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-800 border-b pb-2">Account Settings</h3>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                            <input type="password" name="password" id="password" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent @error('password') border-red-500 @enderror">
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" name="is_active" id="is_active" value="1" 
                                   class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded" 
                                   {{ old('is_active', $user->is_active) ? 'checked' : '' }}>
                            <label for="is_active" class="ml-2 block text-sm text-gray-700">Active Account</label>
                        </div>
                    </div>

                    {{-- Role --}}
                    <div class="mb-4">
                        <label for="role_id" class="block text-sm font-medium text-gray-700 mb-1">Pilih Role</label>
                        <select name="role_id" id="role_id" class="w-full rounded border-gray-300 focus:ring-red-500 focus:border-red-500">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ optional($user->roles->first())->id == $role->id ? 'selected' : '' }}>
                                    {{ ucfirst($role->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.users') }}" 
                       class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
    @if(session('success'))
        <div 
            x-data="{ show: true }" 
            x-init="setTimeout(() => show = false, 3000)" 
            x-show="show" 
            class="fixed z-50 bottom-6 right-6 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transition-all duration-500 ease-in-out"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-4"
        >
            <strong class="mr-2">Berhasil!</strong> {{ session('success') }}
        </div>
    @endif
</x-admin-layout>
