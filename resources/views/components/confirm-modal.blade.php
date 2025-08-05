@props(['id', 'title' => 'Konfirmasi', 'message' => 'Apakah Anda yakin?', 'confirmText' => 'Ya, Hapus', 'cancelText' => 'Batal'])

<div id="{{ $id }}" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4 transform transition-all">
        <div class="p-6">
            <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4 bg-red-100 rounded-full">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 text-center mb-2">{{ $title }}</h3>
            <p class="text-gray-600 text-center mb-6">{{ $message }}</p>
            <div class="flex space-x-3">
                <button type="button" onclick="closeConfirmModal('{{ $id }}')" 
                    class="flex-1 px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors">
                    {{ $cancelText }}
                </button>
                <button type="button" onclick="confirmAction('{{ $id }}')" 
                    class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                    {{ $confirmText }}
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function showConfirmModal(modalId, action) {
    const modal = document.getElementById(modalId);
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    modal.dataset.action = action;
}

function closeConfirmModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function confirmAction(modalId) {
    const modal = document.getElementById(modalId);
    const action = modal.dataset.action;
    if (action) {
        if (action.startsWith('http')) {
            window.location.href = action;
        } else {
            eval(action);
        }
    }
    closeConfirmModal(modalId);
}
</script>