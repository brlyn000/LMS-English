<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found | {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        .bg-radial-gradient {
            background: radial-gradient(ellipse at bottom, rgba(255,255,255,1) 0%, rgba(254,226,226,0.8) 100%);
        }
        .text-stroke {
            -webkit-text-stroke: 1.5px rgba(239, 68, 68, 0.2);
            text-stroke: 1.5px rgba(239, 68, 68, 0.2);
        }
        .floating {
            animation: floating 6s ease-in-out infinite;
        }
        .floating-delay-1 {
            animation-delay: 1s;
        }
        .floating-delay-2 {
            animation-delay: 2s;
        }
        .floating-delay-3 {
            animation-delay: 3s;
        }
        @keyframes floating {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(2deg); }
        }
        .pulse {
            animation: pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        .spin {
            animation: spin 12s linear infinite;
        }
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="font-sans antialiased bg-white text-gray-800 min-h-full flex items-center justify-center bg-radial-gradient overflow-hidden">
    <!-- Main Container -->
    <div class="max-w-6xl mx-auto px-6 py-12 text-center relative z-10">
        <!-- Animated 404 Text -->
        <div class="relative mb-6">
            <h1 class="text-[180px] md:text-[240px] font-bold text-gray-100 text-stroke tracking-tighter leading-none select-none">403</h1>
            <div class="absolute inset-0 flex flex-col items-center justify-center">
                <h2 class="text-4xl md:text-6xl font-bold text-red-600 mb-2 font-playfair">Lost in the Digital Access</h2>
                <div class="w-24 h-1 bg-red-400 my-4"></div>
                <p class="text-xl text-gray-600 max-w-lg">You do not have access to this page</p>
            </div>
        </div>

        <!-- Central Illustration -->
        <div class="relative w-80 h-80 mx-auto mb-12">
            <!-- Floating Elements -->
            <div class="absolute top-0 left-0 w-full h-full">
                <!-- Main Circle -->
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-red-500 rounded-full opacity-10 blur-xl pulse"></div>
                
                <!-- Decorative Elements -->
                <div class="absolute top-10 left-10 w-16 h-16 bg-red-100 rounded-full opacity-20 floating"></div>
                <div class="absolute top-4 right-8 w-12 h-12 bg-red-200 rounded-full opacity-15 floating floating-delay-1"></div>
                <div class="absolute bottom-6 left-6 w-14 h-14 bg-red-300 rounded-full opacity-20 floating floating-delay-2"></div>
                <div class="absolute bottom-10 right-10 w-10 h-10 bg-red-400 rounded-full opacity-15 floating floating-delay-3"></div>
                
                <!-- Magnifying Glass -->
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10">
                    <div class="relative">
                        <div class="w-40 h-40 rounded-full border-4 border-red-400 flex items-center justify-center">
                            <div class="w-32 h-32 rounded-full border-4 border-red-300"></div>
                        </div>
                        <div class="absolute top-1/2 left-1/2 w-8 h-8 bg-red-500 rounded-full transform -translate-x-1/2 -translate-y-1/2"></div>
                        <div class="absolute top-3/4 left-3/4 w-16 h-2 bg-red-400 transform rotate-45 origin-top-left"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Message and Actions -->
        <div class="max-w-2xl mx-auto mb-16 relative">
            <!-- Animated Decorations -->
            <div class="absolute -top-8 -left-8 w-16 h-16 border-2 border-red-200 rounded-full opacity-30 spin"></div>
            <div class="absolute -bottom-8 -right-8 w-12 h-12 border-2 border-red-200 rounded-full opacity-30 spin" style="animation-direction: reverse;"></div>
            
            <h3 class="text-3xl font-semibold text-gray-800 mb-4">Unauthorized</h3>
            <p class="text-gray-600 mb-8 text-lg leading-relaxed">
                The digital world is vast, and sometimes we can't access it. Let us guide you back to the territory that has been provided.
            </p>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row justify-center gap-6">
                <a href="{{ url('/') }}" 
                   class="px-8 py-4 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-medium rounded-xl shadow-xl transition-all transform hover:-translate-y-1 hover:shadow-2xl flex items-center justify-center space-x-3 group">
                    <i class="fas fa-home text-xl group-hover:scale-110 transition-transform"></i>
                    <span class="text-lg">Return to Homepage</span>
                </a>
                <a href="" 
                   class="px-8 py-4 bg-white hover:bg-gray-50 border-2 border-gray-200 text-gray-700 font-medium rounded-xl shadow-lg transition-all transform hover:-translate-y-1 hover:shadow-xl flex items-center justify-center space-x-3 group">
                    <i class="fas fa-life-ring text-xl text-red-500 group-hover:rotate-12 transition-transform"></i>
                    <span class="text-lg">Get Assistance</span>
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-20 text-sm text-gray-500 relative">
            <div class="absolute -top-10 left-1/2 transform -translate-x-1/2 w-32 h-1 bg-gradient-to-r from-transparent via-red-300 to-transparent"></div>
            <p>© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            <div class="flex justify-center space-x-6 mt-4">
                <a href="" class="hover:text-red-600 transition-colors flex items-center">
                    <i class="fas fa-file-contract mr-2"></i> Terms
                </a>
                <a href="" class="hover:text-red-600 transition-colors flex items-center">
                    <i class="fas fa-lock mr-2"></i> Privacy
                </a>
                <a href="" class="hover:text-red-600 transition-colors flex items-center">
                    <i class="fas fa-question-circle mr-2"></i> Help Center
                </a>
            </div>
        </div>
    </div>

    <!-- Advanced Background Elements -->
    <div class="fixed inset-0 overflow-hidden z-0 pointer-events-none">
        <!-- Floating Particles -->
        @for($i = 0; $i < 20; $i++)
            <div class="absolute 
                top-{{ rand(0, 100) }} 
                left-{{ rand(0, 100) }} 
                w-{{ rand(2, 6) }} 
                h-{{ rand(2, 6) }} 
                bg-red-{{ rand(100, 300) }} 
                rounded-full 
                opacity-{{ rand(5, 20) / 100 }} 
                floating 
                animation-delay-{{ rand(0, 4000) }}"
                style="animation-duration: {{ rand(5, 15) }}s;"></div>
        @endfor

        <!-- Geometric Shapes -->
        <div class="absolute top-1/4 left-10 w-32 h-32 border-4 border-red-100 rounded-full opacity-10 floating"></div>
        <div class="absolute bottom-1/3 right-20 w-40 h-40 border-4 border-red-100 rotate-45 opacity-5 floating floating-delay-2"></div>
        <div class="absolute top-20 right-1/4 w-24 h-24 border-4 border-red-200 rounded-full opacity-15 spin" style="animation-duration: 20s;"></div>
    </div>

    <!-- Confetti Animation (will be triggered by JavaScript) -->
    <canvas id="confetti-canvas" class="fixed top-0 left-0 w-full h-full pointer-events-none z-0"></canvas>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
    <script>
        // Trigger confetti animation on page load
        document.addEventListener('DOMContentLoaded', function() {
            const count = 200;
            const defaults = {
                origin: { y: 0.6 },
                colors: ['#ef4444', '#f87171', '#fca5a5', '#fee2e2'],
                shapes: ['circle', 'square'],
                spread: 70,
                ticks: 100
            };

            function fire(particleRatio, opts) {
                confetti({
                    ...defaults,
                    ...opts,
                    particleCount: Math.floor(count * particleRatio)
                });
            }

            // First burst
            fire(0.25, {
                spread: 26,
                startVelocity: 55,
            });
            fire(0.2, {
                spread: 60,
            });
            fire(0.35, {
                spread: 100,
                decay: 0.91,
                scalar: 0.8
            });
            fire(0.1, {
                spread: 120,
                startVelocity: 25,
                decay: 0.92,
                scalar: 1.2
            });
            fire(0.1, {
                spread: 120,
                startVelocity: 45,
            });

            // Continuous subtle animation
            const interval = setInterval(() => {
                fire(0.05, {
                    spread: 30,
                    startVelocity: 30,
                    ticks: 50
                });
            }, 5000);

            // Cleanup
            return () => clearInterval(interval);
        });

        // Floating animation for decorative elements
        document.querySelectorAll('.floating').forEach(el => {
            const duration = 6 + Math.random() * 6;
            const delay = Math.random() * 5;
            el.style.animationDuration = `${duration}s`;
            el.style.animationDelay = `${delay}s`;
        });
    </script>
    @endpush
</body>
</html>