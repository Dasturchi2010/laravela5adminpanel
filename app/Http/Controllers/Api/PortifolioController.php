<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Portifolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PortifolioController extends Controller
{
    public function index()
    {
        $portfolios = Portifolio::select('id', 'img', 'link')->orderByDesc('id')->get();
        $portfolios_count = $portfolios->count();

        return [
            "count" => $portfolios_count,
            "portfolios" => $portfolios,
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'link' => ['required', 'string', 'max:255'],
            'img' => ['required', 'file'],
        ]);

        $path = null;
        if ($request->hasFile('img')) {
            $path = $request->file('img')->store('portifolios', 'public');
        }

        $portifolios = Portifolio::create([
            'link' => $request->link,
            'img' => $path,
        ]);

        return [
            'message' => 'Success',
            'portifolios' => $portifolios,
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $portifolios = Portifolio::find($id);
            if ($portifolios) {
                return $portifolios;
            } else {
                return "Topilmadi";
            }
        } catch (\Exception $e) {
            return "Topilmadi";
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $portifolio = Portifolio::find($id);
        $request->validate([
            'link' => ['required', 'string', 'max:255'],
        ]);

        $path = $portifolio->img;

        if ($request->hasFile('img')) {
            $request->validate([
                'img' => ['required', 'img'],
            ]);
            $path = $request->file('img')->store('portifolio', 'public');
        } else {
            $path = $portifolio->img;
        }

        $portifolio->update([
            'link' => $request->link,
            'img' => $path,
        ]);


        return[
            'message' => "Ma'lumot o'zgartirildi",
            'portifolio' => $portifolio
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $portfolio = Portifolio::find($id);

            if ($portfolio) {
                $portfolio->delete();
                return "Portfolio o'chirildi";
            } else {
                return "Topilmadi";
            }
        } catch (\Exception $e) {
            return "Xatolik yuz berdi";
        }
    }
}

