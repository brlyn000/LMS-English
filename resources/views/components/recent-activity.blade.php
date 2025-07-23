            <div class="bg-white rounded-xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
                <div class="px-6 py-5 border-b border-gray-200 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        Recent Activity
                    </h3>
                </div>
                
                <div class="divide-y divide-gray-200">
                    <ul class="p-6">
                        @foreach($activities as $activity)
                        <li class="relative pb-6 pl-8 last:pb-0 group">
                            <!-- Timeline dot -->
                            <div class="absolute left-0 top-1 h-4 w-4 rounded-full bg-red-500 border-4 border-white shadow-sm"></div>
                            
                            <!-- Timeline line -->
                            <div class="absolute left-2 top-5 bottom-0 w-0.5 bg-gray-200 group-last:hidden"></div>
                            
                            <div class="flex items-start">
                                <!-- Activity icon -->
                                <div class="flex-shrink-0 bg-red-100 p-2 rounded-lg mr-4 transform group-hover:scale-110 transition-transform">
                                    <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                
                                <!-- Activity content -->
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900">{{ $activity->activity }}</p>
                                    @if($activity->description)
                                        <p class="mt-1 text-sm text-gray-500">
                                            {{ $activity->description }}
                                        </p>
                                    @endif
                                    <p class="mt-1 text-xs text-gray-400 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        {{ $activity->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>