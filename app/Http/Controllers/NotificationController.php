<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class NotificationController extends Controller
{
    /**
     * Get all notifications
     */
    public function index(): JsonResponse
    {
        $notifications = Notification::orderBy('created_at', 'desc')->get();
        
        return response()->json([
            'notifications' => $notifications,
            'unread_count' => Notification::unread()->count()
        ]);
    }

    /**
     * Get unread notifications
     */
    public function unread(): JsonResponse
    {
        $notifications = Notification::unread()->orderBy('created_at', 'desc')->get();
        
        return response()->json([
            'notifications' => $notifications,
            'unread_count' => $notifications->count()
        ]);
    }

    /**
     * Mark notification as read
     */
    public function markAsRead($id): JsonResponse
    {
        $notification = Notification::findOrFail($id);
        $notification->markAsRead();
        
        return response()->json([
            'success' => true,
            'message' => 'Notification marked as read'
        ]);
    }

    /**
     * Mark all notifications as read
     */
    public function markAllAsRead(): JsonResponse
    {
        Notification::unread()->update(['is_read' => true]);
        
        return response()->json([
            'success' => true,
            'message' => 'All notifications marked as read'
        ]);
    }

    /**
     * Create a new notification
     */
    public static function createNotification($title, $message, $type = 'info', $data = null): Notification
    {
        return Notification::create([
            'title' => $title,
            'message' => $message,
            'type' => $type,
            'data' => $data
        ]);
    }

    /**
     * Create notification for new registration
     */
    public static function createRegistrationNotification($pendaftarName): Notification
    {
        return self::createNotification(
            'Pendaftar Baru',
            "Pendaftar baru dengan nama {$pendaftarName} telah mendaftar",
            'info',
            [
                'pendaftar_name' => $pendaftarName,
                'timestamp' => now()->toISOString()
            ]
        );
    }


}
