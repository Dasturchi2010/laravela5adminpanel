<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
public function index()
{
    $services = DB::table('services')->select('title', 'icon_name')->get();
    $portifolios = DB::table('portifolios')->select('img', 'link')->get();
    return view('frontend.index', compact('services', 'portifolios'));
}

}
