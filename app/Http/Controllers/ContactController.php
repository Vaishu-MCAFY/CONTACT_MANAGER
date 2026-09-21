<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::with([
            'group',
            'phoneNumbers'
        ]);

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%");

            });
        }

        if ($request->filled('group_id')) {

            $query->where(
                'group_id',
                $request->group_id
            );
        }

        $contacts = $query
            ->latest()
            ->get();

        $groups = Group::orderBy('name')->get();

        return view(
            'contacts.index',
            compact(
                'contacts',
                'groups'
            )
        );
    }

    public function create()
    {
        $groups = Group::orderBy('name')->get();

        return view(
            'contacts.create',
            compact('groups')
        );
    }


    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|string|max:255',

            'email' => 'nullable|email|max:255',

            'address' => 'nullable|string',

            'group_id' => 'nullable|exists:groups,id',

            'phone_numbers' => 'required|array|min:1',

            'phone_numbers.*' =>
                'required|string|max:20',

            'phone_labels' => 'required|array',

            'phone_labels.*' =>
                'required|string|max:50',

        ]);


        $contact = Contact::create([

            'name' => $request->name,

            'email' => $request->email,

            'phone' => $request->phone_numbers[0],

            'address' => $request->address,

            'group_id' => $request->group_id,

        ]);


        foreach (
            $request->phone_numbers
            as $index => $phone
        ) {

            $label =
                $request->phone_labels[$index]
                ?? 'Personal';

            $contact->phoneNumbers()->create([

                'label' => $label,

                'phone' => $phone,

            ]);
        }

        return redirect()
            ->route(
                'contacts.show',
                $contact
            )
            ->with(
                'success',
                'Contact added successfully!'
            );
    }

    public function show(Contact $contact)
    {
        $contact->load([
            'group',
            'phoneNumbers'
        ]);

        return view(
            'contacts.show',
            compact('contact')
        );
    }

    public function edit(Contact $contact)
    {
        $contact->load('phoneNumbers');

        $groups = Group::orderBy('name')->get();

        return view(
            'contacts.edit',
            compact(
                'contact',
                'groups'
            )
        );
    }

    public function update(
        Request $request,
        Contact $contact
    ) {

        $request->validate([

            'name' => 'required|string|max:255',

            'email' => 'nullable|email|max:255',

            'address' => 'nullable|string',

            'group_id' => 'nullable|exists:groups,id',

            'phone_numbers' => 'required|array|min:1',

            'phone_numbers.*' =>
                'required|string|max:20',

            'phone_labels' => 'required|array',

            'phone_labels.*' =>
                'required|string|max:50',

        ]);


        $contact->update([

            'name' => $request->name,

            'email' => $request->email,

            'phone' => $request->phone_numbers[0],

            'address' => $request->address,

            'group_id' => $request->group_id,

        ]);


        $contact->phoneNumbers()->delete();

        foreach (
            $request->phone_numbers
            as $index => $phone
        ) {

            $label =
                $request->phone_labels[$index]
                ?? 'Personal';

            $contact->phoneNumbers()->create([

                'label' => $label,

                'phone' => $phone,

            ]);
        }

        return redirect()
            ->route(
                'contacts.show',
                $contact
            )
            ->with(
                'success',
                'Contact updated successfully!'
            );
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()
            ->route('contacts.index')
            ->with(
                'success',
                'Contact deleted successfully!'
            );
    }
}
