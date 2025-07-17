<x-app-layout>
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Edit Balasan</h1>

        <form action="{{ route('replies.update', $reply->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Subject -->
            <div>
                <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subjek</label>
                <input type="text" name="subject" id="subject" value="{{ old('subject', $reply->subject) }}"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500">
                @error('subject')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="5"
                          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500">{{ old('deskripsi', $reply->deskripsi) }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Gambar -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Gambar (opsional)</label>
                <input type="file" name="image" id="image"
                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100"/>

                @if ($reply->image)
                    <div class="mt-3">
                        <p class="text-sm text-gray-600 mb-1">Gambar saat ini:</p>
                        <img src="{{ asset('storage/' . $reply->image) }}" alt="Gambar Balasan" class="w-48 rounded shadow">
                    </div>
                @endif

                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit -->
            <div class="flex justify-between items-center">
                <a href="{{ route('forum.show', $reply->thread_id) }}"
                   class="text-sm text-gray-600 hover:text-gray-800">← Kembali ke diskusi</a>
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg shadow font-semibold">
                    Simpan Perubahan
                </button>
            </div>
        </form>
        <!-- Modal -->
        <div id="pasteModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(0,0,0,0.5); z-index:999; font-family:Arial, sans-serif;">
            <div style="background:white; padding:25px; max-width:320px; margin:100px auto; border-radius:10px; text-align:center; box-shadow:0 4px 8px rgba(0,0,0,0.1);">
                <!-- Icon Warning (Font Awesome) -->
                <div style="font-size:48px; color:#d32f2f; margin-bottom:15px;">
                    ⚠️
                    <!-- Jika menggunakan Font Awesome, ganti dengan: -->
                    <!-- <i class="fas fa-exclamation-triangle"></i> -->
                </div>
                <h3 style="color:#d32f2f; margin:0 0 10px;">Peringatan!</h3>
                <p style="color:#555; margin-bottom:20px;">Paste tidak diperbolehkan di kolom ini.</p>
                <button onclick="document.getElementById('pasteModal').style.display='none'" 
                        style="background:#d32f2f; color:white; border:none; padding:8px 20px; border-radius:5px; cursor:pointer; font-size:14px; transition:background 0.3s;"
                        onmouseover="this.style.background='#b71c1c'" 
                        onmouseout="this.style.background='#d32f2f'">
                    Tutup
                </button>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('deskripsi').addEventListener('paste', function(e) {
            e.preventDefault();
            document.getElementById('pasteModal').style.display = 'block';
        });
    </script>
</x-app-layout>
