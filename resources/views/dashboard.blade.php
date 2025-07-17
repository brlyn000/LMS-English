<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-red-600 to-red-800 text-white p-8 rounded-b-3xl shadow-2xl mb-20">
            <div class="max-w-7xl mx-auto ">
                <div class="flex justify-between items-center ">
                    <div>
                        <h2 class="font-bold text-4xl tracking-tight">Academic <span class="text-white">Dashboard</span></h2>
                        <p class="text-red-100 mt-2 text-lg">Welcome to your personalized learning center</p>
                    </div>
                    <div class="hidden md:block">
                        <div class="relative">
                            <div class="absolute -inset-1 bg-white bg-opacity-20 blur-sm rounded-full"></div>
                            <div class="relative bg-white bg-opacity-10 px-6 py-3 rounded-full backdrop-blur-sm border border-white border-opacity-20">
                                <span class="text-white font-medium">{{ Auth::user()->programStudi->nama_prodi ?? 'Not Set' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="bg-gradient-to-b from-red-50 to-white min-h-screen py-12 -mt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
            
            <!-- User Profile Card -->
            <div class="relative">
                <div class="absolute -inset-1 bg-gradient-to-r from-red-400 to-red-600 rounded-2xl opacity-20 blur-lg"></div>
                <div class="relative bg-white rounded-2xl shadow-xl overflow-hidden">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/3 bg-gradient-to-br from-red-600 to-red-800 p-8 flex items-center justify-center">
                            <div class="text-center">
                                <div class="relative inline-block">
                                    <img class="h-24 w-24 rounded-full border-4 border-white shadow-lg" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=dc2626&color=fff" alt="Profile">
                                    <span class="absolute bottom-0 right-0 bg-white rounded-full p-1 shadow-sm">
                                        <svg class="h-5 w-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                </div>
                                <h3 class="mt-4 text-xl font-bold text-white">{{ Auth::user()->name }}</h3>
                                <p class="mt-1 text-red-100">{{ Auth::user()->email }}</p>
                                <div class="mt-4 inline-flex bg-white bg-opacity-20 px-3 py-1 rounded-full text-sm font-medium text-white">
                                    {{ Auth::user()->programStudi->nama_prodi ?? 'Not Set' }}
                                </div>
                            </div>
                        </div>
                        <div class="md:w-2/3 p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Academic Progress Section -->
                        <div>
                            <h4 class="text-xs font-semibold text-red-600 uppercase tracking-wider">Academic Progress</h4>
                            <div class="mt-4 space-y-4">
                                @php
                                    $progressBars = [
                                        ['label' => 'Course Completion', 'value' => $courseCompletion ?? 0],
                                        ['label' => 'Assignment Submission', 'value' => $assignmentSubmission ?? 0],
                                        ['label' => 'Forum Participation', 'value' => $forumParticipation ?? 0],
                                    ];
                                @endphp

                                @foreach ($progressBars as $bar)
                                    <div>
                                        <div class="flex justify-between text-sm text-gray-600 mb-1">
                                            <span>{{ $bar['label'] }}</span>
                                            <span>{{ $bar['value'] }}%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div class="bg-red-600 h-2 rounded-full transition-all duration-300" style="width: {{ $bar['value'] }}%"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Quick Actions Section -->
                        <div>
                            <h4 class="text-xs font-semibold text-red-600 uppercase tracking-wider">Quick Actions</h4>
                            <div class="mt-4 grid grid-cols-2 gap-3">
                                <a href="{{ route('class') }}" class="bg-red-50 hover:bg-red-100 text-red-700 p-3 rounded-lg flex flex-col items-center justify-center transition">
                                    <!-- Book Open Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m0-12C10.343 6 9 7.343 9 9v8m3-11c1.657 0 3 1.343 3 3v8" />
                                    </svg>
                                    <span class="text-xs font-medium">Courses</span>
                                </a>

                                @php $card = $card_home[0]; @endphp
                                <a href="{{ url($card->link) }}" class="bg-red-50 hover:bg-red-100 text-red-700 p-3 rounded-lg flex flex-col items-center justify-center transition">
                                    <!-- Academic Cap Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6m0-6l-4 2.5m4-2.5l4 2.5" />
                                    </svg>
                                    <span class="text-xs font-medium">Classes</span>
                                </a>

                                <a href="{{ route('forum.index') }}" class="bg-red-50 hover:bg-red-100 text-red-700 p-3 rounded-lg flex flex-col items-center justify-center transition">
                                    <!-- Chat Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.86 9.86 0 01-4.255-.949L3 20l1.395-3.72A7.97 7.97 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                    <span class="text-xs font-medium">Forums</span>
                                </a>

                                <a href="{{ route('profile.edit') }}" class="bg-red-50 hover:bg-red-100 text-red-700 p-3 rounded-lg flex flex-col items-center justify-center transition">
                                    <!-- Cog Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.983 13.03a2.01 2.01 0 110-2.06 2.01 2.01 0 010 2.06zM12 6v1m0 10v1m6.364-6.364h1M5.636 12H4m12.728 4.728l.707.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l.707.707" />
                                    </svg>
                                    <span class="text-xs font-medium">Settings</span>
                                </a>
                            </div>

                        </div>
                        </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Modern Cards Section -->
            <div class="space-y-8">
                <h3 class="text-2xl font-bold text-gray-800 border-l-4 border-red-600 pl-4">Your Learning Resources</h3>
                
                <!-- Class Cards -->
                <div>
                    <h4 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                        <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        Classes
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Class Card  -->
                        @foreach ($card_home as $card)
                            <div class="relative group">
                                <div class="absolute -inset-0.5 bg-gradient-to-r from-red-600 to-blue-800 rounded-xl blur opacity-75 group-hover:opacity-100 transition duration-200"></div>
                                <div class="relative bg-white rounded-xl shadow-md overflow-hidden h-full">
                                    <div class="h-48 bg-gradient-to-r from-red-500 to-red-700 flex items-center justify-center overflow-hidden">
                                        @if($card->image)
                                            <img src="{{ asset('storage/' . $card->image) }}" alt="{{ $card->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                        @else
                                            <div class="text-white text-4xl font-bold">{{ substr($card->name, 0, 1) }}</div>
                                        @endif
                                    </div>
                                    <div class="p-6">
                                        <div class="flex items-center justify-between">
                                            <h5 class="text-lg font-bold text-gray-800">{{ $card->name }}</h5>
                                            <span class="bg-{{ $card->color_theme }}-100 text-{{ $card->color_theme }}-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">{{ $card->status }}</span>
                                        </div>
                                        <p class="mt-2 text-gray-600 text-sm">{{ $card->description }}</p>
                                        <div class="mt-4 flex items-center justify-between">
                                            <div class="flex items-center">
                                                <svg class="w-4 h-4 text-gray-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span class="text-xs text-gray-500">{{ $card->schedule }}</span>
                                            </div>
                                            <div class="flex items-center">
                                                <svg class="w-4 h-4 text-gray-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                </svg>
                                                <span class="text-xs text-gray-500">{{ $card->students_count }} Students</span>
                                            </div>
                                        </div>
                                        <div class="mt-6">
                                            <a href="{{ url($card->link ) }}" class=" inline-flex items-center px-4 py-2 bg-red-600 hover:bg-{{ $card->color_theme }}-700 text-white text-sm font-medium rounded-lg transition duration-200">
                                                Enter Class
                                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white rounded-xl shadow-xl overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-200">
                    <h3 class="text-lg font-bold text-gray-900">Recent Activity</h3>
                </div>
                <div class="divide-y divide-gray-200">
                    <div class="p-6 hover:bg-gray-50 transition">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-red-100 p-2 rounded-lg">
                                <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-900">Assignment "Research Paper" graded</p>
                                <p class="text-sm text-gray-500">You received 85/100 on your recent submission</p>
                                <p class="mt-1 text-xs text-gray-400">2 hours ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 hover:bg-gray-50 transition">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-blue-100 p-2 rounded-lg">
                                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-900">New reply in "Business Communication"</p>
                                <p class="text-sm text-gray-500">Prof. Johnson replied to your question about email formats</p>
                                <p class="mt-1 text-xs text-gray-400">5 hours ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 hover:bg-gray-50 transition">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-green-100 p-2 rounded-lg">
                                <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-900">New material uploaded</p>
                                <p class="text-sm text-gray-500">"Week 5: Technical Report Writing" is now available</p>
                                <p class="mt-1 text-xs text-gray-400">1 day ago</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-4 bg-gray-50 text-right">
                    <a href="#" class="text-sm font-medium text-red-600 hover:text-red-500">
                        View all activity <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>