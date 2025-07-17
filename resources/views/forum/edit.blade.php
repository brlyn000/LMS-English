<x-app-layout>
    <div class="max-w-3xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Thread</h1>

        <form action="{{ route('forum.update', $thread->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="title" id="title" required value="{{ old('title', $thread->title) }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-red-500 focus:border-red-500">
            </div>

            <!-- Body -->
            <div>
                <label for="body" class="block text-sm font-medium text-gray-700">Isi Thread</label>
                <textarea name="body" id="body" rows="6" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-red-500 focus:border-red-500">{{ old('body', $thread->body) }}</textarea>
            </div>

            <!-- Category -->
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="category" id="category" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-red-500 focus:border-red-500">
                    <option value="">Pilih Kategori</option>
                    <option value="Teknologi" {{ $thread->category == 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
                    <option value="Pendidikan" {{ $thread->category == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                    <option value="Umum" {{ $thread->category == 'Umum' ? 'selected' : '' }}>Umum</option>
                </select>
            </div>

            <!-- Image Upload -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Gambar</label>
                @if($thread->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $thread->image) }}" alt="Current Image" class="h-32 rounded border">
                    </div>
                @endif
                <input type="file" name="image" accept="image/*"
                    class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:border file:rounded-md file:text-sm file:bg-red-50 file:text-red-700 hover:file:bg-red-100">
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="inline-flex items-center px-6 py-3 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
