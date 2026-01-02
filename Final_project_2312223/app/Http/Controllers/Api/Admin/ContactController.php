<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    // Frontend form submission
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        Contact::create($request->only('name','email','message'));

        return back()->with('success', 'Message sent successfully!');
    }

    // Admin: list all contacts
    public function index()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }

    // Admin: show single contact
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contacts.show', compact('contact'));
    }

    // Admin: delete contact
    public function destroy($id)
    {
        Contact::destroy($id);
        return back()->with('success', 'Contact deleted successfully');
    }
}
