<x-app-layout>
    <x-slot name="header">
        <x-dashboard-user.header>
            {{ __('Dashboard') }}
        </x-dashboard-user.header>
    </x-slot>

    <div class="bg-gradient-to-b from-red-50 to-white min-h-screen py-12 -mt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
            
            <x-dashboard-user.profile-card 
                :course-completion="$courseCompletion" 
                :assignment-submission="$assignmentSubmission" 
                :forum-participation="$forumParticipation"
                :card-home="$card_home"
                :materials="$materials"
            />

            <div class="space-y-8">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                    <h3 class="text-2xl font-bold text-gray-800 border-l-4 border-red-600 pl-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        Your Learning Resources
                    </h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($card_home as $card)
                        <x-dashboard-user.card-content :card="$card" />
                    @endforeach
                </div>
            </div>

            <x-recent-activity :activities="$activities" />

        </div>
    </div>
</x-app-layout>