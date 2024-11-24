<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('backend.Service.index' , compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return view('backend.Service.create' , compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon_name' => 'required|string|max:255',
        ]);

        $service = Service::create([
         'title' => $request->title,
         'icon_name' => $request->icon_name,
        ]);
        return redirect()->route('services.index')->with('create', "Yangi Service qo'shildi");
    }


    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('backend.Service.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('backend.Service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'icon_name' => ['required', 'string', 'max:255'],
        ]);

        $service->update([
            'title' => $request->title,
            'icon_name' =>  $request->icon_name,
        ]);

        return redirect()->route('services.index')->with('update', "Service ma'lumoti yangilandi");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('delete', "Siz 1 ta service o'chirdingiz");
    }
}
