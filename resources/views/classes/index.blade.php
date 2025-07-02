<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-red-600 to-red-800 text-white p-8 rounded-b-3xl shadow-2xl mb-20">
            <div class="max-w-7xl mx-auto">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="font-bold text-4xl tracking-tight">English <span class="text-white">Class</span></h2>
                        <p class="text-red-100 mt-2 text-lg">
                            Welcome to your personalized learning center {{ $user->programStudi->nama_prodi ?? '-' }}
                        </p>
                    </div>
                    <div class="hidden md:block">
                        <div class="relative">
                            <div class="absolute -inset-1 bg-white bg-opacity-20 blur-sm rounded-full"></div>
                            <div class="relative bg-white bg-opacity-10 px-6 py-3 rounded-full backdrop-blur-sm border border-white border-opacity-20">
                                <span class="text-white font-medium">Class {{ $user->programStudi->kode_prodi ?? '-' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Daftar Modul Kelas</h2>
                <p class="mt-2 text-gray-600">Temukan semua modul pembelajaran yang tersedia</p>
            </div>
            <div class="w-full md:w-64">
                    @php
                        $userRoles = Auth::user()->roles->pluck('name')->toArray();
                    @endphp
                    @if(in_array('admin', $userRoles) || in_array('instructor', $userRoles))
                    <a href="{{ route('admin.module.create') }}"
                       class="mt-4 md:mt-0 flex items-center gap-2 bg-red-600 hover:bg-gray-100 text-white hover:text-red-600 py-3  px-6 rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Tambah Modul
                    </a>
                    @endif
            </div>
        </div>

        <!-- Module Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($modules as $module)
            <div class="bg-white overflow-hidden rounded-xl shadow-md hover:shadow-lg transition-all duration-300 border border-gray-100 group">
                <!-- Module Image -->
                <div class="h-48 bg-gradient-to-r from-red-500 to-purple-600 flex items-center justify-center overflow-hidden">
                    @if($module->image_path)
                        <img src="{{ asset('storage/' . $module->image_path) }}" alt="{{ $module->title }}" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    @else
                        <span class="text-white text-5xl font-bold">{{ substr($module->title, 0, 1) }}</span>
                    @endif
                </div>

                <!-- Module Content -->
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold text-gray-900">{{ $module->title }}</h3>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                            {{ $module->type }}
                        </span>
                    </div>
                    
                    <p class="text-gray-600 mb-4 line-clamp-2">{{ $module->description }}</p>
                    
                    <div class="flex items-center justify-between mt-6">
                        <a href="{{ route('module.materials', ['id' => $module->id]) }}" 
                           class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200">
                            Lihat Modul
                            <svg class="ml-2 -mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                        <span class="text-sm text-gray-500">
                            {{ $module->materials_count }} Materi
                        </span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 bg-white rounded-xl shadow-sm p-12 text-center">
                <div class="mx-auto max-w-md">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada modul</h3>
                    <p class="mt-2 text-gray-500">Tidak ada modul yang tersedia untuk kelas ini saat ini.</p>
                    <div class="mt-6">
                        <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Modul
                        </a>
                    </div>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($modules->hasPages())
        <div class="mt-8">
            {{ $modules->links() }}
        </div>
        @endif
    </div>
</div>
</x-app-layout>
