
<div class="relative bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-2xl">
    <div class="flex flex-col lg:flex-row">
        <!-- Profile Left Section (Gradient Background) -->
        <div class="lg:w-1/3 bg-gradient-to-br from-red-600 to-red-800 p-8 flex items-center justify-center relative">
            <!-- Decorative elements -->
            <div class="absolute top-4 right-4 w-8 h-8 bg-white bg-opacity-10 rounded-full"></div>
            <div class="absolute bottom-4 left-4 w-6 h-6 bg-white bg-opacity-10 rounded-full"></div>
            
            <div class="text-center relative z-10">
                <!-- Avatar with verification badge -->
                <div class="relative inline-block transform hover:scale-105 transition-transform duration-300">
                    <img class="h-24 w-24 rounded-full border-4 border-white shadow-lg" 
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=dc2626&color=fff&size=128&font-size=0.5" 
                            alt="{{ Auth::user()->name }}">
                    <span class="absolute bottom-0 right-0 bg-white rounded-full p-1 shadow-sm animate-pulse">
                        <svg class="h-5 w-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </div>
                <h3 class="mt-4 text-xl font-bold text-white">{{ Auth::user()->name }}</h3>
                <p class="mt-1 text-red-100">{{ Auth::user()->email }}</p>
                
                <!-- Program study badge -->
                <div class="mt-4 inline-flex items-center bg-white bg-opacity-20 px-3 py-1 rounded-full text-sm font-medium text-white hover:bg-opacity-30 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    {{ Auth::user()->programStudi->nama_prodi ?? 'Not Set' }}
                </div>
            </div>
        </div>
        
        <!-- Profile Right Section (Content) -->
        <div class="lg:w-2/3 p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Academic Progress Section -->
                <div>
                    <h4 class="text-xs font-semibold text-red-600 uppercase tracking-wider flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        Academic Progress
                    </h4>
                    <div class="mt-4 space-y-4">
                        @php
                            $progressBars = [
                                ['label' => 'Course Completion', 'value' => $courseCompletion ?? 0, 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
                                ['label' => 'Assignment Submission', 'value' => $assignmentSubmission ?? 0, 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                                ['label' => 'Forum Participation', 'value' => $forumParticipation ?? 0, 'icon' => 'M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z'],
                            ];
                        @endphp

                        @foreach ($progressBars as $bar)
                            <div class="group">
                                <div class="flex justify-between items-center mb-1">
                                    <span class="text-sm text-gray-600 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $bar['icon'] }}" />
                                        </svg>
                                        {{ $bar['label'] }}
                                    </span>
                                    <span class="text-xs font-medium bg-red-50 text-red-600 px-2 py-0.5 rounded-full">
                                        {{ $bar['value'] }}%
                                    </span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
                                    <div class="bg-gradient-to-r from-red-500 to-red-600 h-2 rounded-full transition-all duration-500 ease-out" 
                                            style="width: {{ $bar['value'] }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Quick Actions Section -->
                <div>
                    <h4 class="text-xs font-semibold text-red-600 uppercase tracking-wider flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Quick Actions
                    </h4>
                    <div class="mt-4 grid grid-cols-2 gap-3">
                        <!-- Courses Button -->
                        <a href="{{ route('class') }}" class="bg-red-50 hover:bg-red-100 text-red-700 p-3 rounded-lg flex flex-col items-center justify-center transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                            <div class="bg-white p-2 rounded-full mb-1 shadow-inner">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m0-12C10.343 6 9 7.343 9 9v8m3-11c1.657 0 3 1.343 3 3v8" />
                                </svg>
                            </div>
                            <span class="text-xs font-medium">Courses</span>
                        </a>

                        <!-- Classes Button -->                        
                        <a href="{{ route('class') }}" class="bg-red-50 hover:bg-red-100 text-red-700 p-3 rounded-lg flex flex-col items-center justify-center transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                            <div class="bg-white p-2 rounded-full mb-1 shadow-inner">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6m0-6l-4 2.5m4-2.5l4 2.5" />
                                </svg>
                            </div>
                            <span class="text-xs font-medium">Classes</span>
                        </a>


                        <!-- Forums Button -->
                        <a href="{{ route('forum.index') }}" class="bg-red-50 hover:bg-red-100 text-red-700 p-3 rounded-lg flex flex-col items-center justify-center transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                            <div class="bg-white p-2 rounded-full mb-1 shadow-inner">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                </svg>
                            </div>
                            <span class="text-xs font-medium">Forums</span>
                        </a>

                        <!-- Settings Button -->
                        <a href="{{ route('profile.edit') }}" class="bg-red-50 hover:bg-red-100 text-red-700 p-3 rounded-lg flex flex-col items-center justify-center transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                            <div class="bg-white p-2 rounded-full mb-1 shadow-inner">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <span class="text-xs font-medium">Settings</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>