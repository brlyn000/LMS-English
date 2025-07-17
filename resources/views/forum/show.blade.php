<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 py-8 ">
        <!-- Thread Detail Card -->
        <!-- Breadcrumb -->
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
                <a href="{{ route('forum.index') }}" class="inline-flex items-center text-sm font-medium text-red-700 hover:text-gray-600 ">
                <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                    Forum
                </a>
            </li>
            <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">{{ $thread->title }}</span>
            </div>
            </li>
        </ol>
        </nav>
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 mb-8">
            <!-- Gradient Header -->
            <div class="bg-gradient-to-r from-red-50 to-white p-6 border-b border-gray-100">
                <div class="flex flex-wrap items-center gap-2 mb-3">
                    <span class="px-3 py-1 bg-red-100 text-red-600 text-xs font-semibold rounded-full">
                        {{ $thread->category ?? 'Tanpa Kategori' }}
                    </span>
                    <span class="px-3 py-1 bg-gray-100 text-gray-600 text-xs font-semibold rounded-full">
                        {{ $thread->programStudi->nama_prodi ?? 'Tidak diketahui' }}
                    </span>
                </div>
                
                <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $thread->title }}</h1>
                
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-red-100 to-white flex items-center justify-center">
                        <span class="text-sm font-bold text-red-600">{{ substr($thread->user->name, 0, 1) }}</span>
                    </div>
                    <div>
                        <p class="text-sm text-gray-700 font-medium">{{ $thread->user->name }}</p>
                        <p class="text-xs text-gray-500">{{ $thread->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>

            <!-- Thread Content -->
            <div class="p-6">
                @if ($thread->image)
                    <div class="mb-6 rounded-xl overflow-hidden shadow-sm">
                        <img src="{{ asset('storage/' . $thread->image) }}" alt="Cover Thread" 
                             class="w-full h-auto object-cover hover:scale-[1.01] transition-transform duration-300">
                    </div>
                @endif

                <div class="prose max-w-none text-gray-700">
                    {!! nl2br(e($thread->body)) !!}
                </div>
            </div>

            <!-- Thread Footer -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <div class="flex items-center text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        <span class="text-sm">{{ $thread->replies->count() }} Balasan</span>
                    </div>
                </div>
                
                <button onclick="openReplyModal()" 
                        class="px-4 py-2 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg shadow-md hover:shadow-lg transition-all flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Tambah Balasan
                </button>
            </div>
        </div>

        <!-- Replies Section -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
            <div class="bg-gradient-to-r from-red-50 to-white p-6 border-b border-gray-100">
                <h2 class="text-2xl font-bold text-gray-800">Diskusi <span class="text-red-600">({{ $thread->replies->count() }})</span></h2>
            </div>
            <form method="GET" class="mb-6 mx-10">
                <div class="flex flex-col sm:flex-row gap-3">
                    <!-- Search by Sender -->
                    <div class="flex-1 relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari nama pengirim..."
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500">
                    </div>
                    
                    <!-- Search by Subject -->
                    <div class="flex-1 relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                        <input type="text" name="subject" value="{{ request('subject') }}"
                            placeholder="Cari subject..."
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500">
                    </div>
                    
                    <!-- Search Button -->
                    <button type="submit"
                            class="px-4 py-2 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg shadow hover:shadow-md transition flex items-center justify-center sm:w-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Cari
                    </button>
                </div>
            </form>


            <div class="divide-y divide-gray-100">
                @forelse ($replies as $reply)
                    <div class="p-6 hover:bg-gray-50 transition-colors duration-150">
                        <div class="flex gap-4">
                            <!-- User Avatar -->
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-red-100 to-white flex items-center justify-center shadow-sm">
                                    <span class="text-sm font-bold text-red-600">{{ substr($reply->user->name, 0, 1) }}</span>
                                </div>
                            </div>
                            
                            <!-- Reply Content -->
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-1">
                                    <div class="flex items-center gap-3">
                                        <p class="font-medium text-gray-800">{{ $reply->user->name }}</p>
                                        <span class="text-xs text-gray-500">{{ $reply->created_at->diffForHumans() }}</span>
                                    </div>

                                    @if(auth()->id() === $reply->user_id || auth()->user()->roles->pluck('id')->intersect([1, 2])->isNotEmpty())
                                        <div class="flex items-center gap-3 text-sm">
                                            <a href="{{ route('replies.edit', $reply->id) }}" class="text-blue-600 hover:underline flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Edit
                                            </a>
                                            <form action="{{ route('replies.destroy', $reply->id) }}" method="POST" onsubmit="return confirm('Hapus balasan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-600 hover:underline flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                                
                                @if($reply->subject)
                                    <h3 class="text-lg font-semibold text-red-600 mb-1">{{ $reply->subject }}</h3>
                                @endif
                                
                                @if($reply->deskripsi)
                                    <p class="text-gray-600 mb-2 italic">{{ $reply->deskripsi }}</p>
                                @endif
                                
                                <p class="text-gray-700 mb-3">{{ $reply->body }}</p>
                                
                                @if($reply->image)
                                    <div class="mt-3 rounded-lg overflow-hidden border border-gray-200 max-w-xs">
                                        <img src="{{ asset('storage/' . $reply->image) }}" alt="Gambar balasan" 
                                            class="w-full h-auto hover:scale-[1.02] transition-transform duration-300 cursor-zoom-in">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-8 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-gray-700">Belum ada komentar</h3>
                        <p class="mt-1 text-gray-500">Jadilah yang pertama memberikan tanggapan</p>
                        <button onclick="openReplyModal()" 
                                class="mt-4 px-4 py-2 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg shadow hover:shadow-md transition">
                            Tambah Balasan
                        </button>
                    </div>
                @endforelse
            </div>

        </div>
    </div>

    <!-- Reply Modal -->
    <div id="replyModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Modal Content -->
            <div class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-gradient-to-r from-red-600 to-red-700 px-6 py-4">
                    <h3 class="text-lg font-bold text-white">Tambah Balasan</h3>
                </div>
                
                <form action="{{ route('replies.store', $thread) }}" method="POST" enctype="multipart/form-data" class="p-6">
                    @csrf
                    
                    <div class="space-y-4">
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subjek</label>
                            <input type="text" name="subject" id="subject" placeholder="Judul balasan (opsional)"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500">
                        </div>
                        
                        <div>
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                            <textarea name="deskripsi" id="noPasteInput" rows="3" placeholder="Deskripsi singkat (opsional)"
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500"></textarea>
                        </div>
                        
                        
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Upload Gambar (Opsional)</label>
                            <div class="mt-1 flex items-center">
                                <label for="image" class="cursor-pointer">
                                    <div class="flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        Pilih Gambar
                                    </div>
                                    <input id="image" name="image" type="file" class="sr-only">
                                </label>
                                <span id="file-name" class="ml-3 text-sm text-gray-500">Tidak ada file dipilih</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6 flex justify-end space-x-3">
                        <button type="button" onclick="closeReplyModal()"
                                class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50">
                            Batal
                        </button>
                        <button type="submit"
                                class="px-4 py-2 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg shadow hover:shadow-md transition">
                            Kirim Balasan
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
        </div>
    </div>

    <script>
        // Modal functions
        function openReplyModal() {
            document.getElementById('replyModal').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }
        
        function closeReplyModal() {
            document.getElementById('replyModal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
        
        // File name display
        document.getElementById('image').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'Tidak ada file dipilih';
            document.getElementById('file-name').textContent = fileName;
        });
        
        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('replyModal');
            if (event.target === modal) {
                closeReplyModal();
            }
        }

        // No paste Input
        document.getElementById('noPasteInput').addEventListener('paste', function(e) {
            e.preventDefault();
        document.getElementById('pasteModal').style.display = 'block';
        });
    </script>
</x-app-layout>