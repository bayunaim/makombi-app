<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\NotificationController;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        // Create a dashboard notification for new contact message
        NotificationController::createNotification(
            'Pesan Kontak Baru',
            "Pesan baru dari {$request->name} dengan subjek '{$request->subject}'.",
            'info',
            [
                'contact_id' => $contact->id,
                'name' => $contact->name,
                'email' => $contact->email,
                'subject' => $contact->subject,
                'timestamp' => now()->toISOString()
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Pesan Anda telah berhasil dikirim!'
        ]);
    }

    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.contact.index', compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update(['is_read' => true]);
        
        // Optionally, mark related notification as read if exists
        // This requires a loose match on title and subject since we don't store relation
        try {
            \App\Models\Notification::where('title', 'Pesan Kontak Baru')
                ->where('is_read', false)
                ->whereJsonContains('data->contact_id', $contact->id)
                ->update(['is_read' => true]);
        } catch (\Throwable $e) {
            // fail silently
        }
        return view('backend.contact.show', compact('contact'));
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        
        return redirect()->route('contact.index')->with('success', 'Pesan berhasil dihapus');
    }
}
