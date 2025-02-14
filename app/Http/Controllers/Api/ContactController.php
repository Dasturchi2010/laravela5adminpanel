<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts =  DB::table('contacts')->select('id', 'name', 'email' , 'phone', 'message')->orderByDesc('id')->get();
        $contacts_count = $contacts->count();
        return[
            "count"=>$contacts_count,
            "contacts"=>$contacts,
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

        $contact = Contact::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'message'=> $request->message,
        ]);

        return[
            'message' => "Ma'lumot qoshildi",
            'contact' => $contact
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $contact = Contact::find($id);
            if ($contact) {
                return $contact;
            } else {
                return "Topilmadi";
            }
        } catch (\Exception $e) {
            return "Topilmadi";
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request ,  $id)
    {
        try {
            $contact = Contact::find($id);
            if ($contact) {
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

                return[
                    'message' => "Update Success",
                    'contact' => $contact
                ];
            } else {
                return "Topilmadi";
            }
        } catch (\Exception $e) {
            return "Topilmadi";
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        try {
            $contact = Contact::find($id);
            if ($contact) {
                $contact->delete();
                return "Ma'lumot o'chirildi";
            } else {
                return "Topilmadi";
            }
        } catch (\Exception $e) {
            return "Topilmadi";
        }

    }

}
