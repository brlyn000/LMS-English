<x-admin-layout>
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Edit Konten</h1>
                <p class="text-sm text-gray-600">Perbarui informasi konten pembelajaran di bawah ini.</p>
            </div>
            <a href="{{ route('admin.content.index') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 text-sm rounded hover:bg-gray-300">
                &larr; Kembali ke Daftar
            </a>
        </div>

        <!-- Form -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('admin.content.update', $content->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Judul -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Judul Konten</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $content->name) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
                    @error('name') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Deskripsi -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="description" id="description" rows="4"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">{{ old('description', $content->description) }}</textarea>
                    @error('description') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Gambar -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Thumbnail Saat Ini</label>
                    @if ($content->image)
                        <img src="{{ asset('storage/' . $content->image) }}" alt="Thumbnail"
                             class="w-40 h-auto rounded-md mt-2 mb-4 shadow">
                    @else
                        <p class="text-gray-500">Tidak ada gambar.</p>
                    @endif

                    <label for="image" class="block text-sm font-medium text-gray-700">Upload Gambar Baru</label>
                    <input type="file" name="image" id="image"
                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                               file:rounded file:border-0 file:text-sm file:font-semibold
                               file:bg-red-50 file:text-red-700 hover:file:bg-red-100">
                    @error('image') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Jadwal -->
                <div class="mb-4">
                    <label for="schedule" class="block text-sm font-medium text-gray-700">Jadwal</label>
                    <input type="text" name="schedule" id="schedule" value="{{ old('schedule', $content->schedule) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500"
                        placeholder="Contoh: Senin & Rabu, 19:00 - 21:00">
                    @error('schedule') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Link -->
                <div class="mb-4">
                    <label for="link" class="block text-sm font-medium text-gray-700">Link Kelas</label>
                    <input type="url" name="link" id="link" value="{{ old('link', $content->link) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500"
                        placeholder="https://example.com/kelas">
                    @error('link') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Status -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <div class="mt-2 space-y-2">
                        <label class="flex items-center">
                            <input type="radio" name="status" value="1" {{ old('status', $content->status) == 1 ? 'checked' : '' }}
                                class="text-red-600 focus:ring-red-500 border-gray-300">
                            <span class="ml-2 text-sm">Active</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="status" value="0" {{ old('status', $content->status) == 0 ? 'checked' : '' }}
                                class="text-red-600 focus:ring-red-500 border-gray-300">
                            <span class="ml-2 text-sm">Inactive</span>
                        </label>
                    </div>
                    @error('status') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Tombol Simpan -->
                <div class="flex justify-end space-x-4 mt-6">
                    <a href="{{ route('admin.content.index') }}"
                       class="px-4 py-2 bg-gray-200 text-sm text-gray-700 rounded hover:bg-gray-300">Batal</a>
                    <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white text-sm rounded hover:bg-red-700 focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
