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
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <!-- Material Content -->
                <div class="p-6 sm:p-8 lg:p-12">
                    @if($material->type === 'Video')
                        <!-- Video Player -->
                        <div class="relative pb-[56.25%] h-0 rounded-xl overflow-hidden bg-black mb-8">
                            <video controls class="absolute top-0 left-0 w-full h-full">
                                <source src="{{ asset('storage/' . $material->file_path) }}" type="video/mp4">
                                Browser Anda tidak mendukung pemutaran video.
                            </video>
                            <div class="absolute inset-0 flex items-center justify-center">
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
                                <!-- File Submission -->
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 bg-red-100 p-3 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">File Submission</p>
                                        <a href="{{ asset('storage/' . $mySubmission->file_path) }}" target="_blank" 
                                        class="inline-flex items-center text-red-600 hover:text-red-800 font-medium group">
                                            {{ basename($mySubmission->file_path) }}
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                            </svg>
                                        </a>
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
                            
                            <!-- Delete Button -->
                            <form action="{{ route('submissions.destroy', $mySubmission->id) }}" method="POST" 
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus tugas ini? Tugas yang sudah dihapus tidak dapat dikembalikan.')"
                                class="mt-6 pt-4 border-t border-gray-100">
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
                        </div>
                    </div>
                @else
                @if($material->type === 'Tugas')
                    <form action="{{ route('submissions.store', $material->id) }}" method="POST" enctype="multipart/form-data" class="mt-8 space-y-6">
                        @csrf
                        
                        <!-- File Upload Card -->
                        <div class="space-y-2">
                            <label for="file" class="block text-sm font-medium text-gray-700 mb-2">Upload File Tugas</label>
                            
                            <div class="relative group">
                                <div class="absolute -inset-0.5 bg-gradient-to-r from-red-500 to-red-700 rounded-lg blur opacity-25 group-hover:opacity-50 transition duration-300"></div>
                                
                                <div class="relative bg-white rounded-lg border-2 border-dashed border-gray-300 hover:border-red-400 transition-colors duration-300">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6 px-4" id="drop-area">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-red-500 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500">
                                            <span class="font-semibold">Klik untuk upload</span> atau drag & drop file
                                        </p>
                                        <p class="text-xs text-gray-400">Format: PDF, DOCX, PPTX, JPG, PNG (Maks. 10MB)</p>
                                        <input type="file" name="file" id="file" required 
                                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                            onchange="displayFileName(this)">
                                    </div>
                                </div>
                            </div>
                            
                            <div id="file-name" class="text-sm text-gray-600 mt-2 hidden">
                                <span class="font-medium">File dipilih:</span> <span id="name-display"></span>
                                <button type="button" onclick="clearFileInput()" class="ml-2 text-red-500 hover:text-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
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
                    // Display selected file name
                    function displayFileName(input) {
                        const fileNameDisplay = document.getElementById('name-display');
                        const fileInfo = document.getElementById('file-name');
                        
                        if (input.files.length > 0) {
                            fileNameDisplay.textContent = input.files[0].name;
                            fileInfo.classList.remove('hidden');
                        } else {
                            fileInfo.classList.add('hidden');
                        }
                    }

                    // Clear file input
                    function clearFileInput() {
                        const fileInput = document.getElementById('file');
                        const fileInfo = document.getElementById('file-name');
                        
                        fileInput.value = '';
                        fileInfo.classList.add('hidden');
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
                        dropArea.parentElement.classList.add('border-red-500');
                    }

                    function unhighlight() {
                        dropArea.parentElement.classList.remove('border-red-500');
                    }

                    dropArea.addEventListener('drop', handleDrop, false);

                    function handleDrop(e) {
                        const dt = e.dataTransfer;
                        const files = dt.files;
                        const fileInput = document.getElementById('file');
                        
                        fileInput.files = files;
                        displayFileName(fileInput);
                    }
                </script>
                @endif
                @php
                    $userRoleId = Auth::user()->roles->first()->id ?? null;
                @endphp

                @if(in_array($userRoleId, [1, 2]))
                    <div class="mt-10 bg-white shadow-lg rounded-lg overflow-hidden border border-red-100">
                        <div class="bg-red-600 px-6 py-4">
                            <h3 class="text-lg font-bold text-white">Daftar Pengumpulan Tugas</h3>
                        </div>

                        @if($material->submissions->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-red-200">
                                    <thead class="bg-red-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-bold text-red-700 uppercase tracking-wider">No</th>
                                            <th class="px-6 py-3 text-left text-xs font-bold text-red-700 uppercase tracking-wider">Nama</th>
                                            <th class="px-6 py-3 text-left text-xs font-bold text-red-700 uppercase tracking-wider">File</th>
                                            <th class="px-6 py-3 text-left text-xs font-bold text-red-700 uppercase tracking-wider">Waktu</th>
                                            <th class="px-6 py-3 text-left text-xs font-bold text-red-700 uppercase tracking-wider">Catatan</th>
                                            <th class="px-6 py-3 text-left text-xs font-bold text-red-700 uppercase tracking-wider">Komentar</th>
                                            <th class="px-6 py-3 text-left text-xs font-bold text-red-700 uppercase tracking-wider">Nilai</th>

                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-red-100">
                                        @foreach($material->submissions as $index => $submission)
                                            <tr class="hover:bg-red-50 transition-colors duration-150">
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-gray-600">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                                                    {{ $submission->user->name }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <a href="{{ asset('storage/' . $submission->file_path) }}" target="_blank" 
                                                    class="text-red-600 hover:text-red-800 underline font-medium">
                                                        {{ basename($submission->file_path) }}
                                                    </a>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-gray-600">
                                                    {{ $submission->submitted_at->format('d M Y H:i') }}
                                                </td>
                                                <td class="px-6 py-4 text-gray-600">
                                                    {{ $submission->notes ?? '-' }}
                                                </td>
                                                @if(in_array($userRoleId, [1, 2]))
                                                    <td class="px-6 py-4 w-1/4">
                                                        <form action="{{ route('submissions.comment', $submission->id) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="flex flex-col space-y-2">
                                                                <textarea name="comment" rows="3"
                                                                        class="border border-red-300 focus:border-red-500 focus:ring-red-500 rounded-md px-3 py-2 text-sm w-full"
                                                                        placeholder="Tulis komentar lengkap disini...">{{ $submission->comment }}</textarea>
                                                                <button type="submit" 
                                                                        class="self-end bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                                                                    Simpan Komentar
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </td>
                                                    {{-- Input Nilai --}}
                                                    <td class="px-4 py-2">
                                                        <form action="{{ route('submissions.score', $submission->id) }}" method="POST" class="flex items-center space-x-2">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="number" name="score" value="{{ $submission->score }}" placeholder="0-100" min="0" max="100" class="border border-gray-300 rounded px-2 py-1 text-sm w-20">
                                                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm">OK</button>
                                                        </form>
                                                    </td>
                                                @else
                                                    <td class="px-6 py-4 text-gray-600">
                                                        {{ $submission->comment ?? '-' }}
                                                    </td>
                                                    <td class="px-4 py-2 text-gray-600">{{ $submission->score ?? '-' }}</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="px-6 py-8 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <h4 class="mt-3 text-lg font-medium text-gray-700">Belum ada pengumpulan tugas</h4>
                                <p class="mt-1 text-gray-500">Belum ada siswa yang mengumpulkan tugas ini.</p>
                            </div>
                        @endif
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>