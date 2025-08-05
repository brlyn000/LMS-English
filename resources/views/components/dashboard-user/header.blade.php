<div class="relative bg-gradient-to-br from-red-600 via-red-700 to-red-900 text-white p-8 rounded-b-3xl shadow-2xl mb-10 overflow-hidden">
    <!-- Enhanced Decorative Elements -->
    <div class="absolute -top-10 -right-10 w-32 h-32 bg-gradient-to-br from-white/20 to-pink-300/20 rounded-full animate-float"></div>
    <div class="absolute -bottom-5 -left-5 w-20 h-20 bg-gradient-to-br from-white/10 to-blue-300/10 rounded-full animate-bounce"></div>
    <div class="absolute top-1/2 right-1/4 w-16 h-16 bg-gradient-to-br from-yellow-300/10 to-orange-300/10 rounded-full animate-pulse"></div>
    <div class="absolute bottom-1/4 left-1/3 w-12 h-12 bg-gradient-to-br from-green-300/10 to-teal-300/10 rounded-full animate-spin-slow"></div>
    
    <!-- Animated Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-full h-full">
            <div class="grid grid-cols-12 gap-4 h-full">
                @for($i = 0; $i < 48; $i++)
                    <div class="w-2 h-2 bg-white rounded-full animate-pulse" style="animation-delay: {{ $i * 50 }}ms; opacity: {{ rand(10, 30) / 100 }}"></div>
                @endfor
            </div>
        </div>
    </div>
    
    <!-- Shimmer Effect -->
    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent animate-shimmer"></div>
    
    <div class="max-w-7xl mx-auto relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div class="flex-1">
                <!-- Enhanced Title with Glow Effect -->
                <div class="relative">
                    <div class="absolute -inset-2 bg-white/20 blur-xl rounded-lg animate-glow"></div>
                    <h2 class="relative font-bold text-4xl md:text-6xl tracking-tight">
                        <span class="bg-gradient-to-r from-white to-red-100 bg-clip-text text-transparent">Academic</span> 
                        <span class="bg-gradient-to-r from-yellow-200 to-white bg-clip-text text-transparent font-extrabold animate-pulse">{{ $slot }}</span>
                    </h2>
                </div>
                
                <!-- Enhanced Welcome Message -->
                <div class="mt-4 space-y-2">
                    <p class="text-red-100 text-lg md:text-xl opacity-90 flex items-center">
                        <span class="inline-block w-2 h-2 bg-green-400 rounded-full mr-3 animate-pulse"></span>
                        Welcome back, <span class="font-semibold text-white">{{ Auth::user()->name }}</span>!
                    </p>
                    <p class="text-red-200 text-sm md:text-base opacity-80">
                        🚀 Ready to continue your learning journey?
                    </p>
                </div>
                
                <!-- Progress Indicator -->
                <div class="mt-6 flex items-center space-x-4">
                    <div class="flex items-center text-sm text-red-100">
                        <div class="w-3 h-3 bg-green-400 rounded-full mr-2 animate-pulse"></div>
                        Online
                    </div>
                    <div class="flex items-center text-sm text-red-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ now()->format('H:i') }}
                    </div>
                </div>
            </div>
            
            <!-- Enhanced Program Study Badge -->
            <div class="hidden md:block">
                <div class="relative group">
                    <!-- Multi-layer Glow Effect -->
                    <div class="absolute -inset-2 bg-gradient-to-r from-white/30 to-pink-300/30 blur-lg rounded-full group-hover:opacity-100 opacity-60 transition-all duration-500 animate-pulse"></div>
                    <div class="absolute -inset-1 bg-gradient-to-r from-white/20 to-blue-300/20 blur-md rounded-full group-hover:opacity-75 transition-opacity duration-300"></div>
                    
                    <!-- Enhanced Badge -->
                    <div class="relative glass px-8 py-4 rounded-2xl backdrop-blur-md border border-white/30 hover:border-white/50 transition-all duration-300 transform group-hover:scale-105">
                        <div class="flex items-center space-x-3">
                            <!-- Animated Icon -->
                            <div class="relative">
                                <div class="absolute inset-0 bg-white/20 rounded-full animate-ping"></div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="relative h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            
                            <!-- Program Info -->
                            <div>
                                <p class="text-white font-bold text-lg">{{ Auth::user()->programStudi->nama_prodi ?? 'Not Set' }}</p>
                                <p class="text-red-100 text-xs opacity-80">Program Studi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Mobile Program Study Badge -->
        <div class="md:hidden mt-6">
            <div class="glass px-4 py-2 rounded-xl backdrop-blur-sm border border-white/20 inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                <span class="text-white font-medium text-sm">{{ Auth::user()->programStudi->nama_prodi ?? 'Not Set' }}</span>
            </div>
        </div>
    </div>
</div>