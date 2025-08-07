<x-app-layout>
    <div class="min-h-screen bg-gradient-to-b from-red-50 to-white">
        <!-- Hero Section -->
        <div class="relative bg-gradient-to-r from-red-600 to-red-800 py-16 overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjA1KSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNwYXR0ZXJuKSIvPjwvc3ZnPg==')]"></div>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                    <div class="text-center md:text-left">
                        <h1 class="text-3xl md:text-4xl font-bold text-white">
                            Module Content: <span class="text-red-200">{{ $module->title }}</span>
                        </h1>
                        <p class="mt-3 text-red-100 max-w-2xl">Explore all learning materials for this module</p>
                    </div>
                    @php
                        $userRoles = Auth::user()->roles->pluck('name')->toArray();
                        $canEdit = in_array('admin', $userRoles) || in_array('instructor', $userRoles);
                    @endphp
                    @if($canEdit)
                    <a href="{{ route('admin.material.create', ['id' => $module->id]) }}"
                       class="mt-4 md:mt-0 flex items-center gap-2 bg-white hover:bg-gray-100 text-red-600 py-3 px-4 rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105 hover:shadow-xl"
                       aria-label="Add new material">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Add New Material
                    </a>
                    @endif
                </div>
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-red-600/10 to-transparent"></div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-12 -mt-10">
            <!-- Breadcrumb Navigation -->
            <nav class="flex px-3 sm:px-5 py-3 my-3 sm:my-5 text-gray-700 border border-gray-200 rounded-lg bg-red-50 overflow-x-auto" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse whitespace-nowrap">
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center text-xs sm:text-sm font-medium text-red-700 hover:text-gray-600">
                            <svg class="w-3 h-3 me-1 sm:me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                            </svg>
                            <span class="hidden sm:inline">Home</span>
                            <span class="sm:hidden">🏠</span>
                        </a>    
                    </li>
                    <li class="inline-flex items-center">
                        <a href="{{ route('class') }}" class="inline-flex items-center text-xs sm:text-sm font-medium text-red-700 hover:text-gray-600">
                            <svg class="rtl:rotate-180 w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            Class
                        </a>    
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ms-1 text-xs sm:text-sm font-medium text-gray-500 md:ms-2 truncate max-w-32 sm:max-w-none">{{ $module->title }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Empty State -->
            @if($materials->isEmpty())
                <div class="bg-white p-8 sm:p-12 rounded-2xl shadow-xl max-w-2xl mx-auto text-center border-2 border-dashed border-gray-200 hover:border-red-300 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="mx-auto h-24 w-24 sm:h-32 sm:w-32 text-red-400 animate-bounce" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="mt-6 text-xl sm:text-2xl font-bold text-gray-800">No Materials Yet</h3>
                    <p class="mt-3 text-gray-600">Start by adding the first learning material for this module.</p>
                    @if($canEdit)
                    <div class="mt-6">
                        <a href="{{ route('admin.material.create', ['id' => $module->id]) }}" 
                           class="inline-flex items-center px-6 py-2 sm:px-8 sm:py-3 border border-transparent text-base sm:text-lg font-bold rounded-full shadow-sm text-white bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 mr-2" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Add First Material
                        </a>
                    </div>
                    @endif
                </div>
            @else
                <!-- Materials List -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <!-- Simple Table Header -->
                    <div class="bg-red-50 px-6 py-4 border-b">
                        <h3 class="font-semibold text-red-800">Learning Materials</h3>
                    </div>

                    <!-- Materials List Items -->
                    <div class="divide-y divide-gray-100">
                        @foreach($materials as $material)
                        <!-- Simple Material Item -->
                        <div class="px-6 py-4 border-b border-gray-100 hover:bg-gray-50">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4 flex-1">
                                    <!-- Icon -->
                                    <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                                        @if($material->type === 'video')
                                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                            </svg>
                                        @elseif($material->type === 'document')
                                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                        @else
                                            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                            </svg>
                                        @endif
                                    </div>
                                    
                                    <!-- Content -->
                                    <div class="flex-1 min-w-0">
                                        <a href="{{ route('material.show', $material->id) }}" class="block">
                                            <h3 class="text-lg font-semibold text-gray-900 hover:text-red-600 truncate transition-colors duration-200">
                                                {{ $material->title }}
                                            </h3>
                                        </a>
                                        <p class="text-sm text-gray-500 truncate">{{ $material->description }}</p>
                                        <div class="flex items-center space-x-4 mt-2">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                {{ $material->type === 'video' ? 'bg-blue-100 text-blue-800' : 
                                                   ($material->type === 'document' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                                {{ ucfirst($material->type) }}
                                            </span>
                                            <span class="text-xs text-gray-500">
                                                {{ $material->created_at->format('M d, Y') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Actions -->
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('material.show', $material->id) }}" 
                                       class="p-2 text-gray-400 hover:text-red-600 rounded-full hover:bg-red-50">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </a>
                                    @if($canEdit)
                                    <a href="{{ route('admin.material.edit', $material->id) }}" 
                                       class="p-2 text-gray-400 hover:text-blue-600 rounded-full hover:bg-blue-50">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.material.destroy', $material->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')"
                                                class="p-2 text-gray-400 hover:text-red-600 rounded-full hover:bg-red-50">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Tablet Layout (Optional - bisa dihapus jika tidak diperlukan) -->
                        <!-- <div class="hidden sm:block md:hidden px-4 py-4 hover:bg-red-50/50 transition-colors duration-200 border-b border-gray-100">
                            <a href="{{ route('material.show', $material->id) }}" class="block" aria-label="View {{ $material->title }}">
                                <div class="flex items-start justify-between">
                                    <div class="flex items-start space-x-3 flex-1 min-w-0">
                                        <div class="flex-shrink-0 h-12 w-12 rounded-lg bg-gradient-to-br from-red-100 to-white flex items-center justify-center shadow-sm">
                                            @switch($material->type)
                                                @case('video')
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                                    </svg>
                                                    @break
                                                @case('document')
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                    </svg>
                                                    @break
                                                @default
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                                    </svg>
                                            @endswitch
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-lg font-semibold text-gray-800 truncate flex items-center">
                                                <span class="truncate">{{ $material->title }}</span>
                                                @if($material->is_new)
                                                    <span class="ml-2 bg-red-500 text-white text-xs px-2 py-0.5 rounded-full animate-pulse flex-shrink-0">NEW</span>
                                                @endif
                                            </h3>
                                            <p class="text-sm text-gray-500 line-clamp-2 mt-1">{{ $material->description }}</p>
                                            <div class="flex items-center justify-between mt-3">
                                                <div class="flex items-center space-x-3">
                                                    <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                                        {{ $material->type === 'assignment' ? 'bg-yellow-100 text-yellow-800' : ($material->type === 'video' ? 'bg-blue-100 text-blue-800' : 'bg-red-100 text-red-800') }}">
                                                        {{ ucfirst($material->type) }}
                                                    </span>
                                                    <span class="text-xs text-gray-500">{{ $material->duration ?? '5 min' }} read</span>
                                                </div>
                                                <time datetime="{{ $material->created_at->format('Y-m-d') }}" class="text-xs text-gray-400">
                                                    {{ $material->created_at->format('M d, Y') }}
                                                </time>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @if($canEdit)
                            <div class="flex justify-end space-x-2 mt-3 pt-3 border-t border-gray-100">
                                <a href="{{ route('admin.material.edit', $material->id) }}" 
                                   class="p-2 rounded-full bg-white text-gray-500 hover:text-blue-600 hover:bg-blue-100 transition-colors duration-200 shadow-sm border border-gray-200"
                                   aria-label="Edit {{ $material->title }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.material.destroy', $material->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Are you sure you want to delete this material?')"
                                            class="p-2 rounded-full bg-white text-gray-500 hover:text-red-600 hover:bg-red-100 transition-colors duration-200 shadow-sm border border-gray-200"
                                            aria-label="Delete {{ $material->title }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            @endif
                        </div>

                        <!-- Mobile Layout -->
                        <div class="hidden p-3 hover:bg-red-50/50 transition-colors duration-200 border-b border-gray-100">
                            <a href="{{ route('material.show', $material->id) }}" class="block" aria-label="View {{ $material->title }}">
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0 h-12 w-12 rounded-lg bg-gradient-to-br from-red-100 to-white flex items-center justify-center shadow-sm">
                                        @switch($material->type)
                                            @case('video')
                                                <div class="relative">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                                    </svg>
                                                    <span class="absolute -bottom-0.5 -right-0.5 bg-red-500 text-white text-xs w-3 h-3 rounded-full flex items-center justify-center">▶</span>
                                                </div>
                                                @break
                                            @case('document')
                                                <div class="relative">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                    </svg>
                                                    <span class="absolute -bottom-0.5 -right-0.5 bg-red-500 text-white text-xs w-3 h-3 rounded-full flex items-center justify-center">📄</span>
                                                </div>
                                                @break
                                            @default
                                                <div class="relative">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                                    </svg>
                                                    <span class="absolute -bottom-0.5 -right-0.5 bg-yellow-500 text-white text-xs w-3 h-3 rounded-full flex items-center justify-center">📝</span>
                                                </div>
                                        @endswitch
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-start justify-between">
                                            <h3 class="text-base font-semibold text-gray-800 line-clamp-2 pr-2 flex-1">
                                                {{ $material->title }}
                                                @if($material->is_new)
                                                    <span class="inline-block ml-1 bg-red-500 text-white text-xs px-1.5 py-0.5 rounded-full animate-pulse">NEW</span>
                                                @endif
                                            </h3>
                                            <a href="{{ route('material.show', $material->id) }}" 
                                               class="flex-shrink-0 p-2 rounded-full bg-red-50 text-red-600 hover:bg-red-100 transition-colors duration-200"
                                               aria-label="View {{ $material->title }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </a>
                                        </div>
                                        <p class="text-sm text-gray-500 line-clamp-2 mt-1 mb-3">{{ $material->description }}</p>
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-2">
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                                    {{ $material->type === 'assignment' ? 'bg-yellow-100 text-yellow-800' : ($material->type === 'video' ? 'bg-blue-100 text-blue-800' : 'bg-red-100 text-red-800') }}">
                                                    {{ ucfirst($material->type) }}
                                                </span>
                                                <span class="text-xs text-gray-500 flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    {{ $material->duration ?? '5 min' }}
                                                </span>
                                            </div>
                                            <time datetime="{{ $material->created_at->format('Y-m-d') }}" class="text-xs text-gray-400">
                                                {{ $material->created_at->format('M d') }}
                                            </time>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @if($canEdit)
                            <div class="flex justify-end space-x-2 mt-3 pt-3 border-t border-gray-100">
                                <a href="{{ route('admin.material.edit', $material->id) }}" 
                                   class="p-2 rounded-full bg-white text-gray-500 hover:text-blue-600 hover:bg-blue-50 transition-colors duration-200 shadow-sm border border-gray-200"
                                   aria-label="Edit {{ $material->title }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.material.destroy', $material->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Are you sure you want to delete this material?')"
                                            class="p-2 rounded-full bg-white text-gray-500 hover:text-red-600 hover:bg-red-50 transition-colors duration-200 shadow-sm border border-gray-200"
                                            aria-label="Delete {{ $material->title }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Success Notification -->
    @if(session('success'))
    <div class="fixed bottom-4 right-4 z-50">
        <div class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-xl flex items-center animate-fade-in-up">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            {{ session('success') }}
            <button class="ml-4 text-white hover:text-gray-200" onclick="this.parentElement.remove()" aria-label="Close notification">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>
    @endif

    <style>
        [data-tooltip] {
        position: relative;
        }
        [data-tooltip]:hover::after {
        content: attr(data-tooltip);
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%);
        background: #333;
        color: white;
        padding: 2px 6px;
        border-radius: 4px;
        font-size: 12px;
        white-space: nowrap;
        margin-bottom: 5px;
        }
        [data-tooltip]:hover::before {
        content: "";
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%);
        border-width: 4px;
        border-style: solid;
        border-color: #333 transparent transparent transparent;
        margin-bottom: 1px;
        }
                .animate-fade-in-up {
            animation: fadeInUp 0.5s ease-out forwards;
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</x-app-layout>