<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = DB::table('services')->select('id', 'icon_name', 'title')->orderByDesc('id')->get();
        $services_count = $services->count();
        return [
            "count" => $services_count,
            "services" => $services,
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
            'icon_name' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
        ]);

        $service = Service::create([
            'icon_name' => $request->icon_name,
            'title' => $request->title,
        ]);

        return [
            'message' => "Ma'lumot qo'shildi",
            'service' => $service,
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $service = Service::find($id);
            if ($service) {
                return $service;
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
    public function update(Request $request, $id)
    {
        $service = Service::find($id);
        $request->validate([
            'icon_name' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
        ]);

        $service->update([
            'icon_name' => $request->icon_name,
            'title' => $request->title,
        ]);

        return [
            'message' => "Ma'lumot o'zgartirildi",
            'service' => $service,
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $service = Service::find($id);
            if ($service) {
                $service->delete();
                return "Ma'lumot o'chirildi";
            } else {
                return "Topilmadi";
            }
        } catch (\Exception $e) {
            return "Topilmadi";
        }
    }
}
