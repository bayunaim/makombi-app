<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationPageController extends Controller
{
    /**
     * Display the notifications page
     */
    public function index()
    {
        $notifications = Notification::orderBy('created_at', 'desc')->paginate(20);
        $unreadCount = Notification::unread()->count();
        $totalCount = Notification::count();
        $readCount = Notification::read()->count();
        
        return view('backend.notifications.index', compact('notifications', 'unreadCount', 'totalCount', 'readCount'));
    }

    /**
     * Mark notification as read and redirect to appropriate page
     */
    public function markAsReadAndRedirect($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->markAsRead();
        
        // Get the notification data to determine where to redirect
        $data = $notification->data ?? [];
        
        // If it's a registration notification, redirect to pendaftar list
        if (str_contains($notification->title, 'Pendaftar Baru')) {
            return redirect()->route('pendaftar.index')->with('success', 'Notification marked as read');
        }
        
        // If it's an acceptance notification, redirect to diterima list
        if (str_contains($notification->title, 'Pendaftar Diterima')) {
            return redirect()->route('pendaftar.diterima.index')->with('success', 'Notification marked as read');
        }

        // If it's a new contact message notification, redirect to contact detail
        if (str_contains($notification->title, 'Pesan Kontak Baru')) {
            $contactId = $data['contact_id'] ?? null;
            if ($contactId) {
                return redirect()->route('contact.show', $contactId)->with('success', 'Notification marked as read');
            }
            return redirect()->route('contact.index')->with('success', 'Notification marked as read');
        }
        
        // Default redirect to notifications page
        return redirect()->route('notifications.page')->with('success', 'Notification marked as read');
    }

    /**
     * Mark all notifications as read
     */
    public function markAllAsRead()
    {
        Notification::unread()->update(['is_read' => true]);
        
        return redirect()->route('notifications.page')->with('success', 'All notifications marked as read');
    }

    /**
     * Delete a notification
     */
    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();
        
        return redirect()->route('notifications.page')->with('success', 'Notification deleted successfully');
    }
}
