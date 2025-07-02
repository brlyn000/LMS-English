<x-app-layout>
    <div class="min-h-screen bg-gradient-to-b from-red-50 to-white py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800">Tambah Materi Baru</h1>
                        <p class="mt-2 text-gray-600">Untuk modul: <span class="font-medium text-red-600">{{ $module->title }}</span></p>
                    </div>
                    <a href="{{ url()->previous() }}" class="flex items-center gap-2 text-gray-600 hover:text-gray-900 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>
                </div>
                <div class="mt-4 border-t border-gray-200"></div>
            </div>

            <!-- Form -->
            <div class="bg-white shadow-xl rounded-xl overflow-hidden">
                <form action="{{ route('admin.material.store', $module->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                    @csrf

                    <!-- Judul -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Judul Materi <span class="text-red-500">*</span></label>
                        <input type="text" name="title" id="title" required value="{{ old('title') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm @error('title') border-red-500 @enderror"
                               placeholder="Contoh: Pengenalan Dasar Pemrograman">
                        @error('title')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jenis Materi -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Materi <span class="text-red-500">*</span></label>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @foreach (['Dokumen' => 'Dokumen', 'Video' => 'Video', 'Tugas' => 'Tugas'] as $value => $label)
                                <label for="type_{{ $value }}" class="flex items-center space-x-3 p-4 border rounded-lg cursor-pointer hover:border-red-300 transition-colors @error('type') border-red-500 @enderror">
                                    <input type="radio" name="type" id="type_{{ $value }}" value="{{ $value }}" class="h-5 w-5 text-red-600 focus:ring-red-500"
                                           {{ old('type', 'Dokumen') === $value ? 'checked' : '' }}>
                                    <div>
                                        <div class="flex items-center">
                                            @if ($value === 'Dokumen')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M7 7h10M7 11h10M7 15h10M5 5v14a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2z" />
                                                </svg>
                                            @elseif ($value === 'Video')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14m-6 1h.01M6 16V8a2 2 0 012-2h8a2 2 0 012 2v8a2 2 0 01-2 2H8a2 2 0 01-2-2z" />
                                                </svg>
                                            @elseif ($value === 'Tugas')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M9 12l2 2l4-4M7 7h10M7 17h10M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z" />
                                                </svg>
                                            @endif
                                            <span class="font-medium text-gray-900 ml-2">{{ $label }}</span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">
                                            @if ($value === 'Dokumen') PDF, PPT, DOC, XLS
                                            @elseif ($value === 'Video') MP4 atau link YouTube
                                            @else Instruksi tugas & template
                                            @endif
                                        </p>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                        @error('type')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Materi</label>
                        <textarea id="description" name="description" rows="3" placeholder="Deskripsi singkat tentang materi ini"
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Upload File -->
                    <div>
                        <label for="file" class="block text-sm font-medium text-gray-700">File Materi <span class="text-red-500">*</span></label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-dashed rounded-md @error('file') border-red-500 border @enderror">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                </svg>
                                <div class="flex text-sm text-gray-600 justify-center">
                                    <label for="file" class="relative cursor-pointer bg-white rounded-md font-medium text-red-600 hover:text-red-500">
                                        <span>Upload file</span>
                                        <input id="file" name="file" type="file" required
                                               class="sr-only" accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.mp4">
                                    </label>
                                    <p class="pl-1">atau drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PDF, Word, Excel, PPT, MP4 (max 10MB)</p>
                            </div>
                        </div>
                        @error('file')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Program Studi -->
                     <div class="space-y-2">
                        <label for="class_prodi_id" class="block text-sm font-medium text-gray-700">
                            Program Studi <span class="text-red-500">*</span>
                        </label>
                        <select id="class_prodi_id" name="class_prodi_id" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm @error('class_prodi_id') border-red-500 @enderror">
                            <option value="">-- Pilih Program Studi --</option>
                            <option value="1" {{ old('class_prodi_id') == 1 ? 'selected' : '' }}>Teknologi Informasi</option>
                            <option value="2" {{ old('class_prodi_id') == 2 ? 'selected' : '' }}>Teknologi Mesin</option>
                            <option value="3" {{ old('class_prodi_id') == 3 ? 'selected' : '' }}>Akuntansi</option>
                            <option value="4" {{ old('class_prodi_id') == 4 ? 'selected' : '' }}>Administrasi Perkantoran</option>
                        </select>
                        @error('class_prodi_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Link Eksternal -->
                    <div>
                        <label for="external_url" class="block text-sm font-medium text-gray-700">Link Eksternal (Opsional)</label>
                        <input type="url" name="external_url" id="external_url" placeholder="https://youtube.com/example"
                               value="{{ old('external_url') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm @error('external_url') border-red-500 @enderror">
                        @error('external_url')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-xs text-gray-500">Gunakan untuk link YouTube atau referensi lainnya</p>
                    </div>

                    <!-- Tombol -->
                    <div class="flex justify-end pt-6 border-t border-gray-200">
                        <button type="reset" class="mr-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:ring-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Reset
                        </button>
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:ring-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            Simpan Materi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
