<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Group;
use App\Models\PhoneNumber;

class DashboardController extends Controller
{
    public function index()
    {
        $totalContacts = Contact::count();

        $totalGroups = Group::count();

        $totalPhoneNumbers = PhoneNumber::count();

        $recentContacts = Contact::with('group')
            ->latest()
            ->take(5)
            ->get();

        $groups = Group::withCount('contacts')
            ->orderByDesc('contacts_count')
            ->get();

        return view('dashboard', compact(
            'totalContacts',
            'totalGroups',
            'totalPhoneNumbers',
            'recentContacts',
            'groups'
        ));
    }
}

