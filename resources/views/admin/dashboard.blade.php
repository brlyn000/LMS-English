<x-admin-layout>
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
                    <h3 class="text-3xl font-bold text-gray-800 mt-1">{{ number_format($forumDiscussions) }}</h3>
                    <p class="mt-2 text-sm text-green-600 flex items-center">
                        <span class="bg-green-100 px-2 py-1 rounded-full">Active discussions</span>
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
                    <h3 class="text-3xl font-bold text-gray-800 mt-1">{{ $completionRate }}%</h3>
                    <p class="mt-2 text-sm text-green-600 flex items-center">
                        <span class="bg-green-100 px-2 py-1 rounded-full">Overall progress</span>
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
            <div class="mt-4 grid grid-cols-2 gap-2 text-sm" id="chartLegend">
                <!-- Legend will be populated by JavaScript -->
            </div>
        </div>
    </div>

    <!-- Recent Activity and Upcoming Classes -->
    <div class="grid grid-cols-1 lg:grid-cols-1 gap-8">
        <!-- Recent Forum Activity -->
            <x-recent-activity :activities="$activities" />

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

                labels: labels,
                datasets: [{
                    label: 'Students',
                    data: enrollData.length > 0 ? enrollData : [0, 0, 0, 0],
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
                labels: labels.length > 0 ? labels : ['No Data'],
                datasets: [{
                    data: courseData.length > 0 ? courseData : [1],
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
        
        // Populate legend dynamically
        const legendContainer = document.getElementById('chartLegend');
        const colors = ['bg-red-500', 'bg-blue-500', 'bg-green-500', 'bg-yellow-500'];
        let legendHTML = '';
        
        if (labels.length > 0) {
            labels.forEach((label, index) => {
                const colorClass = colors[index % colors.length];
                legendHTML += `
                    <div class="flex items-center">
                        <span class="w-3 h-3 ${colorClass} rounded-full mr-2"></span>
                        <span class="text-xs">${label}</span>
                    </div>
                `;
            });
        } else {
            legendHTML = '<div class="col-span-2 text-center text-gray-500 text-xs">No data available</div>';
        }
        
        legendContainer.innerHTML = legendHTML;
    </script>
    @endpush
</x-admin-layout>