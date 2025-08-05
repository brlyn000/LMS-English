<nav x-data="{ open: false }" class="bg-red-600 border-b border-gray-100 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center gap-6">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2 text-white font-bold text-xl">
                        <img src="{{ asset('favicon.png') }}" alt="Logo" class="w-12 h-12">
                        <span>Real World</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:flex gap-6">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:text-gray-200 font-semibold">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    @if (Auth::user()->roles->contains('name', 'admin'))
                        <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin')" class="text-white hover:text-gray-200 font-semibold">
                            {{ __('Admin') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white hover:bg-red-700 focus:outline-none transition">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="ml-2 h-4 w-4 fill-current text-white" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0L5.293 8.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Enhanced Mobile Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" 
                        class="relative p-2 rounded-lg text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50 transition-all duration-300 transform hover:scale-105">
                    <!-- Hamburger Icon with Animation -->
                    <div class="w-6 h-6 relative">
                        <span :class="open ? 'rotate-45 translate-y-2' : ''" 
                              class="absolute top-0 left-0 w-6 h-0.5 bg-white transform transition-all duration-300 ease-in-out"></span>
                        <span :class="open ? 'opacity-0' : 'opacity-100'" 
                              class="absolute top-2.5 left-0 w-6 h-0.5 bg-white transform transition-all duration-300 ease-in-out"></span>
                        <span :class="open ? '-rotate-45 -translate-y-2' : ''" 
                              class="absolute top-5 left-0 w-6 h-0.5 bg-white transform transition-all duration-300 ease-in-out"></span>
                    </div>
                    <!-- Notification Badge -->
                    <div class="absolute -top-1 -right-1 w-3 h-3 bg-yellow-400 rounded-full animate-pulse"></div>
                </button>
            </div>
        </div>
    </div>

    <!-- Enhanced Responsive Menu -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform -translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-2"
         class="sm:hidden bg-gradient-to-b from-white to-gray-50 border-t border-red-200 shadow-lg">
        
        <!-- Navigation Links -->
        <div class="px-4 py-2 space-y-1">
            <a href="{{ route('dashboard') }}" 
               class="flex items-center px-4 py-3 rounded-lg text-gray-700 hover:bg-red-50 hover:text-red-600 transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-red-50 text-red-600 border-l-4 border-red-600' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v3H8V5z" />
                </svg>
                {{ __('Dashboard') }}
            </a>
            
            <a href="{{ route('class') }}" 
               class="flex items-center px-4 py-3 rounded-lg text-gray-700 hover:bg-red-50 hover:text-red-600 transition-all duration-200 {{ request()->routeIs('class') ? 'bg-red-50 text-red-600 border-l-4 border-red-600' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                {{ __('Classes') }}
            </a>
            
            <a href="{{ route('forum.index') }}" 
               class="flex items-center px-4 py-3 rounded-lg text-gray-700 hover:bg-red-50 hover:text-red-600 transition-all duration-200 {{ request()->routeIs('forum.*') ? 'bg-red-50 text-red-600 border-l-4 border-red-600' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                </svg>
                {{ __('Forum') }}
            </a>
            
            @if (Auth::user()->roles->contains('name', 'admin'))
            <a href="{{ route('admin.index') }}" 
               class="flex items-center px-4 py-3 rounded-lg text-gray-700 hover:bg-red-50 hover:text-red-600 transition-all duration-200 {{ request()->routeIs('admin.*') ? 'bg-red-50 text-red-600 border-l-4 border-red-600' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                {{ __('Admin') }}
            </a>
            @endif
        </div>
        
        <!-- User Profile Section -->
        <div class="border-t border-gray-200 bg-gray-50 px-4 py-4">
            <div class="flex items-center space-x-3 mb-4">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full border-2 border-red-200" 
                         src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=dc2626&color=fff&size=40" 
                         alt="{{ Auth::user()->name }}">
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-gray-900 truncate">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                    <p class="text-xs text-red-600 font-medium">{{ Auth::user()->programStudi->nama_prodi ?? 'Student' }}</p>
                </div>
            </div>
            
            <!-- Profile Actions -->
            <div class="space-y-2">
                <a href="{{ route('profile') }}" 
                   class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-white hover:text-red-600 rounded-lg transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    {{ __('Profile') }}
                </a>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                            class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
