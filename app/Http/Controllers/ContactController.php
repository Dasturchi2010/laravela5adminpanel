<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('backend.Contact.index' , compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.Contact.create' , compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:256',
            'email'=>'required|max:100|email',
            'phone'=>'required|max:50',
            'message'=>'required|max:2000',
        ]);

        Contact::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'message'=> $request->message,
        ]);

        return redirect()->route('contacts.index')->with('create', "Yangi Contact qo'shildi");

    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('backend.Contact.show' , compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('backend.Contact.edit' , compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name'=>'required|max:256',
            'email'=>'required|max:100|email',
            'phone'=>'required|max:50',
            'message'=>'required|max:2000',
        ]);

        $contact->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'message'=> $request->message,
        ]);

        return redirect()->route('contacts.index')->with('update', "Contact yangilandi");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('delete', "Siz 1 ta contactni o'chirdingiz");
    }
}
