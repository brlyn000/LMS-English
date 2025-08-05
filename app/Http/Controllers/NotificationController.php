<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = NotificationService::getUnread();
        return response()->json($notifications);
    }
    
    public function markAsRead($id)
    {
        NotificationService::markAsRead($id);
        return response()->json(['success' => true]);
    }
}