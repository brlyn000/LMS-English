<x-admin-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Daftar Nilai Mahasiswa</h1>
                <div class="flex items-center mt-2">
                    <span class="text-red-600 font-medium">Teknologi Mesin</span>
                    <span class="mx-2 text-gray-400">|</span>
                    <span class="text-sm text-gray-500">{{ $students->count() }} Mahasiswa</span>
                </div>
            </div>
            <div class="mt-4 md:mt-0">
                <div class="relative">
                    <input type="text" placeholder="Cari mahasiswa..." 
                           class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute left-3 top-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-gradient-to-r from-red-50 to-white p-4 rounded-xl shadow border border-gray-100">
                <h3 class="text-sm font-medium text-gray-500">Rata-rata Kelas</h3>
                <p class="text-2xl font-bold text-red-600 mt-1">
                    {{ $students->flatMap->submissions->count() > 0 ? number_format($students->flatMap->submissions->avg('score'), 2) : '0.00' }}
                </p>
            </div>
            <div class="bg-gradient-to-r from-blue-50 to-white p-4 rounded-xl shadow border border-gray-100">
                <h3 class="text-sm font-medium text-gray-500">Nilai Tertinggi</h3>
                <p class="text-2xl font-bold text-blue-600 mt-1">
                    {{ $students->flatMap->submissions->count() > 0 ? number_format($students->flatMap->submissions->max('score'), 2) : '0.00' }}
                </p>
            </div>
            <div class="bg-gradient-to-r from-green-50 to-white p-4 rounded-xl shadow border border-gray-100">
                <h3 class="text-sm font-medium text-gray-500">Lulus</h3>
                <p class="text-2xl font-bold text-green-600 mt-1">
                    {{ $students->filter(fn($s) => $s->submissions->count() > 0 && $s->submissions->avg('score') >= 75)->count() }}
                    <span class="text-sm font-normal">mahasiswa</span>
                </p>
            </div>
            <div class="bg-gradient-to-r from-yellow-50 to-white p-4 rounded-xl shadow border border-gray-100">
                <h3 class="text-sm font-medium text-gray-500">Perlu Perbaikan</h3>
                <p class="text-2xl font-bold text-yellow-600 mt-1">
                    {{ $students->filter(fn($s) => $s->submissions->count() == 0 || $s->submissions->avg('score') < 75)->count() }}
                    <span class="text-sm font-normal">mahasiswa</span>
                </p>
            </div>
        </div>

        <!-- Main Table -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gradient-to-r from-red-50 to-white">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-red-700 uppercase tracking-wider">
                                Mahasiswa
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-red-700 uppercase tracking-wider">
                                Kontak
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-red-700 uppercase tracking-wider">
                                Rata-rata
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-red-700 uppercase tracking-wider">
                                Detail Nilai
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($students as $student)
                        @php
                            $avgScore = $student->submissions->count() > 0 ? $student->submissions->avg('score') : 0;
                            $statusColor = $avgScore >= 75 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800';
                        @endphp
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <!-- Student Name Column -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-red-100 rounded-full flex items-center justify-center">
                                        <span class="text-red-600 font-medium">{{ substr($student->name, 0, 1) }}</span>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $student->name }}</div>
                                        <div class="text-sm text-gray-500">NIM: {{ $student->nim ?? '-' }}</div>
                                    </div>
                                </div>
                            </td>
                            
                            <!-- Contact Column -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $student->email }}</div>
                                <div class="text-sm text-gray-500">{{ $student->phone ?? '-' }}</div>
                            </td>
                            
                            <!-- Average Score Column -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="px-3 py-1 rounded-full text-sm font-medium {{ $statusColor }}">
                                        {{ number_format($avgScore, 2) }}
                                    </span>
                                    <div class="ml-4 w-24">
                                        <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                            <div class="h-full {{ $avgScore >= 75 ? 'bg-green-500' : 'bg-red-500' }}" 
                                                 style="width: {{ min($avgScore, 100) }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            
                            <!-- Score Details Column -->
                            <td class="px-6 py-4">
                                <div class="space-y-2">
                                    @forelse($student->submissions as $submission)
                                    <div class="flex justify-between items-center">
                                        <div class="text-sm text-gray-700 truncate max-w-xs">
                                            {{ $submission->material->title ?? 'Tugas' }}
                                        </div>
                                        <span class="text-sm font-medium 
                                            {{ $submission->score >= 75 ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $submission->score ?? 0 }}
                                        </span>
                                    </div>
                                    @empty
                                    <div class="text-sm text-gray-500 italic">
                                        Belum ada submission
                                    </div>
                                    @endforelse
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <div class="text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-4 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                    <p class="text-lg font-medium">Belum ada mahasiswa</p>
                                    <p class="text-sm">Data mahasiswa Teknologi Mesin akan muncul di sini</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>