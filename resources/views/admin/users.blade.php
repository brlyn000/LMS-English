<x-admin-layout>
    <div class="space-y-6">
        <!-- Page Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">User Management</h1>
                <p class="text-gray-600">Manage all registered users in the system</p>
            </div>
            <div class="flex space-x-3">
                <!-- Add User Button -->
                <button onclick="openModal()" class="px-5 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 flex items-center">
                    <i class="fas fa-plus-circle mr-2"></i> Add User
                </button>

                <!-- Modal -->
                <div id="addUserModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4 backdrop-blur-sm">
                    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md transform transition-all duration-300 scale-95 opacity-0" id="modalContent">
                        <!-- Modal Header -->
                        <div class="border-b border-gray-200 p-5 flex justify-between items-center bg-gradient-to-r from-red-50 to-white rounded-t-xl">
                            <h2 class="text-2xl font-bold text-gray-800">
                                <i class="fas fa-user-plus text-red-600 mr-2"></i> Add New User
                            </h2>
                            <button onclick="closeModal()" class="text-gray-500 hover:text-red-600 transition-colors">
                                <i class="fas fa-times text-xl"></i>
                            </button>
                        </div>

                        <!-- Modal Body -->
                        <form method="POST" action="{{ route('admin.users.store') }}" class="p-6 space-y-4">
                            @csrf

                            <!-- Full Name -->
                            <div class="space-y-1">
                                <x-input-label for="name" :value="__('Full Name')" class="text-gray-700 font-medium" />
                                <div class="relative">
                                    <x-text-input 
                                        id="name" 
                                        class="block mt-1 w-full rounded-lg border-gray-300 focus:border-red-400 focus:ring focus:ring-red-200 focus:ring-opacity-50 shadow-sm pl-10" 
                                        type="text" 
                                        name="name" 
                                        :value="old('name')" 
                                        required 
                                        autofocus 
                                        autocomplete="name" />
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-user text-gray-400"></i>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('name')" class="mt-1 text-sm text-red-600" />
                            </div>

                            <!-- NIM and Program Studi Row -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- NIM -->
                                <div class="space-y-1">
                                    <x-input-label for="nim" :value="__('NIM')" class="text-gray-700 font-medium" />
                                    <div class="relative">
                                        <x-text-input 
                                            id="nim" 
                                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-red-400 focus:ring focus:ring-red-200 focus:ring-opacity-50 shadow-sm pl-10" 
                                            type="text" 
                                            name="nim" 
                                            :value="old('nim')" 
                                            required />
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-id-card text-gray-400"></i>
                                        </div>
                                    </div>
                                    <x-input-error :messages="$errors->get('nim')" class="mt-1 text-sm text-red-600" />
                                </div>

                                <!-- Program Studi -->
                                <div class="space-y-1">
                                    <x-input-label for="program_studi_id" :value="__('Program Studi')" class="text-gray-700 font-medium" />
                                    <div class="relative">
                                        <select 
                                            id="program_studi_id" 
                                            name="program_studi_id" 
                                            required 
                                            class="block mt-1 w-full rounded-lg border-gray-300 focus:border-red-400 focus:ring focus:ring-red-200 focus:ring-opacity-50 shadow-sm pl-10 pr-3 py-2 appearance-none bg-white">
                                            <option value="">Select Program</option>
                                            <option value="1">Teknologi Informasi</option>
                                            <option value="2">Teknologi Mesin</option>
                                            <option value="3">Akuntansi</option>
                                            <option value="4">Administrasi Perkantoran</option>
                                        </select>
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-graduation-cap text-gray-400"></i>
                                        </div>
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <i class="fas fa-chevron-down text-gray-400"></i>
                                        </div>
                                    </div>
                                    <x-input-error :messages="$errors->get('program_studi_id')" class="mt-1 text-sm text-red-600" />
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="space-y-1">
                                <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-medium" />
                                <div class="relative">
                                    <x-text-input 
                                        id="email" 
                                        class="block mt-1 w-full rounded-lg border-gray-300 focus:border-red-400 focus:ring focus:ring-red-200 focus:ring-opacity-50 shadow-sm pl-10" 
                                        type="email" 
                                        name="email" 
                                        :value="old('email')" 
                                        required 
                                        autocomplete="username" />
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-envelope text-gray-400"></i>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-600" />
                            </div>

                            <!-- Password -->
                            <div class="space-y-1">
                                <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-medium" />
                                <div class="relative">
                                    <x-text-input 
                                        id="password" 
                                        class="block mt-1 w-full rounded-lg border-gray-300 focus:border-red-400 focus:ring focus:ring-red-200 focus:ring-opacity-50 shadow-sm pl-10" 
                                        type="password" 
                                        name="password" 
                                        required 
                                        autocomplete="new-password" />
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-lock text-gray-400"></i>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-600" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="space-y-1">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 font-medium" />
                                <div class="relative">
                                    <x-text-input 
                                        id="password_confirmation" 
                                        class="block mt-1 w-full rounded-lg border-gray-300 focus:border-red-400 focus:ring focus:ring-red-200 focus:ring-opacity-50 shadow-sm pl-10" 
                                        type="password" 
                                        name="password_confirmation" 
                                        required 
                                        autocomplete="new-password" />
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-lock text-gray-400"></i>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-sm text-red-600" />
                            </div>

                            <!-- Form Footer -->
                            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                                <x-primary-button class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 shadow-md hover:shadow-lg transition-all duration-300">
                                    <i class="fas fa-user-plus mr-2"></i> Add User
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-4 rounded-xl shadow-sm border-l-4 border-red-500">
                <div class="flex justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Total Users</p>
                        <h3 class="text-2xl font-bold mt-1">{{ number_format($totalUsers) }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center text-red-500">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                </div>

                <p class="text-xs {{ $growth >= 0 ? 'text-green-600' : 'text-red-600' }} mt-2">
                    <i class="fas {{ $growth >= 0 ? 'fa-arrow-up' : 'fa-arrow-down' }} mr-1"></i>
                    {{ number_format(abs($growth), 1) }}% from last month
                </p>
            </div>

            <div class="bg-white p-4 rounded-xl shadow-sm border-l-4 border-blue-500">
                <div class="flex justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Active Today</p>
                        <h3 class="text-2xl font-bold mt-1">{{ number_format($activeToday) }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-blue-500">
                        <i class="fas fa-user-check text-xl"></i>
                    </div>
                </div>
                <p class="text-xs {{ $activeGrowth >= 0 ? 'text-green-600' : 'text-red-600' }} mt-2">
                    <i class="fas {{ $activeGrowth >= 0 ? 'fa-arrow-up' : 'fa-arrow-down' }} mr-1"></i>
                    {{ number_format(abs($activeGrowth), 1) }}% from yesterday
                </p>
            </div>

            <div class="bg-white p-4 rounded-xl shadow-sm border-l-4 border-purple-500">
                <div class="flex justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Admin Users</p>
                        <h3 class="text-2xl font-bold mt-1">{{ number_format($adminUsers) }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-purple-50 flex items-center justify-center text-purple-500">
                        <i class="fas fa-user-shield text-xl"></i>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-2">No change</p>
            </div>
        </div>

        <!-- User Table -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <!-- Table Header -->
            <div class="px-6 py-4 border-b border-gray-200 flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0">
                <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input
                                type="text"
                                id="live-search"
                                placeholder="Search users..."
                                class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-300 focus:border-transparent w-full md:w-64"
                            >
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                    <select id="role-filter" class="border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-300 focus:border-transparent text-sm">
                        <option value="">All Roles</option>
                        <option>Admin</option>
                        <option>Instructor</option>
                        <option>Student</option>
                    </select>
                </div>
                <div class="flex items-center space-x-2 ">
                    <a href="{{ route('admin.users.export') }}" class="p-2 text-gray-500 hover:text-red-600 hover:bg-gray-50 rounded-lg">
                        <i class="fas fa-download"></i>
                    </a>
                </div>
            </div>

            <!-- Table Content -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center">
                                    User
                                    <button class="ml-1 text-gray-400 hover:text-red-600">
                                        <i class="fas fa-sort"></i>
                                    </button>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center">
                                    Role
                                    <button class="ml-1 text-gray-400 hover:text-red-600">
                                        <i class="fas fa-sort"></i>
                                    </button>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center">
                                    Status
                                    <button class="ml-1 text-gray-400 hover:text-red-600">
                                        <i class="fas fa-sort"></i>
                                    </button>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center">
                                    Last Active
                                    <button class="ml-1 text-gray-400 hover:text-red-600">
                                        <i class="fas fa-sort"></i>
                                    </button>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center">
                                    NIM
                                    <button class="ml-1 text-gray-400 hover:text-red-600">
                                        <i class="fas fa-sort"></i>
                                    </button>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody id="user-table" class="bg-white divide-y divide-gray-200">
                    @foreach($users as $user)
                    <tr class="hover:bg-gray-50 transition-colors">
                        {{-- Nama & Email --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random" alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $user->email }}</div>
                                </div>
                            </div>
                        </td>

                        {{-- Role --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            @foreach ($user->roles as $role)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $role->name === 'admin' ? 'bg-red-100 text-red-800' : 
                                    ($role->name === 'instructor' ? 'bg-blue-100 text-blue-800' : 
                                    'bg-green-100 text-green-800') }}">
                                    {{ ucfirst($role->name) }}
                                </span>
                            @endforeach
                        </td>

                        {{-- Status --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $user->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $user->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>

                        {{-- Last Login --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'Never' }}
                        </td>

                        {{-- NIM --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user->nim }}
                        </td>

                        {{-- Actions --}}
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-2">
                                <!-- Lihat -->
                                <button onclick="document.getElementById('userModal-{{ $user->id }}').classList.remove('hidden')"
                                    class="text-gray-500 hover:text-red-600 p-1 rounded-full hover:bg-gray-100">
                                    <i class="fas fa-eye"></i>
                                </button>

                                <!-- Edit -->
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                    class="text-gray-500 hover:text-blue-600 p-1 rounded-full hover:bg-gray-100">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Hapus -->
                                <button onclick="showConfirmModal('deleteModal', 'submitDeleteForm({{ $user->id }})')" 
                                    class="text-gray-500 hover:text-red-600 p-1 rounded-full hover:bg-gray-100">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div id="userModal-{{ $user->id }}" class="fixed inset-0 z-50 flex items-center justify-center hidden">
                        <!-- Backdrop -->
                        <div class="absolute inset-0 bg-black bg-opacity-50" onclick="document.getElementById('userModal-{{ $user->id }}').classList.add('hidden')"></div>

                        <!-- Modal Content -->
                        <div class="relative bg-white rounded-xl shadow-2xl w-full max-w-md mx-4 overflow-hidden">
                            <!-- Header -->
                            <div class="bg-red-600 px-6 py-4 flex items-center space-x-4">
                                <div class="flex-shrink-0 h-12 w-12 rounded-full bg-white flex items-center justify-center shadow-md">
                                    <img class="h-10 w-10 rounded-full" 
                                        src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random" 
                                        alt="{{ $user->name }}">
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-white">{{ $user->name }}</h2>
                                    <p class="text-red-100">{{ $user->programStudi->nama_prodi ?? '-' }}</p>
                                </div>
                                <button onclick="document.getElementById('userModal-{{ $user->id }}').classList.add('hidden')" 
                                        class="ml-auto text-red-200 hover:text-white">
                                    <i class="fas fa-times text-xl"></i>
                                </button>
                            </div>

                            <!-- Body -->
                            <div class="p-6 space-y-4">
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="bg-gray-50 p-3 rounded-lg border border-gray-100">
                                        <p class="text-xs font-semibold text-gray-500 uppercase">Email</p>
                                        <p class="text-gray-800 font-medium">{{ $user->email }}</p>
                                    </div>
                                    <div class="bg-gray-50 p-3 rounded-lg border border-gray-100">
                                        <p class="text-xs font-semibold text-gray-500 uppercase">NIM</p>
                                        <p class="text-gray-800 font-medium">{{ $user->nim }}</p>
                                    </div>
                                </div>

                                <div class="bg-red-50 p-4 rounded-lg border border-red-100">
                                    <div class="flex items-center space-x-2 text-red-600 mb-2">
                                        <i class="fas fa-graduation-cap"></i>
                                        <h3 class="font-semibold">Academic Info</h3>
                                    </div>
                                    <div class="grid grid-cols-3 gap-2 text-center">
                                        <div>
                                            <p class="text-xs text-gray-500">Courses</p>
                                            <p class="text-lg font-bold text-red-600">12</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500">Completed</p>
                                            <p class="text-lg font-bold text-green-600">8</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500">Progress</p>
                                            <p class="text-lg font-bold text-yellow-600">67%</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="pt-2">
                                    <p class="text-sm text-gray-500">Member since</p>
                                    <p class="text-gray-800">{{ $user->created_at->format('F j, Y') }}</p>
                                </div>
                            </div>

                            <!-- Footer -->
                            <div class="bg-gray-50 px-6 py-3 flex justify-end space-x-3">
                                <button onclick="document.getElementById('userModal-{{ $user->id }}').classList.add('hidden')" 
                                    class="px-4 py-2 text-gray-700 hover:text-gray-900">
                                    Close
                                </button>
                                <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                    <i class="fas fa-envelope mr-2"></i> Message
                                </button>
                            </div>
                        </div>
                    </div>
                    <form id="deleteForm" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>

                    @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Table Footer -->
            <div class="px-6 py-4 border-t border-gray-200 flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
                <div class="text-sm text-gray-500">
                    Showing <span class="font-medium">{{ $users->firstItem() }}</span> to <span class="font-medium">{{ $users->lastItem() }}</span> of <span class="font-medium">{{ $users->total() }}</span> results
                </div>
                <div class="flex items-center space-x-2">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

    <x-confirm-modal 
        id="deleteModal" 
        title="Hapus User" 
        message="Apakah Anda yakin ingin menghapus user ini? Tindakan ini tidak dapat dibatalkan." 
        confirmText="Ya, Hapus" 
        cancelText="Batal" />

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            function openModal() {
                const modal = document.getElementById('addUserModal');
                const content = document.getElementById('modalContent');
                
                modal.classList.remove('hidden');
                setTimeout(() => {
                    content.classList.remove('scale-95', 'opacity-0');
                    content.classList.add('scale-100', 'opacity-100');
                }, 10);
                
                document.body.style.overflow = 'hidden';
            }

            function closeModal() {
                const modal = document.getElementById('addUserModal');
                const content = document.getElementById('modalContent');
                
                content.classList.remove('scale-100', 'opacity-100');
                content.classList.add('scale-95', 'opacity-0');
                
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
                
                document.body.style.overflow = '';
            }

            // Close modal when clicking outside
            document.getElementById('addUserModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeModal();
                }
            });

            // Search Feature
            $(document).ready(function () {
                function fetchUsers() {
                    let searchQuery = $('#live-search').val();
                    let roleFilter = $('#role-filter').val();

                    $.ajax({
                        url: "{{ route('admin.users.search') }}",
                        type: 'GET',
                        data: {
                            search: searchQuery,
                            role: roleFilter
                        },
                        success: function (data) {
                            let rows = '';
                            if (data.length > 0) {
                                data.forEach(user => {
                                    let avatarUrl = `https://ui-avatars.com/api/?name=${encodeURIComponent(user.name)}&background=random`;
                                    let rolesHtml = '';
                                    if (user.roles) {
                                        user.roles.forEach(role => {
                                            let bgColor = role.name === 'admin' ? 'bg-red-100 text-red-800' :
                                                        role.name === 'instructor' ? 'bg-blue-100 text-blue-800' :
                                                        'bg-green-100 text-green-800';
                                            rolesHtml += `<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${bgColor}">${role.name}</span>`;
                                        });
                                    }

                                    rows += `
                                        <tr class="hover:bg-gray-50 transition-colors">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <img class="h-10 w-10 rounded-full" src="${avatarUrl}" alt="">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">${user.name}</div>
                                                        <div class="text-sm text-gray-500">${user.email}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">${rolesHtml}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${
                                                    user.is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'
                                                }">
                                                    ${user.is_active ? 'Active' : 'Inactive'}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                ${user.last_login_at ?? 'Never'}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                ${user.nim ?? '-'}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <div class="flex justify-end space-x-2">
                                                    <button class="text-gray-500 hover:text-red-600 p-1 rounded-full hover:bg-gray-100">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="text-gray-500 hover:text-blue-600 p-1 rounded-full hover:bg-gray-100">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="text-gray-500 hover:text-red-600 p-1 rounded-full hover:bg-gray-100">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    `;
                                });
                            } else {
                                rows = '<tr><td colspan="6" class="text-center py-2 text-gray-500">No users found</td></tr>';
                            }

                            $('#user-table').html(rows);
                        }
                    });
                }

                $('#live-search').on('input', fetchUsers);
                $('#role-filter').on('change', fetchUsers);
            });

        function submitDeleteForm(userId) {
            const form = document.getElementById('deleteForm');
            form.action = `/admin/users/${userId}`;
            form.submit();
        }

        </script>
    @endpush
</x-admin-layout>