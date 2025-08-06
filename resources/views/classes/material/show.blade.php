<x-app-layout>
    <div class="min-h-screen bg-gradient-to-b from-red-50 to-white">
        <!-- Hero Section -->
        <div class="relative bg-gradient-to-r from-red-600 to-red-800 py-16 overflow-hidden">
            <div class="absolute inset-0 opacity-20">
                <svg class="absolute left-0 top-0 h-full w-1/3 text-white transform -translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <polygon points="0,100 100,0 100,100"></polygon>
                </svg>
                <svg class="absolute right-0 bottom-0 h-full w-1/3 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <polygon points="0,0 100,0 0,100"></polygon>
                </svg>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center">
                    <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
                        {{ $material->title }}
                    </h1>
                    <p class="mt-3 max-w-md mx-auto text-base text-red-100 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                        {{ $material->description }}
                    </p>
                    <div class="mt-5 flex flex-wrap justify-center gap-3">
                        <span class="px-4 py-2 rounded-full text-sm font-medium bg-white bg-opacity-20 text-white">
                            {{ ucfirst($material->type) }}
                        </span>
                        <span class="px-4 py-2 rounded-full text-sm font-medium bg-white bg-opacity-20 text-white">
                            {{ $material->created_at->format('d F Y') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
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
                <li class="inline-flex items-center">
                <a href="{{ route('class') }}" class="inline-flex items-center text-sm font-medium text-red-700 hover:text-gray-600 ">
                    <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    class
                </a>    
                </li>
                <li class="inline-flex items-center">
                <a href="{{ route('module.materials', $module->id) }}" class="inline-flex items-center text-sm font-medium text-red-700 hover:text-gray-600 ">
                    <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    {{ $module->title }}
                </a>    
                </li>
                <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Materials</span>
                </div>
                </li>
            </ol>
        </nav>
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <!-- Material Content -->
                <div class="p-6 sm:p-8 lg:p-12">
                    @if($material->type === 'Video')
                        <!-- Video Player -->
                    <div class="relative pb-[56.25%] h-0 rounded-xl overflow-hidden bg-black mb-8">
                        <video controls class="absolute top-0 left-0 w-full h-full z-10">
                            <source src="{{ asset('storage/' . $material->file_path) }}" type="video/mp4">
                            Browser Anda tidak mendukung pemutaran video.
                        </video>

                        <!-- Overlay (tidak menghalangi klik) -->
                        <div class="absolute inset-0 flex items-center justify-center pointer-events-none z-0">
                            <div class="w-20 h-20 bg-red-600 bg-opacity-80 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    @elseif($material->type === 'Dokumen')
                        <!-- Document Viewer -->
                        <div class="h-96 bg-gray-50 rounded-xl flex flex-col items-center justify-center p-6 mb-8 border-2 border-dashed border-gray-200">
                            <div class="text-red-500 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-medium text-gray-900 mb-2">Dokumen Materi</h3>
                            <p class="text-gray-600 mb-6">Silahkan unduh dokumen untuk melihat isinya</p>
                            <a href="{{ asset('storage/' . $material->file_path) }}" 
                               class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Unduh Dokumen
                            </a>
                        </div>
                    @else
                        <!-- Assignment Content -->
                        <div class="h-96 bg-gray-50 rounded-xl flex flex-col items-center justify-center p-6 mb-8 border-2 border-dashed border-gray-200">
                            <div class="text-yellow-500 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-medium text-gray-900 mb-2">Tugas Materi</h3>
                            <p class="text-gray-600 mb-6">Silahkan unduh file tugas untuk melihat detailnya</p>
                            <a href="{{ asset('storage/' . $material->file_path) }}" 
                               class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Unduh Tugas
                            </a>
                        </div>
                    @endif

                    <!-- Material Details -->
                    <div class="prose prose-red max-w-none">
                        <h2 class="text-2xl font-bold text-gray-900">Detail Materi</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h3 class="text-lg font-medium text-gray-900 mb-3">Deskripsi</h3>
                                <p class="text-gray-600">{{ $material->description }}</p>
                            </div>
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h3 class="text-lg font-medium text-gray-900 mb-3">Informasi</h3>
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="text-gray-600">Jenis: {{ ucfirst($material->type) }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span class="text-gray-600">Dibuat: {{ $material->created_at->format('d F Y') }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="text-gray-600">
                                            Diperbarui: {{ $material->updated_at?->format('d F Y') ?? 'Tanggal tidak tersedia' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-12 flex flex-wrap gap-4">
                        <a href="{{ asset('storage/' . $material->file_path) }}" 
                           download
                           class="flex-1 md:flex-none inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Unduh Materi
                        </a>
                        @php
                            $userRoles = Auth::user()->roles->pluck('name')->toArray();
                        @endphp
                        @if(in_array('admin', $userRoles) || in_array('instructor', $userRoles))
                        <a href="{{ route('admin.material.edit', $material->id) }}" 
                           class="flex-1 md:flex-none inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-base font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit Materi
                        </a>
                        <form action="{{ route('admin.material.destroy', $material->id) }}" method="POST" class="flex-1 md:flex-none">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus materi ini?')"
                                    class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Hapus Materi
                            </button>
                        </form>
                        @endif
                    </div>
                    @if(session('success'))
                        <div x-data="{ open: true }" x-show="open" class="fixed inset-0 flex items-end justify-center p-4 pointer-events-none">
                            <div class="bg-green-500 text-white px-4 py-2 rounded shadow-lg pointer-events-auto">
                                {{ session('success') }}
                                <button class="ml-4 font-bold" @click="open = false">&times;</button>
                            </div>
                        </div>
                    @endif

                @php
                    $mySubmission = null;
                    if ($material->type === 'Tugas') {
                        $mySubmission = $material->submissions->where('user_id', Auth::id())->first();
                    }                
                @endphp
                @if($mySubmission)
                    <div class="bg-white shadow-xl rounded-xl overflow-hidden mt-8 border border-gray-100 transition-all duration-300 hover:shadow-lg">
                        <div class="bg-gradient-to-r from-red-50 to-white p-6">
                            <h3 class="font-semibold text-xl text-gray-800 flex items-center gap-2 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Submission Anda
                            </h3>
                            
                            <div class="space-y-4">
                                <!-- Multiple Files Submission with Preview -->
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 bg-red-100 p-3 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-500 mb-2">File Submission ({{ count($mySubmission->file_paths) }} file)</p>
                                        
                                        <div class="space-y-3">
                                            @foreach($mySubmission->file_paths as $filePath)
                                                @php
                                                    $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
                                                    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                                                @endphp
                                                
                                                <div class="border border-gray-200 rounded-lg p-3">
                                                    @if(in_array($fileExtension, $imageExtensions))
                                                        <!-- Image Preview -->
                                                        <div class="mb-2">
                                                            <img src="{{ asset('storage/' . $filePath) }}" 
                                                                 alt="Submitted file" 
                                                                 class="max-w-xs max-h-32 rounded border border-gray-200 shadow-sm">
                                                        </div>
                                                    @endif
                                                    
                                                    <a href="{{ asset('storage/' . $filePath) }}" target="_blank" 
                                                    class="inline-flex items-center text-red-600 hover:text-red-800 font-medium group text-sm">
                                                        {{ basename($filePath) }}
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Notes -->
                                @if($mySubmission->notes)
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 bg-blue-100 p-3 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Notes</p>
                                        <p class="text-gray-700">{{ $mySubmission->notes }}</p>
                                    </div>
                                </div>
                                @endif
                                
                                <!-- Submission Time -->
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 bg-green-100 p-3 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Submission Time</p>
                                        <p class="text-gray-700">{{ $mySubmission->submitted_at }}</p>
                                    </div>
                                </div>
                                <!-- Comments -->
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 bg-blue-100 p-3 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.77 9.77 0 01-4-.84L3 21l1.84-4A8.96 8.96 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                        </svg>

                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Comment</p>
                                        <p class="text-gray-700">{{ $mySubmission->comment }}</p>
                                    </div>
                                </div>
                                <!-- Score -->
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 bg-amber-100 p-3 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 21h8M12 17v4M7 4h10v6a5 5 0 01-10 0V4zm-2 0a2 2 0 00-2 2v1a3 3 0 003 3V4H5zm14 0a2 2 0 012 2v1a3 3 0 01-3 3V4h1z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Score</p>
                                        <p class="text-gray-700">{{ $mySubmission->score }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Update Submission Form -->
                            <div class="mt-6 pt-4 border-t border-gray-100">
                                <button onclick="toggleUpdateForm()" 
                                        class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200 shadow-sm mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                    </svg>
                                    Update Submission
                                </button>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        window.toggleUpdateForm = function () {
                                            const updateForm = document.getElementById('updateForm');
                                            updateForm.classList.toggle('hidden');
                                        };
                                    });
                                </script>

                                
                                <form action="{{ route('submissions.destroy', $mySubmission->id) }}" method="POST" 
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus tugas ini? Tugas yang sudah dihapus tidak dapat dikembalikan.')"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors duration-200 shadow-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        Hapus Submission
                                    </button>
                                </form>
                                
                                <!-- Update Form (Hidden by default) -->
                                <div id="updateForm" class="hidden mt-4 p-4 bg-gray-50 rounded-lg">
                                    <form action="{{ route('submissions.update', $mySubmission->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                                        @csrf
                                        @method('PUT')
                                        
                                        <div class="space-y-3">
                                            <label for="update_files" class="block text-sm font-medium text-gray-700">Update Files (Opsional)</label>
                                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-gray-400 transition-colors">
                                                <svg class="mx-auto h-8 w-8 text-gray-400 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                </svg>
                                                <input type="file" name="files[]" id="update_files" multiple
                                                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                                    accept=".pdf,.doc,.docx,.ppt,.pptx,.jpg,.jpeg,.png,.gif">
                                                <p class="text-xs text-gray-500 mt-1">Pilih file baru untuk mengganti semua file lama<br>Maksimal 5 file, 30MB per file</p>
                                            </div>
                                        </div>
                                        
                                        <div class="space-y-2">
                                            <label for="update_notes" class="block text-sm font-medium text-gray-700">Update Catatan</label>
                                            <textarea name="notes" id="update_notes" rows="3" 
                                                    class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500"
                                                    placeholder="Update catatan...">{{ $mySubmission->notes }}</textarea>
                                        </div>
                                        
                                        <div class="flex space-x-2">
                                            <button type="submit" 
                                                    class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm">
                                                Simpan Update
                                            </button>
                                            <button type="button" onclick="toggleUpdateForm()" 
                                                    class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-700 rounded-lg text-sm">
                                                Batal
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                @if($material->type === 'Tugas')
                    <form action="{{ route('submissions.store', $material->id) }}" method="POST" enctype="multipart/form-data" class="mt-8 space-y-6">
                        @csrf
                        
                        <!-- Enhanced Multiple File Upload -->
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <label class="block text-sm font-medium text-gray-700">Upload File Tugas</label>
                                <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full" id="file-counter">0/5 file</span>
                            </div>
                            
                            <!-- Upload Area -->
                            <div class="relative group" id="upload-container">
                                <div class="absolute -inset-0.5 bg-gradient-to-r from-red-500 to-red-700 rounded-lg blur opacity-25 group-hover:opacity-50 transition duration-300"></div>
                                
                                <div class="relative bg-white rounded-lg border-2 border-dashed border-gray-300 hover:border-red-400 transition-all duration-300" id="drop-zone">
                                    <div class="flex flex-col items-center justify-center pt-6 pb-6 px-4" id="drop-area">
                                        <div class="w-16 h-16 bg-red-50 rounded-full flex items-center justify-center mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                        </div>
                                        <p class="mb-2 text-sm text-gray-600 text-center">
                                            <span class="font-semibold text-red-600">Klik untuk pilih file</span> atau drag & drop di sini
                                        </p>
                                        <p class="text-xs text-gray-400 text-center">PDF, DOC, DOCX, PPT, PPTX, JPG, PNG<br>Maksimal 30MB per file, 5 file total</p>
                                        <input type="file" name="files[]" id="files" multiple required 
                                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                            onchange="handleFileSelect(this)" accept=".pdf,.doc,.docx,.ppt,.pptx,.jpg,.jpeg,.png,.gif">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Selected Files Display -->
                            <div id="selected-files" class="hidden">
                                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                    <div class="flex items-center justify-between mb-3">
                                        <h4 class="text-sm font-medium text-gray-700">File yang dipilih:</h4>
                                        <button type="button" onclick="clearAllFiles()" class="text-xs text-red-600 hover:text-red-800 font-medium">
                                            Hapus semua
                                        </button>
                                    </div>
                                    <div id="file-list" class="space-y-2"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Notes Section -->
                        <div class="space-y-2">
                            <label for="notes" class="block text-sm font-medium text-gray-700">Catatan (Opsional)</label>
                            <div class="relative">
                                <textarea name="notes" id="notes" rows="4" 
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200"
                                        placeholder="Tambahkan catatan atau penjelasan tentang tugas Anda..."></textarea>
                                <div class="absolute bottom-2 right-2 text-xs text-gray-400" id="char-count">0/500</div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-2">
                            <button type="submit" 
                                    class="group relative w-full flex justify-center items-center py-3 px-6 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-red-600 to-red-700 shadow-md hover:from-red-700 hover:to-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300 transform hover:-translate-y-0.5">
                                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-200 group-hover:text-red-100 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                    </svg>
                                </span>
                                Kumpulkan Tugas
                            </button>
                        </div>
                    </form>
                @endif


                <script>
                    let selectedFiles = [];
                    
                    function handleFileSelect(input) {
                        const files = Array.from(input.files);
                        selectedFiles = files.slice(0, 5); // Limit to 5 files
                        updateFileDisplay();
                        updateFileCounter();
                    }
                    
                    function updateFileDisplay() {
                        const fileList = document.getElementById('file-list');
                        const selectedFilesContainer = document.getElementById('selected-files');
                        const dropZone = document.getElementById('drop-zone');
                        
                        if (selectedFiles.length > 0) {
                            selectedFilesContainer.classList.remove('hidden');
                            dropZone.classList.add('border-green-300', 'bg-green-50');
                            dropZone.classList.remove('border-gray-300');
                            
                            let fileHTML = '';
                            selectedFiles.forEach((file, index) => {
                                const fileSize = (file.size / 1024 / 1024).toFixed(2);
                                const fileType = getFileType(file.name);
                                const fileIcon = getFileIcon(file.name);
                                
                                fileHTML += `
                                    <div class="flex items-center justify-between p-3 bg-white rounded-lg border border-gray-200 hover:border-gray-300 transition-colors">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 rounded-lg ${fileIcon.bg} flex items-center justify-center">
                                                <svg class="w-5 h-5 ${fileIcon.color}" fill="currentColor" viewBox="0 0 20 20">
                                                    ${fileIcon.path}
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-900 truncate max-w-xs">${file.name}</p>
                                                <p class="text-xs text-gray-500">${fileSize} MB • ${fileType}</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Ready</span>
                                            <button type="button" onclick="removeFile(${index})" class="text-red-500 hover:text-red-700 p-1">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                `;
                            });
                            fileList.innerHTML = fileHTML;
                        } else {
                            selectedFilesContainer.classList.add('hidden');
                            dropZone.classList.remove('border-green-300', 'bg-green-50');
                            dropZone.classList.add('border-gray-300');
                        }
                    }
                    
                    function updateFileCounter() {
                        const counter = document.getElementById('file-counter');
                        counter.textContent = `${selectedFiles.length}/5 file`;
                        
                        if (selectedFiles.length > 0) {
                            counter.classList.remove('bg-gray-100', 'text-gray-500');
                            counter.classList.add('bg-green-100', 'text-green-700');
                        } else {
                            counter.classList.add('bg-gray-100', 'text-gray-500');
                            counter.classList.remove('bg-green-100', 'text-green-700');
                        }
                    }
                    
                    function removeFile(index) {
                        selectedFiles.splice(index, 1);
                        updateFileInput();
                        updateFileDisplay();
                        updateFileCounter();
                    }
                    
                    function clearAllFiles() {
                        selectedFiles = [];
                        updateFileInput();
                        updateFileDisplay();
                        updateFileCounter();
                    }
                    
                    function updateFileInput() {
                        const fileInput = document.getElementById('files');
                        const dt = new DataTransfer();
                        selectedFiles.forEach(file => dt.items.add(file));
                        fileInput.files = dt.files;
                    }
                    
                    function getFileType(filename) {
                        const ext = filename.split('.').pop().toLowerCase();
                        const types = {
                            'pdf': 'PDF Document',
                            'doc': 'Word Document', 'docx': 'Word Document',
                            'ppt': 'PowerPoint', 'pptx': 'PowerPoint',
                            'jpg': 'Image', 'jpeg': 'Image', 'png': 'Image', 'gif': 'Image'
                        };
                        return types[ext] || 'File';
                    }
                    
                    function getFileIcon(filename) {
                        const ext = filename.split('.').pop().toLowerCase();
                        const icons = {
                            'pdf': { bg: 'bg-red-100', color: 'text-red-600', path: '<path d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm2 2h8v8H6V6z"/>' },
                            'doc': { bg: 'bg-blue-100', color: 'text-blue-600', path: '<path d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm2 2h8v8H6V6z"/>' },
                            'docx': { bg: 'bg-blue-100', color: 'text-blue-600', path: '<path d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm2 2h8v8H6V6z"/>' },
                            'ppt': { bg: 'bg-orange-100', color: 'text-orange-600', path: '<path d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm2 2h8v8H6V6z"/>' },
                            'pptx': { bg: 'bg-orange-100', color: 'text-orange-600', path: '<path d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm2 2h8v8H6V6z"/>' },
                            'jpg': { bg: 'bg-green-100', color: 'text-green-600', path: '<path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"/>' },
                            'jpeg': { bg: 'bg-green-100', color: 'text-green-600', path: '<path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"/>' },
                            'png': { bg: 'bg-green-100', color: 'text-green-600', path: '<path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"/>' }
                        };
                        return icons[ext] || { bg: 'bg-gray-100', color: 'text-gray-600', path: '<path d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm2 2h8v8H6V6z"/>' };
                    }

                    // Character counter for notes
                    document.getElementById('notes').addEventListener('input', function() {
                        const charCount = this.value.length;
                        document.getElementById('char-count').textContent = `${charCount}/500`;
                        
                        if (charCount > 500) {
                            document.getElementById('char-count').classList.add('text-red-500');
                        } else {
                            document.getElementById('char-count').classList.remove('text-red-500');
                        }
                    });

                    // Drag and drop functionality
                    const dropArea = document.getElementById('drop-area');
                    
                    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                        dropArea.addEventListener(eventName, preventDefaults, false);
                    });

                    function preventDefaults(e) {
                        e.preventDefault();
                        e.stopPropagation();
                    }

                    ['dragenter', 'dragover'].forEach(eventName => {
                        dropArea.addEventListener(eventName, highlight, false);
                    });

                    ['dragleave', 'drop'].forEach(eventName => {
                        dropArea.addEventListener(eventName, unhighlight, false);
                    });

                    function highlight() {
                        const dropZone = document.getElementById('drop-zone');
                        dropZone.classList.add('border-red-500', 'bg-red-50');
                        dropZone.classList.remove('border-gray-300', 'border-green-300');
                    }

                    function unhighlight() {
                        const dropZone = document.getElementById('drop-zone');
                        dropZone.classList.remove('border-red-500', 'bg-red-50');
                        if (selectedFiles.length > 0) {
                            dropZone.classList.add('border-green-300', 'bg-green-50');
                        } else {
                            dropZone.classList.add('border-gray-300');
                        }
                    }

                    dropArea.addEventListener('drop', handleDrop, false);

                    function handleDrop(e) {
                        const dt = e.dataTransfer;
                        const files = Array.from(dt.files);
                        selectedFiles = files.slice(0, 5);
                        updateFileInput();
                        updateFileDisplay();
                        updateFileCounter();
                    }
                    
                </script>
                @endif
                @php
                    $userRoleId = Auth::user()->roles->first()->id ?? null;
                @endphp

                @if(in_array($userRoleId, [1, 2]))
                    <div class="mt-10 bg-white shadow-lg rounded-xl overflow-hidden border border-red-100">
                        <div class="bg-gradient-to-r from-red-600 to-red-700 px-6 py-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-bold text-white">Daftar Pengumpulan Tugas</h3>
                                <span class="bg-white bg-opacity-20 text-white px-3 py-1 rounded-full text-sm font-medium">
                                    {{ $material->submissions->count() }} Submission
                                </span>
                            </div>
                        </div>

                        @if($material->submissions->count() > 0)
                            <!-- Desktop Table View -->
                            <div class="hidden lg:block overflow-x-auto">
                                <table class="min-w-full divide-y divide-red-200">
                                    <thead class="bg-red-50">
                                        <tr>
                                            <th class="px-4 py-3 text-left text-xs font-bold text-red-700 uppercase tracking-wider">No</th>
                                            <th class="px-4 py-3 text-left text-xs font-bold text-red-700 uppercase tracking-wider">Nama</th>
                                            <th class="px-4 py-3 text-left text-xs font-bold text-red-700 uppercase tracking-wider">File</th>
                                            <th class="px-4 py-3 text-left text-xs font-bold text-red-700 uppercase tracking-wider">Waktu</th>
                                            <th class="px-4 py-3 text-left text-xs font-bold text-red-700 uppercase tracking-wider">Catatan</th>
                                            <th class="px-4 py-3 text-left text-xs font-bold text-red-700 uppercase tracking-wider">Komentar</th>
                                            <th class="px-4 py-3 text-left text-xs font-bold text-red-700 uppercase tracking-wider">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-red-100">
                                        @foreach($material->submissions as $index => $submission)
                                            <tr class="hover:bg-red-50 transition-colors duration-150">
                                                <td class="px-4 py-4 whitespace-nowrap text-center text-gray-600 text-sm">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center mr-3">
                                                            <span class="text-red-600 font-medium text-sm">{{ substr($submission->user->name, 0, 1) }}</span>
                                                        </div>
                                                        <div class="font-medium text-gray-900 text-sm">{{ $submission->user->name }}</div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-4">
                                                    <div class="space-y-1 max-w-xs">
                                                        @foreach($submission->file_paths as $filePath)
                                                            <div class="flex items-center space-x-2">
                                                                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                                    <path d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm2 2h8v8H6V6z"/>
                                                                </svg>
                                                                <a href="{{ asset('storage/' . $filePath) }}" target="_blank" 
                                                                class="text-red-600 hover:text-red-800 underline text-xs truncate">
                                                                    {{ basename($filePath) }}
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                        <div class="text-xs text-gray-500">{{ count($submission->file_paths) }} file(s)</div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap text-gray-600 text-sm">
                                                    {{ $submission->submitted_at->format('d M Y') }}<br>
                                                    <span class="text-xs text-gray-400">{{ $submission->submitted_at->format('H:i') }}</span>
                                                </td>
                                                <td class="px-4 py-4 text-gray-600 text-sm max-w-xs">
                                                    <div class="truncate" title="{{ $submission->notes }}">{{ $submission->notes ?? '-' }}</div>
                                                </td>
                                                @if(in_array($userRoleId, [1, 2]))
                                                    <td class="px-4 py-4">
                                                        <form action="{{ route('submissions.comment', $submission->id) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="space-y-2">
                                                                <textarea name="comment" rows="2"
                                                                        class="border border-red-300 focus:border-red-500 focus:ring-red-500 rounded-md px-2 py-1 text-xs w-full resize-none"
                                                                        placeholder="Komentar...">{{ $submission->comment }}</textarea>
                                                                <button type="submit" 
                                                                        class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded text-xs font-medium transition-colors">
                                                                    Simpan
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </td>
                                                    <td class="px-4 py-4">
                                                        <form action="{{ route('submissions.score', $submission->id) }}" method="POST" class="space-y-2">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="number" name="score" value="{{ $submission->score }}" placeholder="0-100" min="0" max="100" class="border border-gray-300 rounded px-2 py-1 text-xs w-16">
                                                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded text-xs block">OK</button>
                                                        </form>
                                                    </td>
                                                @else
                                                    <td class="px-4 py-4 text-gray-600 text-sm">
                                                        <div class="max-w-xs truncate" title="{{ $submission->comment }}">{{ $submission->comment ?? '-' }}</div>
                                                    </td>
                                                    <td class="px-4 py-4 text-gray-600 text-sm">{{ $submission->score ?? '-' }}</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            <!-- Mobile Card View -->
                            <div class="lg:hidden divide-y divide-gray-200">
                                @foreach($material->submissions as $submission)
                                    <div class="p-4 hover:bg-gray-50 transition-colors">
                                        <!-- Student Info -->
                                        <div class="flex items-center justify-between mb-3">
                                            <div class="flex items-center space-x-3">
                                                <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                                                    <span class="text-red-600 font-medium">{{ substr($submission->user->name, 0, 1) }}</span>
                                                </div>
                                                <div>
                                                    <h4 class="font-medium text-gray-900">{{ $submission->user->name }}</h4>
                                                    <p class="text-xs text-gray-500">{{ $submission->submitted_at->format('d M Y, H:i') }}</p>
                                                </div>
                                            </div>
                                            @if($submission->score)
                                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">{{ $submission->score }}</span>
                                            @endif
                                        </div>
                                        
                                        <!-- Files -->
                                        <div class="mb-3">
                                            <p class="text-xs font-medium text-gray-500 mb-2">Files ({{ count($submission->file_paths) }}):</p>
                                            <div class="grid grid-cols-1 gap-1">
                                                @foreach($submission->file_paths as $filePath)
                                                    <a href="{{ asset('storage/' . $filePath) }}" target="_blank" 
                                                    class="flex items-center space-x-2 text-red-600 hover:text-red-800 text-sm">
                                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                            <path d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm2 2h8v8H6V6z"/>
                                                        </svg>
                                                        <span class="truncate">{{ basename($filePath) }}</span>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        
                                        <!-- Notes -->
                                        @if($submission->notes)
                                            <div class="mb-3">
                                                <p class="text-xs font-medium text-gray-500 mb-1">Catatan:</p>
                                                <p class="text-sm text-gray-700">{{ $submission->notes }}</p>
                                            </div>
                                        @endif
                                        
                                        <!-- Admin Actions -->
                                        @if(in_array($userRoleId, [1, 2]))
                                            <div class="space-y-3 pt-3 border-t border-gray-100">
                                                <!-- Comment Form -->
                                                <form action="{{ route('submissions.comment', $submission->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="space-y-2">
                                                        <label class="text-xs font-medium text-gray-500">Komentar:</label>
                                                        <textarea name="comment" rows="2"
                                                                class="border border-red-300 focus:border-red-500 focus:ring-red-500 rounded-md px-3 py-2 text-sm w-full"
                                                                placeholder="Tulis komentar...">{{ $submission->comment }}</textarea>
                                                        <button type="submit" 
                                                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm font-medium">
                                                            Simpan Komentar
                                                        </button>
                                                    </div>
                                                </form>
                                                
                                                <!-- Score Form -->
                                                <form action="{{ route('submissions.score', $submission->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="flex items-center space-x-2">
                                                        <label class="text-xs font-medium text-gray-500">Nilai:</label>
                                                        <input type="number" name="score" value="{{ $submission->score }}" placeholder="0-100" min="0" max="100" class="border border-gray-300 rounded px-2 py-1 text-sm w-20">
                                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        @else
                                            @if($submission->comment)
                                                <div class="pt-3 border-t border-gray-100">
                                                    <p class="text-xs font-medium text-gray-500 mb-1">Komentar:</p>
                                                    <p class="text-sm text-gray-700">{{ $submission->comment }}</p>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="px-6 py-12 text-center">
                                <div class="w-16 h-16 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <h4 class="text-lg font-medium text-gray-700 mb-2">Belum ada pengumpulan tugas</h4>
                                <p class="text-gray-500 text-sm">Belum ada siswa yang mengumpulkan tugas ini.</p>
                            </div>
                        @endif
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>