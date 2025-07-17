<x-app-layout>
    <!-- Floating Create Button (Mobile Only) -->
    <div class="lg:hidden fixed bottom-6 right-6 z-50">
        <a href="{{ route('forum.create') }}" class="w-14 h-14 bg-red-600 rounded-full shadow-xl flex items-center justify-center hover:bg-red-700 transition-transform hover:scale-110">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
        </a>
    </div>


    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Hero Header -->
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
            <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Forum</span>
            </div>
            </li>
        </ol>
        </nav>
        <div class="bg-gradient-to-r from-red-50 to-white rounded-2xl p-6 md:p-8 mb-8 shadow-inner border border-red-100">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                <div class="mb-4 md:mb-0">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800">Forum Diskusi</h1>
                    <p class="text-red-600 mt-2">Temukan inspirasi dan berbagi pengetahuan bersama komunitas</p>
                </div>
                    @php
                        $user = auth()->user();
                    @endphp

                    @if($user && $user->roles->pluck('id')->contains(function ($id) {
                        return in_array($id, [1, 2]);
                    }))
                        <div class="hidden lg:block">
                            <a href="{{ route('forum.create') }}" class="px-6 py-3 bg-red-600 text-white rounded-xl hover:bg-red-700 transition-all shadow-lg hover:shadow-xl flex items-center group">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:rotate-90 transition-transform" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                                Buat Thread Baru
                            </a>
                        </div>
                    @endif
            </div>
            
            <!-- Search and Filter (Desktop) -->
            <div class="hidden md:flex mt-6 space-x-4">
                <form method="GET" action="{{ route('forum.index') }}" class="relative flex-grow max-w-md">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari thread..."
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute left-3 top-2.5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </form>

                <form method="GET" class="mb-6">
                    <select name="category" onchange="this.form.submit()"
                            class="border border-gray-300 rounded-xl px-10 py-2 focus:ring-2 focus:ring-red-500 focus:border-red-500">
                        <option value="">Semua Kategori</option>
                        <option value="Teknologi" {{ request('category') == 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
                        <option value="Pendidikan" {{ request('category') == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                        <option value="Umum" {{ request('category') == 'Umum' ? 'selected' : '' }}>Umum</option>
                    </select>
                </form>
            </div>
            
            <!-- Mobile Search (Hidden on Desktop) -->
            <div class="md:hidden mt-4">
                <div class="relative">
                    <input type="text" placeholder="Cari thread..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute left-3 top-2.5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-lg flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        <!-- Thread List -->
        <div class="space-y-6">
            @forelse($threads as $thread)
                <div class="bg-white rounded-2xl shadow-[0_4px_12px_rgba(0,0,0,0.05)] hover:shadow-[0_8px_24px_rgba(0,0,0,0.1)] transition-all duration-300 overflow-hidden border border-gray-100 group">
                    <div class="flex flex-col md:flex-row">
                        <!-- Thread Image -->
                        <div class="md:w-1/4 lg:w-1/5 h-48 md:h-auto relative overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-red-50 to-white flex items-center justify-center">
                                <img src="{{ asset('storage/' . $thread->image) }}" alt="Thread cover" 
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            </div>
                            <!-- Mobile Author Badge -->
                            <div class="md:hidden absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1.5 rounded-full shadow-sm">
                                <div class="flex items-center">
                                    <div class="w-6 h-6 rounded-full bg-red-100 flex items-center justify-center mr-2">
                                        <span class="text-xs font-bold text-red-600">{{ substr($thread->user->name, 0, 1) }}</span>
                                    </div>
                                    <span class="text-sm font-medium text-gray-800">{{ $thread->user->name }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Thread Content -->
                        <div class="md:w-3/4 lg:w-4/5 p-6 md:p-7">
                            <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-4">
                                <div class="flex-1">
                                    <!-- Category and Metadata -->
                                    <div class="flex items-center gap-3 mb-3">
                                        <span class="inline-block px-2.5 py-1 bg-red-50 text-red-600 text-xs font-semibold rounded-full tracking-wide">
                                            {{ $thread->category ?? 'General' }}
                                        </span>
                                        <span class="text-xs text-gray-500 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            {{ $thread->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                    
                                    <!-- Title -->
                                    <h2 class="text-xl md:text-2xl font-bold text-gray-900 group-hover:text-red-600 transition-colors duration-300">
                                        <a href="{{ route('forum.show', $thread->id) }}" class="line-clamp-2">
                                            {{ $thread->title }}
                                        </a>
                                    </h2>
                                    
                                    <!-- Excerpt -->
                                    <p class="text-gray-600 mt-3 line-clamp-2">
                                        {{ Str::limit(strip_tags($thread->body), 200, '...') }}
                                    </p>
                                </div>
                                
                                <!-- Desktop Author -->
                                <div class="hidden md:flex flex-col items-end">
                                    <div class="flex items-center gap-2">
                                        <div class="text-right">
                                            <p class="text-sm font-medium text-gray-900">{{ $thread->user->name }}</p>
                                            <p class="text-xs text-gray-500">{{ $thread->user->roles->first()->name ?? 'Member' }}</p>
                                        </div>
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-red-100 to-white flex items-center justify-center shadow-sm">
                                            <span class="text-sm font-bold text-red-600">{{ substr($thread->user->name, 0, 1) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Footer -->
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between mt-6 gap-4">
                                <!-- Stats -->
                                <div class="flex items-center gap-4">
                                    <div class="flex items-center text-gray-600">
                                        <div class="p-1.5 bg-red-50 rounded-full mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                            </svg>
                                        </div>
                                        <span class="text-sm">{{ $thread->replies->count() }} Balasan</span>
                                    </div>
                                </div>
                                
                                <!-- Actions -->
                                <div class="flex items-center gap-3">
                                    @if(auth()->user()->roles->contains('id', 1) || auth()->user()->roles->contains('id', 2))                                        <div class="flex gap-3">
                                            <a href="{{ route('forum.edit', $thread->id) }}"
                                            class="text-sm text-blue-600 hover:text-blue-800 transition-colors flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Edit
                                            </a>
                                            
                                            <form action="{{ route('forum.destroy', $thread->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus thread ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-sm text-red-600 hover:text-red-800 transition-colors flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    @endif

                                    <a href="{{ route('forum.show', $thread->id) }}" 
                                    class="flex items-center text-red-600 hover:text-red-800 font-medium text-sm group ml-auto">
                                        Baca selengkapnya
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-2xl shadow-[0_4px_24px_rgba(0,0,0,0.05)] p-8 text-center border border-gray-100">
                    <div class="max-w-md mx-auto">
                        <div class="w-24 h-24 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum ada thread yang dibuat</h3>
                        <p class="text-gray-500 mb-6">Mulailah diskusi pertama dan ajak anggota lain berpartisipasi</p>
                        <a href="{{ route('forum.create') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-xl hover:shadow-lg transition-all shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Buat Thread Pertama
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-10">
            {{ $threads->links() }}
        </div>
    </div>
</x-app-layout>