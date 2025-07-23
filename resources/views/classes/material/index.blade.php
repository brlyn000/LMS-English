<x-app-layout>
    <div class="min-h-screen bg-gradient-to-b from-red-50 to-white">
        <!-- Hero Section with Animated Background -->
        <div class="relative bg-gradient-to-r from-red-600 to-red-800 py-16 overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjA1KSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNwYXR0ZXJuKSIvPjwvc3ZnPg==')]"></div>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                    <div class="text-center md:text-left">
                        <h1 class="text-3xl md:text-4xl font-bold text-white">Module Content: <span class="text-red-200">{{ $module->title }}</span></h1>
                        <p class="mt-3 text-red-100 max-w-2xl">Explore all learning materials for this module</p>
                    </div>
                    @php
                        $userRoles = Auth::user()->roles->pluck('name')->toArray();
                    @endphp
                    @if(in_array('admin', $userRoles) || in_array('instructor', $userRoles))
                    <a href="{{ route('admin.material.create', ['id' => $module->id]) }}"
                       class="mt-4 md:mt-0 flex items-center gap-2 bg-white hover:bg-gray-100 text-red-600 py-3 px-4 rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 -mt-10">
            <!-- Empty State -->
            @if($materials->isEmpty())
                <div class="bg-white p-12 rounded-2xl shadow-xl max-w-2xl mx-auto text-center border-2 border-dashed border-gray-200 hover:border-red-300 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="mx-auto h-32 w-32 text-red-400 animate-bounce">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="mt-6 text-2xl font-bold text-gray-800">No Materials Yet</h3>
                    <p class="mt-3 text-gray-600">Start by adding the first learning material for this module.</p>
                    <div class="mt-8">
                        @if(in_array('admin', $userRoles) || in_array('instructor', $userRoles))
                        <a href="{{ route('admin.material.create', ['id' => $module->id]) }}" 
                           class="inline-flex items-center px-8 py-3 border border-transparent text-lg font-bold rounded-full shadow-sm text-white bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Add First Material
                        </a>
                        @endif
                    </div>
                </div>
            @else
                <!-- Materials List -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                    <!-- Table Header -->
                    <div class="grid grid-cols-12 gap-4 px-6 py-4 bg-gradient-to-r from-red-50 to-red-100 border-b border-red-200">
                        <div class="col-span-6 md:col-span-7 font-semibold text-red-800 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9.504 1.132a1 1 0 01.992 0l1.75 1a1 1 0 11-.992 1.736L10 3.152l-1.254.716a1 1 0 11-.992-1.736l1.75-1zM5.618 4.504a1 1 0 01-.372 1.364L5.016 6l.23.132a1 1 0 11-.992 1.736L4 7.723V8a1 1 0 01-2 0V6a.996.996 0 01.52-.878l1.734-.99a1 1 0 011.364.372zm8.764 0a1 1 0 011.364-.372l1.733.99A1.002 1.002 0 0118 6v2a1 1 0 11-2 0v-.277l-.254.145a1 1 0 11-.992-1.736l.23-.132-.23-.132a1 1 0 01-.372-1.364zm-7 4a1 1 0 011.364-.372L10 8.848l1.254-.716a1 1 0 11.992 1.736L11 10.58V12a1 1 0 11-2 0v-1.42l-1.246-.712a1 1 0 01-.372-1.364zM3 11a1 1 0 011 1v1.42l1.246.712a1 1 0 11-.992 1.736l-1.75-1A1 1 0 012 14v-2a1 1 0 011-1zm14 0a1 1 0 011 1v2a1 1 0 01-.504.868l-1.75 1a1 1 0 11-.992-1.736L16 13.42V12a1 1 0 011-1zm-9.618 5.504a1 1 0 011.364-.372l.254.145V16a1 1 0 112 0v.277l.254-.145a1 1 0 11.992 1.736l-1.735.992a.995.995 0 01-1.022 0l-1.735-.992a1 1 0 01-.372-1.364z" clip-rule="evenodd" />
                            </svg>
                            Learning Materials
                        </div>
                        <div class="col-span-3 md:col-span-2 font-semibold text-red-800">Type</div>
                        <div class="col-span-3 md:col-span-2 font-semibold text-red-800 hidden md:flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                            Date Added
                        </div>
                        <div class="col-span-3 md:col-span-1 font-semibold text-red-800 text-right">Actions</div>
                    </div>

                    <!-- Materials List Items -->
                    <div class="divide-y divide-gray-100">
                        @foreach($materials as $material)
                        <div class="grid grid-cols-12 gap-4 px-6 py-5 hover:bg-red-50/50 transition-colors duration-200 group transform hover:-translate-y-0.5">
                            <!-- Title and Description -->
                            <div class="col-span-6 md:col-span-7">
                                <a href="{{ route('material.show', $material->id) }}" class="flex items-center space-x-4">
                                    <div class="flex-shrink-0 h-12 w-12 rounded-lg bg-gradient-to-br from-red-100 to-white flex items-center justify-center shadow-sm">
                                        @if($material->type === 'video')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                            </svg>
                                        @elseif($material->type === 'document')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                            </svg>
                                        @endif
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-red-600 transition-colors duration-200">{{ $material->title }}</h3>
                                        <p class="text-sm text-gray-500 line-clamp-1">{{ $material->description }}</p>
                                    </div>
                                </a>
                            </div>

                            <!-- Type -->
                            <div class="col-span-3 md:col-span-2 flex items-center">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full 
                                    {{ $material->type === 'assignment' ? 'bg-yellow-100 text-yellow-800' : ($material->type === 'video' ? 'bg-blue-100 text-blue-800' : 'bg-red-100 text-red-800') }}">
                                    {{ ucfirst($material->type) }}
                                </span>
                            </div>

                            <!-- Date -->
                            <div class="col-span-3 md:col-span-2 hidden md:flex items-center">
                                <span class="text-sm text-gray-500">{{ $material->created_at->format('M d, Y') }}</span>
                            </div>

                            <!-- Actions -->
                            <div class="col-span-3 md:col-span-1 flex items-center justify-end space-x-1">
                                <a href="{{ route('material.show', $material->id) }}" 
                                   class="p-2 rounded-full bg-white text-gray-500 hover:text-red-600 hover:bg-red-100 transition-colors duration-200 shadow-sm border border-gray-200 hover:border-red-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                @if(in_array('admin', $userRoles) || in_array('instructor', $userRoles))
                                <a href="{{ route('admin.material.edit', $material->id) }}" 
                                   class="p-2 rounded-full bg-white text-gray-500 hover:text-blue-600 hover:bg-blue-100 transition-colors duration-200 shadow-sm border border-gray-200 hover:border-blue-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.material.destroy', $material->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Are you sure you want to delete this material?')"
                                            class="p-2 rounded-full bg-white text-gray-500 hover:text-red-600 hover:bg-red-100 transition-colors duration-200 shadow-sm border border-gray-200 hover:border-red-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                                @endif
                            </div>
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
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            {{ session('success') }}
            <button class="ml-4 text-white hover:text-gray-200" onclick="this.parentElement.remove()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>
    @endif

    <style>
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