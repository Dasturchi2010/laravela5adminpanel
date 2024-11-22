<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Traits\SendsNotificationsToCreators;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();
        return view('backend.Setting.edit', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'title' => 'required',
            'logo' => 'image',
            'brand_name' => 'required',
            'author' => 'required',
            'description' => 'required',
            'keywords' => 'required',
            'telegram_link' => 'required',
            'instagram_link' => 'required',
            'youtube_link' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store("Setting", "public");
        } else {
            $path = $setting->logo;
        }

        $setting->update([
            'title' => $request->title,
            'logo' => $path,
            'brand_name' => $request->brand_name,
            'author' => $request->author,
            'keywords' => $request->keywords,
            'description' => $request->description,
            'telegram_link' => $request->telegram_link,
            'instagram_link' => $request->instagram_link,
            'youtube_link' => $request->youtube_link,
        ]);

        return redirect()->route('settings.index')->with('update', "Sozlama yangilandi");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
