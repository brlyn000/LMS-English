<div class="bg-gradient-to-r from-red-600 to-red-800 text-white p-8 rounded-b-3xl shadow-2xl mb-10 relative overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute -top-10 -right-10 w-32 h-32 bg-white bg-opacity-10 rounded-full"></div>
    <div class="absolute -bottom-5 -left-5 w-20 h-20 bg-white bg-opacity-5 rounded-full"></div>
    
    <div class="max-w-7xl mx-auto relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div class="flex-1">
                <h2 class="font-bold text-4xl md:text-5xl tracking-tight">
                    Academic <span class="text-white font-extrabold">{{ $slot }}</span>
                </h2>
                <p class="text-red-100 mt-2 text-lg md:text-xl opacity-90">
                    Welcome, {{ Auth::user()->name }}! Ready to learn?
                </p>
            </div>
            <div class="hidden md:block">
                <div class="relative group">
                    <!-- Glow effect background -->
                    <div class="absolute -inset-1 bg-white bg-opacity-20 blur-sm rounded-full group-hover:opacity-75 transition-opacity duration-300"></div>
                    <!-- Program study badge -->
                    <div class="relative bg-white bg-opacity-10 px-6 py-3 rounded-full backdrop-blur-sm border border-white border-opacity-20 hover:bg-opacity-20 transition-all duration-300">
                        <span class="text-white font-medium flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            {{ Auth::user()->programStudi->nama_prodi ?? 'Not Set' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>