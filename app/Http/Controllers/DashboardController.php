<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Mahasiswa;

class DashboardController extends Controller
{
    public function index()
    {
        // Get recent contacts
        $recentContacts = Contact::orderBy('created_at', 'desc')
            ->where('is_read', false)
            ->take(5)
            ->get();
        
        // Get total unread contacts
        $unreadContacts = Contact::where('is_read', false)->count();
        
        // Get total contacts
        $totalContacts = Contact::count();
        
        // Get total students
        $totalStudents = Mahasiswa::count();

        return view('backend.dashboard.dashboard', compact(
            'recentContacts',
            'unreadContacts',
            'totalContacts',
            'totalStudents'
        ));
    }
}
