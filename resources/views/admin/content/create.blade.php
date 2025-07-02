<x-admin-layout>
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Tambah Konten Baru</h1>
                <p class="mt-2 text-gray-600">Isi form berikut untuk menambahkan konten pembelajaran baru</p>
            </div>
            <a href="{{ route('admin.content.index') }}" 
               class="flex items-center gap-2 bg-gray-200 hover:bg-gray-300 text-gray-800 py-3 px-6 rounded-lg shadow transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Kembali ke Daftar
            </a>
        </div>

        <!-- Form Section -->
        <div class="bg-white shadow-xl rounded-xl overflow-hidden">
            <form action="{{ route('admin.content.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-6 space-y-6">
                    <!-- Name Field -->
                    <div class="space-y-2">
                        <label for="name" class="block text-sm font-medium text-gray-700">Judul Konten</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description Field -->
                    <div class="space-y-2">
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea id="description" name="description" rows="4" 
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Field -->
                    <div class="space-y-2">
                        <label for="image" class="block text-sm font-medium text-gray-700">Gambar Thumbnail</label>
                        <div class="mt-1 flex items-center">
                            <input type="file" id="image" name="image" 
                                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100">
                        </div>
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                                        <!-- Status Field -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <div class="mt-1 space-y-2">
                            <div class="flex items-center">
                                <input id="status-active" name="status" type="radio" value="1" 
                                    class="focus:ring-red-500 h-4 w-4 text-red-600 border-gray-300"
                                    {{ old('status', $content->status ?? 1) == 1 ? 'checked' : '' }}>
                                <label for="status-active" class="ml-3 block text-sm font-medium text-gray-700">
                                    Active
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="status-inactive" name="status" type="radio" value="0" 
                                    class="focus:ring-red-500 h-4 w-4 text-red-600 border-gray-300"
                                    {{ old('status', $content->status ?? 1) == 0 ? 'checked' : '' }}>
                                <label for="status-inactive" class="ml-3 block text-sm font-medium text-gray-700">
                                    Inactive
                                </label>
                            </div>
                        </div>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>


                    <!-- Schedule Field -->
                    <div class="space-y-2">
                        <label for="schedule" class="block text-sm font-medium text-gray-700">Jadwal</label>
                        <input type="text" id="schedule" name="schedule" value="{{ old('schedule') }}" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm @error('schedule') border-red-500 @enderror" 
                               placeholder="Contoh: Senin & Kamis, 19:00 - 21:00">
                        @error('schedule')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Link Field -->
                    <div class="space-y-2">
                        <label for="link" class="block text-sm font-medium text-gray-700">Link Kelas</label>
                        <input type="url" id="link" name="link" value="{{ old('link') }}" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm @error('link') border-red-500 @enderror" 
                               placeholder="https://example.com/kelas">
                        @error('link')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Form Footer -->
                <div class="px-6 py-4 bg-gray-50 flex justify-end space-x-4">
                    <button type="reset" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Reset
                    </button>
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Simpan Konten
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>