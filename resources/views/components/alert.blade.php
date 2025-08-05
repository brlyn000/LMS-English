@props(['type' => 'error', 'message'])

@php
$classes = [
    'error' => 'bg-red-50 border border-red-200 text-red-800',
    'success' => 'bg-green-50 border border-green-200 text-green-800',
    'warning' => 'bg-yellow-50 border border-yellow-200 text-yellow-800',
    'info' => 'bg-blue-50 border border-blue-200 text-blue-800'
];
@endphp

<div class="rounded-lg p-4 mb-4 {{ $classes[$type] }}">
    <div class="flex items-center">
        @if($type === 'error')
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
            </svg>
        @endif
        <span class="font-medium">{{ $message }}</span>
    </div>
</div>