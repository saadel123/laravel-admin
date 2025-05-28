<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('admin.contacts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'object' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        Contact::create($validated);

        return redirect()->route('admin.contacts.index')->with('success', 'Contact créé avec succès.');
    }

    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'object' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        $contact->update($validated);

        return redirect()->route('admin.contacts.index')->with('success', 'Contact mis à jour avec succès.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('error', 'Contact supprimé avec succès.');
    }

}
