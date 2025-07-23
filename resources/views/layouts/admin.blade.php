<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS Admin - {{ $title ?? 'Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800 flex h-full">
    <!-- Sidebar Overlay (Mobile) -->
    <div class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <aside class="fixed inset-y-0 left-0 w-64 bg-gradient-to-b from-red-700 to-red-800 shadow-xl transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-50" id="sidebar">
        <div class="flex flex-col h-full">
            <!-- Brand Logo -->
            <div class="p-6 border-b border-red-600 flex items-center justify-center">
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-red-700 font-bold mr-3 shadow-md">
                        <i class="fas fa-graduation-cap text-xl"></i>
                    </div>
                    <h1 class="text-xl font-bold text-white tracking-tight">Real<span class="font-extrabold">World</span></h1>
                </a>
            </div>

            <!-- User Profile -->
            <div class="px-6 py-4 border-b border-red-600 flex items-center space-x-3">
                <div class="relative">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random" alt="{{ Auth::user()->name }}" class="w-10 h-10 rounded-full border-2 border-white shadow">
                    <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-400 rounded-full border-2 border-white"></span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-white truncate">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-red-100 truncate">{{ Auth::user()->email }}</p>
                </div>
                <button class="text-red-200 hover:text-white">
                    <i class="fas fa-ellipsis-v text-sm"></i>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 overflow-y-auto py-4 px-2">
                <!-- Main Menu -->
                <div class="mb-8">
                    <h3 class="text-xs font-semibold text-red-200 uppercase tracking-wider px-4 mb-3">Main Menu</h3>
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('admin.index') }}" class="flex items-center px-4 py-3 text-red-100 hover:bg-red-600 hover:text-white rounded-lg transition-all duration-200 group">
                                <div class="w-6 text-center mr-3">
                                    <i class="fas fa-tachometer-alt text-red-300 group-hover:text-white"></i>
                                </div>
                                <span class="font-medium">Dashboard</span>
                                <span class="ml-auto bg-red-900 text-white text-xs px-2 py-1 rounded-full">3 New</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users') }}" class="flex items-center px-4 py-3 text-red-100 hover:bg-red-600 hover:text-white rounded-lg transition-all duration-200 group">
                                <div class="w-6 text-center mr-3">
                                    <i class="fas fa-users text-red-300 group-hover:text-white"></i>
                                </div>
                                <span class="font-medium">Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.content.index') }}" class="flex items-center px-4 py-3 text-red-100 hover:bg-red-600 hover:text-white rounded-lg transition-all duration-200 group">
                                <div class="w-6 text-center mr-3">
                                    <i class="fas fa-tablet text-red-300 group-hover:text-white"></i>
                                </div>
                                <span class="font-medium">Card Home</span>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Academic -->
                <div class="mb-8">
                    <h3 class="text-xs font-semibold text-red-200 uppercase tracking-wider px-4 mb-3">Academic</h3>
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('admin.module.index') }}" class="flex items-center px-4 py-3 text-red-100 hover:bg-red-600 hover:text-white rounded-lg transition-all duration-200 group">
                                <div class="w-6 text-center mr-3">
                                    <i class="fas fa-layer-group text-red-300 group-hover:text-white"></i>
                                </div>
                                <span class="font-medium">Classes</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.threads.index') }}" class="flex items-center px-4 py-3 text-red-100 hover:bg-red-600 hover:text-white rounded-lg transition-all duration-200 group">
                                <div class="w-6 text-center mr-3">
                                    <i class="fas fa-comments text-red-300 group-hover:text-white"></i>
                                </div>
                                <span class="font-medium">Discussion Forum</span>
                                <span class="ml-auto bg-red-900 text-white text-xs px-2 py-1 rounded-full">42+</span>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Study Programs -->
                <div>
                    <h3 class="text-xs font-semibold text-red-200 uppercase tracking-wider px-4 mb-3">Study Programs</h3>
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('admin.nilaiAk') }}" class="flex items-center px-4 py-3 text-red-100 hover:bg-red-600 hover:text-white rounded-lg transition-all duration-200 group">
                                <div class="w-6 text-center mr-3">
                                    <i class="fas fa-calculator text-red-300 group-hover:text-white"></i>
                                </div>
                                <span class="font-medium">Accounting</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.nilaiTi') }}" class="flex items-center px-4 py-3 text-red-100 hover:bg-red-600 hover:text-white rounded-lg transition-all duration-200 group">
                                <div class="w-6 text-center mr-3">
                                    <i class="fas fa-laptop-code text-red-300 group-hover:text-white"></i>
                                </div>
                                <span class="font-medium">Information Technology</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.nilaiAp') }}" class="flex items-center px-4 py-3 text-red-100 hover:bg-red-600 hover:text-white rounded-lg transition-all duration-200 group">
                                <div class="w-6 text-center mr-3">
                                    <i class="fas fa-briefcase text-red-300 group-hover:text-white"></i>
                                </div>
                                <span class="font-medium">Office Administration</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.nilaiTm') }}" class="flex items-center px-4 py-3 text-red-100 hover:bg-red-600 hover:text-white rounded-lg transition-all duration-200 group">
                                <div class="w-6 text-center mr-3">
                                    <i class="fas fa-cogs text-red-300 group-hover:text-white"></i>
                                </div>
                                <span class="font-medium">Mechanical Technology</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Sidebar Footer -->
            <div class="p-4 border-t border-red-600">
                <div class="flex items-center justify-between">
                    <button class="text-red-200 hover:text-white">
                        <i class="fas fa-cog"></i>
                    </button>
                    <button class="text-red-200 hover:text-white">
                        <i class="fas fa-question-circle"></i>
                    </button>
                    <button class="text-red-200 hover:text-white">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden lg:ml-64">
        <!-- Mobile Header -->
        <header class="lg:hidden bg-white shadow-sm">
            <div class="flex items-center justify-between p-4">
                <button id="sidebarToggle" class="text-gray-600 hover:text-red-600">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h2 class="text-lg font-semibold text-gray-800">{{ $header ?? 'Dashboard' }}</h2>
                <div class="flex items-center space-x-2">
                    <button class="p-2 text-gray-600 hover:text-red-600 relative">
                        <i class="fas fa-bell"></i>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <img src="https://ui-avatars.com/api/?name=Admin&background=random" alt="Admin" class="w-8 h-8 rounded-full">
                </div>
            </div>
        </header>

        <!-- Desktop Header -->
        <header class="hidden lg:block bg-white shadow-sm">
            <div class="flex justify-between items-center px-6 py-4">
                <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                    <span class="w-1 h-6 bg-red-600 mr-3 rounded-full"></span>
                    {{ $header ?? 'Dashboard' }}
                </h2>
                <div class="flex items-center space-x-6">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-2 relative group">
                            <img src="https://ui-avatars.com/api/?name=Admin&background=random" alt="Admin" class="w-8 h-8 rounded-full border-2 border-white shadow">
                            <span class="text-sm font-medium text-gray-700">{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down text-xs text-gray-500 transition-transform group-hover:rotate-180"></i>
                            
                            <!-- Dropdown Menu -->
                            <div class="absolute right-0 top-full mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden group-hover:block transition">
                                <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto p-6 bg-gradient-to-br from-gray-50 to-gray-100">
            {{ $slot }}
        </main>
    </div>

    @stack('scripts')
    <script src="//unpkg.com/alpinejs" defer></script>

    <script>
        // Mobile sidebar toggle
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
            
            if (!sidebar.classList.contains('-translate-x-full')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        });
        
        document.getElementById('sidebarOverlay').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
            document.body.style.overflow = '';
        });
    </script>
</body>
</html>