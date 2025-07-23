<div class="relative group transform hover:-translate-y-1 transition-transform duration-300">
    <!-- Glow effect on hover -->
    <div class="absolute -inset-0.5 bg-gradient-to-r from-red-600 to-blue-800 rounded-xl blur opacity-0 group-hover:opacity-75 transition-opacity duration-300"></div>
    
    <div class="relative bg-white rounded-xl shadow-md overflow-hidden h-full border border-gray-100 hover:shadow-xl transition-all duration-300">
        <!-- Class header with gradient -->
        <div class="h-48 bg-gradient-to-r from-red-500 to-red-700 flex items-center justify-center overflow-hidden relative">
            @if($card->image)
                <img src="{{ asset('storage/' . $card->image) }}" alt="{{ $card->name }}" 
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
            @else
                <div class="text-white text-4xl font-bold">{{ substr($card->name, 0, 1) }}</div>
            @endif
            <!-- Status badge -->
            <div class="absolute top-3 right-3">
                <span class="bg-red-100 text-black text-xs font-semibold px-2.5 py-0.5 rounded-full shadow">
                    {{ $card->status }}
                </span>
            </div>
        </div>
        
        <!-- Class content -->
        <div class="p-6">
            <div class="flex justify-between items-start">
                <h5 class="text-lg font-bold text-gray-800">{{ $card->name }}</h5>
                <!-- Instructor info -->
                <div class="flex-shrink-0 ml-3">
                    <div class="flex items-center">
                        <span class="text-xs text-gray-500 mr-1">By</span>
                        <div class="h-6 w-6 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                            <span class="text-xs font-medium text-gray-700">
                                {{ substr($card->Instructor ?? 'Instructor', 0, 1) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
            <p class="mt-2 text-gray-600 text-sm line-clamp-2">{{ $card->description }}</p>
            
            <!-- Meta information -->
            <div class="mt-4 flex items-center justify-between text-xs text-gray-500">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ $card->schedule }}</span>
                </div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span>{{ $card->students_count }} Students</span>
                </div>
            </div>
            
            <!-- Action button -->
            <div class="mt-6">
                <a href="{{ url($card->link) }}" 
                    class="w-full inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white text-sm font-medium rounded-lg shadow-sm transition-all duration-300 transform group-hover:scale-105">
                    Enter Class
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>