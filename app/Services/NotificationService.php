<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class NotificationService
{
    public static function create($type, $data)
    {
        DB::table('notifications')->insert([
            'type' => $type,
            'data' => json_encode($data),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    
    public static function getUnread($limit = 10)
    {
        return DB::table('notifications')
            ->whereNull('read_at')
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get()
            ->map(function ($notification) {
                $notification->data = json_decode($notification->data, true);
                return $notification;
            });
    }
    
    public static function markAsRead($id)
    {
        DB::table('notifications')
            ->where('id', $id)
            ->update(['read_at' => now()]);
    }
}