<x-app-layout>
    <div class="min-h-screen bg-gradient-to-b from-red-50 to-white">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-red-600 to-red-800 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div>
                        <h1 class="text-3xl font-bold text-white">Edit Materi Pembelajaran</h1>
                        <p class="mt-2 text-red-100">Perbarui konten materi untuk modul: {{ $module->title }}</p>
                    </div>
                    <a href="{{ route('admin.material.admin', ['id' => $module->id]) }}" 
                       class="mt-4 md:mt-0 flex items-center gap-2 bg-white hover:bg-gray-100 text-red-600 py-2 px-4 rounded-lg shadow transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <form action="{{ route('admin.material.update', $material->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <!-- Form Header -->
                    <div class="px-6 py-4 bg-gradient-to-r from-red-50 to-white border-b border-red-100">
                        <h2 class="text-xl font-semibold text-gray-800">Form Edit Materi</h2>
                    </div>
                    
                    <!-- Form Content -->
                    <div class="p-6 space-y-6">
                        <!-- Title Field -->
                        <div class="space-y-2">
                            <label for="title" class="block text-sm font-medium text-gray-700">Judul Materi <span class="text-red-500">*</span></label>
                            <input type="text" id="title" name="title" value="{{ old('title', $material->title) }}" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm @error('title') border-red-500 @enderror">
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description Field -->
                        <div class="space-y-2">
                            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea id="description" name="description" rows="3"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm @error('description') border-red-500 @enderror">{{ old('description', $material->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Type Field -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Jenis Materi <span class="text-red-500">*</span></label>
                            <div class="mt-1 grid grid-cols-1 md:grid-cols-3 gap-3">
                                <label class="flex items-center space-x-3 p-3 border rounded-lg cursor-pointer hover:border-red-300 @if(old('type', $material->type) === 'video') border-red-500 bg-red-50 @else border-gray-300 @endif">
                                    <input type="radio" name="type" value="video" class="h-4 w-4 text-red-600 focus:ring-red-500" 
                                           @checked(old('type', $material->type) === 'video')>
                                    <div class="flex items-center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                        </svg>
                                        <span>Video</span>
                                    </div>
                                </label>
                                
                                <label class="flex items-center space-x-3 p-3 border rounded-lg cursor-pointer hover:border-red-300 @if(old('type', $material->type) === 'dokumen') border-red-500 bg-red-50 @else border-gray-300 @endif">
                                    <input type="radio" name="type" value="dokumen" class="h-4 w-4 text-red-600 focus:ring-red-500" 
                                           @checked(old('type', $material->type) === 'dokumen')>
                                    <div class="flex items-center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <span>Dokumen</span>
                                    </div>
                                </label>
                                
                                <label class="flex items-center space-x-3 p-3 border rounded-lg cursor-pointer hover:border-red-300 @if(old('type', $material->type) === 'tugas') border-red-500 bg-red-50 @else border-gray-300 @endif">
                                    <input type="radio" name="type" value="tugas" class="h-4 w-4 text-red-600 focus:ring-red-500" 
                                           @checked(old('type', $material->type) === 'tugas')>
                                    <div class="flex items-center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                        <span>Tugas</span>
                                    </div>
                                </label>
                            </div>
                            @error('type')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- File Upload Field -->
                        <div class="space-y-2">
                            <label for="file" class="block text-sm font-medium text-gray-700">File Materi</label>
                            <div class="mt-1 flex flex-col sm:flex-row items-start sm:items-center gap-4">
                                @if($material->file_path)
                                    <div class="flex-shrink-0">
                                        <div class="h-24 w-24 rounded-lg bg-gradient-to-br from-red-100 to-white flex items-center justify-center overflow-hidden border border-gray-200">
                                            @if($material->type === 'video')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                                </svg>
                                            @elseif($material->type === 'dokumen')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                                </svg>
                                            @endif
                                        </div>
                                        <p class="mt-1 text-xs text-gray-500 truncate max-w-xs">{{ basename($material->file_path) }}</p>
                                    </div>
                                @endif
                                <div class="flex-1">
                                    <input type="file" id="file" name="file" 
                                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100">
                                    <p class="mt-1 text-sm text-gray-500">Biarkan kosong jika tidak ingin mengganti file.</p>
                                    @error('file')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Form Footer -->
                    <div class="px-6 py-4 bg-gray-50 flex justify-between items-center border-t border-gray-200">
                        <div class="flex space-x-3">
                            <button type="reset" 
                                    class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Reset
                            </button>
                            <button type="submit" 
                                    class="inline-flex items-center px-6 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>