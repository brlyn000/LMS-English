<?php

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

function logActivity($activity, $description = null)
{
    $userId = Auth::id();

    ActivityLog::create([
        'user_id' => $userId,
        'activity' => $activity,
        'description' => $description,
    ]);

    // Hapus log lama, sisakan 50 terbaru
    $oldLogIds = ActivityLog::where('user_id', $userId)
        ->orderBy('created_at', 'desc')
        ->offset(7)
        ->limit(10000)
        ->pluck('id');

    if ($oldLogIds->isNotEmpty()) {
        ActivityLog::whereIn('id', $oldLogIds)->delete();
    }
}