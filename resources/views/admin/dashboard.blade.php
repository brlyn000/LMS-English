<x-layouts-admin header="LMS Dashboard">
    <!-- Quick Stats with Modern Design -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Students Card -->
        <div class="bg-white rounded-xl shadow-lg p-6 relative overflow-hidden transition-transform hover:scale-[1.02]">
            <div class="absolute top-0 right-0 w-16 h-16 bg-red-50 rounded-bl-full"></div>
            <div class="flex justify-between items-start z-10 relative">
                <div>
                    <p class="text-gray-500 text-sm font-medium uppercase tracking-wider">Total Students</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-1">{{ number_format($totalUsers) }}</h3>
                    <p class="mt-2 text-sm text-green-600 flex items-center">
                        <span class="bg-green-100 px-2 py-1 rounded-full">8% increase</span>
                    </p>
                </div>
                <div class="p-3 rounded-xl bg-gradient-to-br from-red-50 to-white text-red-500 shadow-inner">
                    <i class="fas fa-user-graduate text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Active Courses Card -->
        <div class="bg-white rounded-xl shadow-lg p-6 relative overflow-hidden transition-transform hover:scale-[1.02]">
            <div class="absolute top-0 right-0 w-16 h-16 bg-red-50 rounded-bl-full"></div>
            <div class="flex justify-between items-start z-10 relative">
                <div>
                    <p class="text-gray-500 text-sm font-medium uppercase tracking-wider">Program Studi</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-1">{{ number_format($programStudi) }}</h3>
                    <p class="mt-2 text-sm text-green-600 flex items-center">
                        <span class="bg-green-100 px-2 py-1 rounded-full">3 new</span>
                    </p>
                </div>
                <div class="p-3 rounded-xl bg-gradient-to-br from-red-50 to-white text-red-500 shadow-inner">
                    <i class="fas fa-book-open text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Forum Discussions Card -->
        <div class="bg-white rounded-xl shadow-lg p-6 relative overflow-hidden transition-transform hover:scale-[1.02]">
            <div class="absolute top-0 right-0 w-16 h-16 bg-red-50 rounded-bl-full"></div>
            <div class="flex justify-between items-start z-10 relative">
                <div>
                    <p class="text-gray-500 text-sm font-medium uppercase tracking-wider">Forum Discussions</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-1">1,276</h3>
                    <p class="mt-2 text-sm text-green-600 flex items-center">
                        <span class="bg-green-100 px-2 py-1 rounded-full">42 new today</span>
                    </p>
                </div>
                <div class="p-3 rounded-xl bg-gradient-to-br from-red-50 to-white text-red-500 shadow-inner">
                    <i class="fas fa-comments text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Completion Rate Card -->
        <div class="bg-white rounded-xl shadow-lg p-6 relative overflow-hidden transition-transform hover:scale-[1.02]">
            <div class="absolute top-0 right-0 w-16 h-16 bg-red-50 rounded-bl-full"></div>
            <div class="flex justify-between items-start z-10 relative">
                <div>
                    <p class="text-gray-500 text-sm font-medium uppercase tracking-wider">Completion Rate</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-1">78%</h3>
                    <p class="mt-2 text-sm text-green-600 flex items-center">
                        <span class="bg-green-100 px-2 py-1 rounded-full">5% improvement</span>
                    </p>
                </div>
                <div class="p-3 rounded-xl bg-gradient-to-br from-red-50 to-white text-red-500 shadow-inner">
                    <i class="fas fa-trophy text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
        <!-- Enrollment by Program -->
        <div class="bg-white rounded-xl shadow-lg p-6 lg:col-span-2">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                    <span class="w-1 h-6 bg-red-500 mr-2 rounded-full"></span>
                    Enrollment by Study Program
                </h3>
                <select class="border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-300 bg-white shadow-sm">
                    <option>This Semester</option>
                    <option>Last Semester</option>
                    <option>This Academic Year</option>
                </select>
            </div>
            <div class="h-80">
                <canvas id="enrollmentChart"></canvas>
            </div>
        </div>

        <!-- Course Distribution -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                <span class="w-1 h-6 bg-red-500 mr-2 rounded-full"></span>
                Course Distribution
            </h3>
            <div class="h-80">
                <canvas id="courseChart"></canvas>
            </div>
            <div class="mt-4 grid grid-cols-2 gap-2 text-sm">
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-red-500 rounded-full mr-2"></span>
                    <span>Accounting</span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-blue-500 rounded-full mr-2"></span>
                    <span>IT</span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-green-500 rounded-full mr-2"></span>
                    <span>Office Admin</span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></span>
                    <span>Mechanical</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity and Upcoming Classes -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Recent Forum Activity -->
        <div class="bg-white rounded-xl shadow-lg p-6 lg:col-span-2">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                    <span class="w-1 h-6 bg-red-500 mr-2 rounded-full"></span>
                    Recent Forum Activity
                </h3>
                <a href="#" class="text-sm text-red-600 font-medium hover:underline flex items-center">
                    View all <i class="fas fa-chevron-right ml-1 text-xs"></i>
                </a>
            </div>
            <div class="space-y-4">
                @foreach([1,2,3] as $item)
                <div class="flex items-start p-4 border border-gray-100 rounded-lg hover:bg-gray-50 transition-colors group">
                    <div class="flex-shrink-0 mt-1">
                        <div class="relative">
                            <img src="https://ui-avatars.com/api/?name=Student+{{$item}}&background=random" alt="" class="w-10 h-10 rounded-full">
                            <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-white"></span>
                        </div>
                    </div>
                    <div class="ml-4 flex-1 min-w-0">
                        <div class="flex justify-between items-baseline">
                            <h4 class="text-sm font-semibold text-gray-900 truncate">Student {{$item}}</h4>
                            <span class="text-xs text-gray-500 whitespace-nowrap ml-2">2{{$item}}m ago</span>
                        </div>
                        <p class="text-sm text-gray-600 mt-1">Posted in <span class="text-red-600 font-medium">Accounting 101</span></p>
                        <p class="text-sm text-gray-500 mt-2 truncate group-hover:text-gray-700">"I have a question about the homework assignment for chapter 3 regarding the new accounting principles we learned..."</p>
                        <div class="flex items-center mt-3 space-x-4">
                            <span class="inline-flex items-center text-xs text-gray-500 hover:text-red-600">
                                <i class="far fa-comment mr-1"></i>
                                <span>3 replies</span>
                            </span>
                            <span class="inline-flex items-center text-xs text-gray-500 hover:text-red-600">
                                <i class="far fa-thumbs-up mr-1"></i>
                                <span>5 likes</span>
                            </span>
                            <button class="text-xs text-red-600 hover:text-red-800 ml-auto">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Upcoming Classes -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                    <span class="w-1 h-6 bg-red-500 mr-2 rounded-full"></span>
                    Upcoming Classes
                </h3>
                <a href="#" class="text-sm text-red-600 font-medium hover:underline flex items-center">
                    View Calendar <i class="fas fa-chevron-right ml-1 text-xs"></i>
                </a>
            </div>
            <div class="space-y-4">
                @foreach([
                    ['course' => 'Database Systems', 'time' => 'Today, 10:00 AM', 'program' => 'IT', 'instructor' => 'Dr. Smith', 'color' => 'blue'],
                    ['course' => 'Financial Accounting', 'time' => 'Tomorrow, 9:00 AM', 'program' => 'Accounting', 'instructor' => 'Prof. Johnson', 'color' => 'red'],
                    ['course' => 'Office Management', 'time' => 'Tomorrow, 1:00 PM', 'program' => 'Office Admin', 'instructor' => 'Ms. Williams', 'color' => 'green'],
                ] as $class)
                <div class="p-4 border border-gray-100 rounded-lg hover:shadow-sm transition-shadow">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="text-sm font-semibold text-gray-900">{{ $class['course'] }}</h4>
                            <div class="flex items-center mt-1">
                                <span class="text-xs px-2 py-1 bg-{{$class['color']}}-100 text-{{$class['color']}}-800 rounded-full">{{ $class['program'] }}</span>
                            </div>
                        </div>
                        <div class="text-xs text-gray-500 bg-gray-50 px-2 py-1 rounded-full">
                            <i class="far fa-clock mr-1"></i> {{ explode(',', $class['time'])[0] }}
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-2"><i class="fas fa-chalkboard-teacher mr-1"></i> {{ $class['instructor'] }}</p>
                    <div class="mt-3 flex justify-between items-center">
                        <div class="flex -space-x-2">
                            @for($i=0; $i<3; $i++)
                            <img src="https://ui-avatars.com/api/?name=S{{$i}}&background=random" alt="" class="w-6 h-6 rounded-full border-2 border-white hover:z-10 hover:scale-110 transition-transform">
                            @endfor
                            <div class="w-6 h-6 rounded-full bg-gray-100 border-2 border-white flex items-center justify-center text-xs text-gray-500 hover:scale-110 transition-transform">+12</div>
                        </div>
                        <button class="text-xs bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-1.5 rounded-lg hover:shadow-md transition-all flex items-center">
                            <i class="fas fa-video mr-1"></i> Join
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = @json($labels);
        const enrollData = @json($enrollData);  
        const courseData = @json($courseData);  
        // Enrollment by Program Chart
        const enrollmentCtx = document.getElementById('enrollmentChart').getContext('2d');
        const enrollmentChart = new Chart(enrollmentCtx, {
            type: 'bar',
            data: {

                labels: ['Accounting', 'Information Technology', 'Office Administration', 'Mechanical Technology'],
                datasets: [{
                    label: 'Students',
                    data: enrollData,
                    backgroundColor: [
                        'rgba(229, 62, 62, 0.8)',
                        'rgba(49, 130, 206, 0.8)',
                        'rgba(56, 161, 105, 0.8)',
                        'rgba(214, 158, 46, 0.8)'
                    ],
                    borderColor: [
                        'rgba(229, 62, 62, 1)',
                        'rgba(49, 130, 206, 1)',
                        'rgba(56, 161, 105, 1)',
                        'rgba(214, 158, 46, 1)'
                    ],
                    borderWidth: 1,
                    borderRadius: 6,
                    hoverBackgroundColor: [
                        'rgba(229, 62, 62, 1)',
                        'rgba(49, 130, 206, 1)',
                        'rgba(56, 161, 105, 1)',
                        'rgba(214, 158, 46, 1)'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0,0,0,0.8)',
                        titleFont: {
                            size: 14,
                            weight: 'bold'
                        },
                        bodyFont: {
                            size: 12
                        },
                        padding: 12,
                        cornerRadius: 8,
                        displayColors: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false,
                            color: 'rgba(0,0,0,0.05)'
                        },
                        ticks: {
                            padding: 10
                        }
                    },
                    x: {
                        grid: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            padding: 10
                        }
                    }
                }
            }
        });

        // Course Distribution Chart
        const courseCtx = document.getElementById('courseChart').getContext('2d');
        const courseChart = new Chart(courseCtx, {
            type: 'doughnut',
            data: {
                labels: ['Accounting', 'Information Technology', 'Office Administration', 'Mechanical Technology'],
                datasets: [{
                    data: courseData,
                    backgroundColor: [
                        'rgba(229, 62, 62, 0.8)',
                        'rgba(49, 130, 206, 0.8)',
                        'rgba(56, 161, 105, 0.8)',
                        'rgba(214, 158, 46, 0.8)'
                    ],
                    borderColor: 'rgba(255,255,255,0.8)',
                    borderWidth: 2,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0,0,0,0.8)',
                        titleFont: {
                            size: 14,
                            weight: 'bold'
                        },
                        bodyFont: {
                            size: 12
                        },
                        padding: 12,
                        cornerRadius: 8
                    }
                },
                cutout: '75%'
            }
        });
    </script>
    @endpush
</x-layouts-admin>