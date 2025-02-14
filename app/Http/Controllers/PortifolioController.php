<?php

namespace App\Http\Controllers;

use App\Models\Portifolio;
use Illuminate\Http\Request;

class PortifolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $portifolios = Portifolio::orderByDesc('id')->get();
        return view('backend.Portifolio.index' , compact('portifolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $portifolios = Portifolio::all();
        return view('backend.Portifolio.create' , compact('portifolios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'img' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
            'link' => ['nullable'],
        ]);


        $path = null;
        if ($request->hasFile('img')) {
            $path = $request->file('img')->store('portifolios', 'public');
        }


        Portifolio::create([
            'img' => $path,
            'link' => $request->link,
        ]);

        return redirect()->route('portifolios.index')->with('create', "Yangi portifolio qo'shildi");
    }

    /**
     * Display the specified resource.
     */
    public function show(Portifolio $portifolio)
    {
        return view('backend.Portifolio.show', compact('portifolio'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portifolio $portifolio)
    {
        return view('backend.Portifolio.edit', compact('portifolio'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portifolio $portifolio)
    {
        $request->validate([
            'img' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
            'link' => ['nullable'],
        ]);


        $path = null;
        if ($request->hasFile('img')) {
            $path = $request->file('img')->store('portifolios', 'public');
        }else{
            $path = $portifolio->image;
        }


        $portifolio->update([
            'img' => $path,
            'link' => $request->link,
        ]);

        return redirect()->route('portifolios.index')->with('update', " portifolio o'zgertirildi");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portifolio $portifolio)
    {
        $portifolio->delete();
        return redirect()->route('portifolios.index')->with('delete', "Siz 1 ta Portifolioni o'chirdingiz");
    }
}
