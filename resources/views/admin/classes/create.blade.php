<x-layouts-admin>
    <div class="min-h-screen bg-gray-50 p-6">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Tambah Modul Baru</h1>
                    <p class="mt-2 text-gray-600">Isi form berikut untuk menambahkan modul pembelajaran baru</p>
                </div>
                <a href="{{ route('admin.module.index') }}" 
                   class="flex items-center gap-2 bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <!-- Form Section -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <form action="{{ route('admin.module.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-6 space-y-6">
                    <!-- Program Studi Field -->
                    <div class="space-y-2">
                        <label for="prodi" class="block text-sm font-medium text-gray-700">Program Studi</label>
                        <select id="program_studi" name="program_studi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm @error('program_studi') border-red-500 @enderror">
                            <option value="">Pilih Program Studi</option>
                            <option value="TI" {{ old('program_studi') == 'TI' ? 'selected' : '' }}>Teknologi Informasi</option>
                            <option value="TM" {{ old('program_studi') == 'TM' ? 'selected' : '' }}>Teknik Mesin</option>
                            <option value="AK" {{ old('program_studi') == 'AK' ? 'selected' : '' }}>Akuntansi</option>
                            <option value="AP" {{ old('program_studi') == 'AP' ? 'selected' : '' }}>Administrasi Perkantoran</option>
                        </select>
                        @error('program_studi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Title Field -->
                    <div class="space-y-2">
                        <label for="title" class="block text-sm font-medium text-gray-700">Judul Modul</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm @error('title') border-red-500 @enderror" 
                               placeholder="Contoh: Pengenalan Pemrograman Dasar">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description Field -->
                    <div class="space-y-2">
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea id="description" name="description" rows="4" 
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm @error('description') border-red-500 @enderror" 
                                  placeholder="Deskripsi singkat tentang modul ini">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Gambar Modul Upload -->
                    <div class="space-y-2">
                        <label for="image_path" class="block text-sm font-medium text-gray-700">Gambar Modul</label>
                        <div class="mt-1 flex items-center">
                            <input type="file" id="image_path" name="image_path" 
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100">
                        </div>
                        <p class="mt-1 text-sm text-gray-500">Format: JPG, PNG, JPEG (Maks: 2MB)</p>
                        @error('image_path')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Form Footer -->
                <div class="px-6 py-4 bg-gray-50 flex justify-between items-center">
                    <button type="reset" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Reset Form
                    </button>
                    <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Simpan Modul
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts-admin>