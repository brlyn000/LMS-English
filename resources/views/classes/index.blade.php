<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-red-600 to-red-800 text-white p-8 rounded-b-3xl shadow-2xl mb-20">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                    <div>
                        <h2 class="font-bold text-4xl tracking-tight">English <span class="text-white">Learning Portal</span></h2>
                        <p class="text-red-100 mt-2 text-lg">
                            Welcome to your personalized learning dashboard, {{ $user->programStudi->nama_prodi ?? 'Student' }}
                        </p>
                    </div>
                    <div class="flex gap-4">
                        <div class="hidden md:block">
                            <div class="relative">
                                <div class="absolute -inset-1 bg-white bg-opacity-20 blur-sm rounded-full"></div>
                                <div class="relative bg-white bg-opacity-10 px-6 py-3 rounded-full backdrop-blur-sm border border-white border-opacity-20">
                                    <span class="text-white font-medium">Class {{ $user->programStudi->kode_prodi ?? 'X' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <!-- Breadcrumb -->
        <nav class="flex px-5 py-3 my-5 text-gray-700 border border-gray-200 rounded-lg bg-red-50" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
            <a href="{{ route('dashboard') }}" class="inline-flex items-center text-sm font-medium text-red-700 hover:text-gray-600 ">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                Home
            </a>    
            </li>
            <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Class</span>
            </div>
            </li>
        </ol>
        </nav>
            <!-- Header Section -->
            <div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Course Modules</h2>
                    <p class="mt-2 text-gray-600">Explore all available learning materials</p>
                </div>
                <div class="w-full md:w-auto">
                    @php
                        $userRoles = Auth::user()->roles->pluck('name')->toArray();
                    @endphp
                    @if(in_array('admin', $userRoles) || in_array('instructor', $userRoles))
                    <a href="{{ route('admin.module.create') }}"
                       class="flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white py-3 px-6 rounded-lg shadow-lg transition-all duration-300 transform hover:scale-[1.03]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Add New Module
                    </a>
                    @endif
                </div>
            </div>

            <!-- Module Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($modules as $module)
                <div class="bg-white overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 group transform hover:-translate-y-1">
                    <!-- Module Image -->
                    <div class="h-48 bg-gradient-to-r from-red-500 to-purple-600 flex items-center justify-center overflow-hidden relative">
                        @if($module->image_path)
                            <img src="{{ asset('storage/' . $module->image_path) }}" alt="{{ $module->title }}" 
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        @else
                            <span class="text-white text-5xl font-bold">{{ substr($module->title, 0, 1) }}</span>
                        @endif
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent p-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-white text-red-800">
                                {{ $module->type }}
                            </span>
                        </div>
                    </div>

                    <!-- Module Content -->
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-xl font-bold text-gray-900">{{ $module->title }}</h3>
                            <span class="text-xs text-gray-500">
                                {{ $module->materials_count }} {{ Str::plural('Material', $module->materials_count) }}
                            </span>
                        </div>
                        
                        <p class="text-gray-600 mb-4 line-clamp-2">{{ $module->description }}</p>
                        
                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('module.materials', ['id' => $module->id]) }}" 
                               class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200">
                                View Module
                                <svg class="ml-2 -mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                            <span class="text-xs px-2 py-1 bg-gray-100 text-gray-600 rounded-full">
                                {{ $module->created_at->diffForHumans() }}
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
                        <h3 class="mt-4 text-lg font-medium text-gray-900">No Modules Available</h3>
                        <p class="mt-2 text-gray-500">There are currently no modules available for this course.</p>
                        @if(in_array('admin', $userRoles) || in_array('instructor', $userRoles))
                        <div class="mt-6">
                            <a href="{{ route('admin.module.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Create First Module
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($modules->hasPages())
            <div class="mt-8">
                {{ $modules->links('vendor.pagination.semantic-red') }}
            </div>
            @endif
        </div>
    </div>

    <style>
        .group:hover .group-hover\:scale-110 {
            transform: scale(1.1);
        }
    </style>
</x-app-layout>