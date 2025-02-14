<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Portifolio;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
public function index()
{
    $services = DB::table('services')->select('title', 'icon_name')->orderByDesc('id')->limit(4)->get();
    $portifolios = DB::table('portifolios')->select('img', 'link')->orderByDesc('id')->limit(4)->get();
    $blogs = DB::table('blogs')->select( 'slug', 'date', 'title' , 'photo' , 'mini_text')->orderByDesc('id')->limit(3)->get();
    $setting = Setting::first();
    return view('frontend.index', compact('services', 'portifolios' , 'setting' , 'blogs'));
}

public function send_contact(Request $request)
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

    return redirect()->route('site.index')->with('create', "sizning ma'lumotingiz yuborildi . Tez orada bog'lanamiz");

}

public function blogs(){
    $blogs = Blog::orderByDesc('id')->get();
    $setting = Setting::first();
    return view('frontend.Blog.index' , compact('blogs' , 'setting'));
}

public function blog_detail($slug){
    $blog = Blog::where('slug', $slug)->firstOrFail();
    $setting = Setting::first();
    $images = json_decode($blog->images);
    return view('frontend.Blog.blog-detail' , compact('blog' , 'setting' , 'images'));
}

public function contacts(){
    $contacts = Contact::orderByDesc('id')->get();
    $setting = Setting::first();
    return view('frontend.Contact.index' , compact('contacts' , 'setting'));
}

public function services(){
    $services = Service::orderByDesc('id')->get();
    $setting = Setting::first();
    return view('frontend.Service.index' , compact('services' , 'setting'));
}

public function portifolios(){
    $portifolios = Portifolio::orderByDesc('id')->get();
    $setting = Setting::first();
    return view('frontend.Portifolio.index' , compact('portifolios' , 'setting'));
}
}
