<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 py-8">
        <!-- Profile Header -->
        <div class="flex flex-col md:flex-row items-start md:items-center gap-6 mb-8">
            <div class="w-24 h-24 rounded-full bg-gradient-to-br from-red-100 to-white flex items-center justify-center shadow-md">
                <span class="text-3xl font-bold text-red-600">{{ substr($user->name, 0, 1) }}</span>
            </div>
            <div>
                <h1 class="text-3xl font-bold text-gray-800">{{ $user->name }}</h1>
                <div class="flex items-center gap-2 mt-2">
                    <span class="px-3 py-1 bg-red-100 text-red-700 text-sm font-medium rounded-full">
                        {{ $user->roles->pluck('name')->join(', ') }}
                    </span>
                    <span class="px-3 py-1 {{ $user->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }} text-sm font-medium rounded-full">
                        {{ $user->is_active ? 'Active' : 'Non-active' }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Basic Information Card -->
        <div class="bg-gradient-to-br from-white via-red-50 to-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <!-- Card Header -->
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-800 flex items-center gap-3">
                    <div class="p-2 bg-red-100 rounded-lg shadow-inner">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <span>Personal Details</span>
                </h2>
                <span class="text-xs px-3 py-1 bg-red-100 text-red-700 rounded-full font-medium">Verified</span>
            </div>

            <!-- Information Grid -->
            <div class="grid grid-cols-1 gap-4">
                <!-- Email Field -->
                <div class="relative group">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-red-100 to-pink-100 rounded-lg blur opacity-0 group-hover:opacity-100 transition duration-200"></div>
                    <div class="relative bg-white p-4 rounded-lg border border-gray-100 shadow-sm hover:shadow-md transition">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-blue-50 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-medium text-gray-500">EMAIL ADDRESS</p>
                                <p class="text-sm font-semibold text-gray-800 truncate">{{ $user->email }}</p>
                            </div>
                        </div>
                        <button class="absolute right-4 top-4 text-blue-500 hover:text-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Study Program Field -->
                <div class="relative group">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-red-100 to-pink-100 rounded-lg blur opacity-0 group-hover:opacity-100 transition duration-200"></div>
                    <div class="relative bg-white p-4 rounded-lg border border-gray-100 shadow-sm hover:shadow-md transition">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-purple-50 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-medium text-gray-500">STUDY PROGRAM</p>
                                <p class="text-sm font-semibold text-gray-800">
                                    {{ Auth::user()->programStudi->nama_prodi ?? 'Not specified' }}
                                </p>
                            </div>
                        </div>
                        <button class="absolute right-4 top-4 text-purple-500 hover:text-purple-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Join Date Field -->
                <div class="relative group">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-red-100 to-pink-100 rounded-lg blur opacity-0 group-hover:opacity-100 transition duration-200"></div>
                    <div class="relative bg-white p-4 rounded-lg border border-gray-100 shadow-sm hover:shadow-md transition">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-green-50 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-medium text-gray-500">MEMBER SINCE</p>
                                <p class="text-sm font-semibold text-gray-800">
                                    {{ $user->created_at->format('d F Y') }}
                                    <span class="text-xs text-gray-500 ml-1">({{ $user->created_at->diffForHumans() }})</span>
                                </p>
                            </div>
                        </div>
                        <button class="absolute right-4 top-4 text-green-500 hover:text-green-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Edit Button -->
            <div class="mt-6 flex justify-end">
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg shadow hover:shadow-lg transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit Profile
                </a>
            </div>
        </div>

            <!-- Academic Stats -->
            <div class="bg-gradient-to-br from-white to-red-50 rounded-2xl shadow-md border border-red-100 p-6 transition-all hover:shadow-lg hover:-translate-y-1">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                        <div class="p-2 bg-red-100 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span>Academic Performance</span>
                    </h2>
                    <span class="text-xs px-3 py-1 bg-red-100 text-red-700 rounded-full font-medium">This Semester</span>
                </div>

                <!-- Completion Progress -->
                <div class="mb-6">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-medium text-gray-700">Task Completion</span>
                        <span class="text-sm font-bold {{ $totalAssignments > 0 && $userSubmissions/$totalAssignments >= 0.75 ? 'text-green-600' : ($totalAssignments > 0 && $userSubmissions/$totalAssignments >= 0.5 ? 'text-yellow-500' : 'text-red-600') }}">
                            {{ $totalAssignments > 0 ? round(($userSubmissions/$totalAssignments)*100) : 0 }}%
                        </span>
                    </div>
                    <div class="relative pt-1">
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-xs font-semibold inline-block text-gray-600">
                                    {{ $userSubmissions }} of {{ $totalAssignments }} tasks
                                </span>
                            </div>
                        </div>
                        <div class="overflow-hidden h-4 mb-4 text-xs flex rounded-full bg-gray-200">
                            <div style="width:{{ $totalAssignments > 0 ? ($userSubmissions/$totalAssignments)*100 : 0 }}%" 
                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center 
                                        {{ $totalAssignments > 0 && $userSubmissions/$totalAssignments >= 0.75 ? 'bg-gradient-to-r from-green-400 to-green-600' : 
                                        ($totalAssignments > 0 && $userSubmissions/$totalAssignments >= 0.5 ? 'bg-gradient-to-r from-yellow-400 to-yellow-600' : 
                                        'bg-gradient-to-r from-red-400 to-red-600') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="bg-white p-3 rounded-xl border border-gray-100 shadow-sm flex items-center gap-3">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Submitted</p>
                            <p class="font-bold text-gray-800">{{ $userSubmissions }}</p>
                        </div>
                    </div>
                    <div class="bg-white p-3 rounded-xl border border-gray-100 shadow-sm flex items-center gap-3">
                        <div class="p-2 bg-purple-100 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Pending</p>
                            <p class="font-bold text-gray-800">{{ $totalAssignments - $userSubmissions }}</p>
                        </div>
                    </div>
                </div>

                <!-- Threads Card -->
                <div class="bg-gradient-to-r from-red-50 to-white p-4 rounded-xl border border-red-100 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-yellow-100 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Forum Participation</p>
                            <p class="text-xs text-gray-500">Total threads created</p>
                        </div>
                    </div>
                    <span class="text-xl font-bold text-gray-800 bg-white px-3 py-1 rounded-lg shadow-sm">
                        {{ $userReplies }}
                    </span>
                </div>

                <!-- Badge Section -->
                @if($totalAssignments > 0 && $userSubmissions/$totalAssignments >= 0.9)
                <div class="mt-4 flex justify-center">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gradient-to-r from-yellow-100 to-yellow-50 text-yellow-800 border border-yellow-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                        Top Performer
                    </span>
                </div>
                @endif
            </div>

            <!-- Recent Activity -->
            <div class="md:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Recent Activity
                </h2>
                <div class="space-y-4">
                    @foreach ($recentActivities as $activity)
                    <div class="flex gap-3">
                        <div class="flex-shrink-0 mt-1">
                            <div class="w-8 h-8 rounded-full bg-red-50 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="text-gray-800">{{ $activity->description }}</p>
                            <p class="text-sm text-gray-500 mt-1">{{ $activity->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    @endforeach
                    @if($recentActivities->isEmpty())
                        <p class="text-gray-500 text-center py-4">No recent activity</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>