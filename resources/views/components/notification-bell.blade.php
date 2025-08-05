<div class="relative" x-data="{ open: false, notifications: [] }" x-init="fetchNotifications()">
    <button @click="open = !open" class="relative p-2 text-gray-600 hover:text-red-600 transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
        <span x-show="notifications.length > 0" class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center" x-text="notifications.length"></span>
    </button>
    
    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg border z-50">
        <div class="p-4 border-b">
            <h3 class="font-semibold text-gray-800">Notifikasi</h3>
        </div>
        <div class="max-h-96 overflow-y-auto">
            <template x-for="notification in notifications" :key="notification.id">
                <div class="p-4 border-b hover:bg-gray-50 cursor-pointer" @click="markAsRead(notification.id)">
                    <p class="text-sm text-gray-800" x-text="notification.data.message"></p>
                    <p class="text-xs text-gray-500 mt-1" x-text="new Date(notification.created_at).toLocaleString()"></p>
                </div>
            </template>
            <div x-show="notifications.length === 0" class="p-4 text-center text-gray-500">
                Tidak ada notifikasi baru
            </div>
        </div>
    </div>
    
    <script>
        function fetchNotifications() {
            fetch('/api/notifications')
                .then(response => response.json())
                .then(data => {
                    this.notifications = data;
                });
        }
        
        function markAsRead(id) {
            fetch(`/api/notifications/${id}/read`, { method: 'POST' })
                .then(() => {
                    this.notifications = this.notifications.filter(n => n.id !== id);
                });
        }
        
        // Auto refresh setiap 30 detik
        setInterval(() => {
            fetchNotifications();
        }, 30000);
    </script>
</div>