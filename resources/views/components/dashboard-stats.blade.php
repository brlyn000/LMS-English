<!-- Enhanced Statistics Dashboard Widget -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    @php
        $stats = [
            [
                'title' => 'Total Courses',
                'value' => $card_home->count(),
                'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                'color' => 'from-blue-500 to-cyan-500',
                'bg' => 'from-blue-50 to-cyan-50',
                'change' => '+12%'
            ],
            [
                'title' => 'Assignments',
                'value' => rand(15, 35),
                'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                'color' => 'from-green-500 to-emerald-500',
                'bg' => 'from-green-50 to-emerald-50',
                'change' => '+8%'
            ],
            [
                'title' => 'Forum Posts',
                'value' => rand(45, 85),
                'icon' => 'M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z',
                'color' => 'from-purple-500 to-pink-500',
                'bg' => 'from-purple-50 to-pink-50',
                'change' => '+23%'
            ],
            [
                'title' => 'Study Hours',
                'value' => rand(120, 180),
                'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                'color' => 'from-orange-500 to-red-500',
                'bg' => 'from-orange-50 to-red-50',
                'change' => '+15%'
            ]
        ];
    @endphp

    @foreach($stats as $index => $stat)
        <div class="relative group transform hover:-translate-y-2 transition-all duration-500" style="animation-delay: {{ $index * 100 }}ms">
            <!-- Multi-layer Glow Effect -->
            <div class="absolute -inset-1 bg-gradient-to-r {{ $stat['color'] }} rounded-2xl blur-lg opacity-0 group-hover:opacity-40 transition-opacity duration-500"></div>
            <div class="absolute -inset-0.5 bg-gradient-to-r {{ $stat['color'] }} rounded-2xl blur opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
            
            <!-- Main Card -->
            <div class="relative glass rounded-2xl p-6 border border-white/20 hover:border-white/40 transition-all duration-300 card-hover">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-5">
                    <div class="grid grid-cols-4 gap-1 h-full p-2">
                        @for($i = 0; $i < 16; $i++)
                            <div class="w-0.5 h-0.5 bg-gray-500 rounded-full animate-pulse" style="animation-delay: {{ $i * 100 }}ms"></div>
                        @endfor
                    </div>
                </div>
                
                <!-- Card Content -->
                <div class="relative z-10 space-y-4">
                    <!-- Header with Icon -->
                    <div class="flex items-center justify-between">
                        <!-- Enhanced Icon -->
                        <div class="relative">
                            <div class="absolute -inset-2 bg-gradient-to-r {{ $stat['color'] }} rounded-full blur opacity-30 animate-pulse"></div>
                            <div class="relative bg-gradient-to-r {{ $stat['bg'] }} p-3 rounded-full border border-white/50">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}" />
                                </svg>
                            </div>
                        </div>
                        
                        <!-- Change Indicator -->
                        <div class="flex items-center space-x-1 text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12" />
                            </svg>
                            <span class="text-sm font-medium">{{ $stat['change'] }}</span>
                        </div>
                    </div>
                    
                    <!-- Stats Value -->
                    <div class="space-y-1">
                        <div class="text-3xl font-bold text-gray-800 group-hover:text-gray-900 transition-colors">
                            {{ $stat['value'] }}
                        </div>
                        <div class="text-sm font-medium text-gray-600 group-hover:text-gray-700 transition-colors">
                            {{ $stat['title'] }}
                        </div>
                    </div>
                    
                    <!-- Progress Bar -->
                    <div class="space-y-2">
                        <div class="flex justify-between text-xs text-gray-500">
                            <span>Progress</span>
                            <span>{{ rand(65, 95) }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
                            <div class="bg-gradient-to-r {{ $stat['color'] }} h-2 rounded-full transition-all duration-1000 ease-out progress-bar" 
                                 style="width: {{ rand(65, 95) }}%">
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent animate-shimmer"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Floating Particles -->
                <div class="absolute inset-0 pointer-events-none">
                    @for($i = 0; $i < 3; $i++)
                        <div class="absolute w-1 h-1 bg-white/30 rounded-full animate-pulse floating" 
                             style="top: {{ rand(20, 80) }}%; left: {{ rand(20, 80) }}%; animation-delay: {{ $i * 500 }}ms"></div>
                    @endfor
                </div>
            </div>
        </div>
    @endforeach
</div>