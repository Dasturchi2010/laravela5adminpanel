<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function services(){
        // return DB::table('services')->select('id', 'title', 'icon_name')->paginate(10);
        $services =  DB::table('services')->select('id', 'title', 'icon_name')->orderByDesc('id')->get();
        $services_count = $services->count();
        return[
            "count"=>$services_count,
            "services"=>$services,
        ];
    }

    public function portifolios(){
        $portifolios =  DB::table('portifolios')->select('id', 'img', 'link')->orderByDesc('id')->get();
        $portifolios_count = $portifolios->count();
        return[
            "count"=>$portifolios_count,
            "portifolios"=>$portifolios,
        ];
    }

    public function blogs(){
        $blogs =  DB::table('blogs')->select('id','title', 'photo' , 'date' , 'author' , 'mini_text', 'text', 'images' , 'slug')->orderByDesc('id')->get();
        $blogs_count = $blogs->count();
        return[
            "count"=>$blogs_count,
            "blogs"=>$blogs,
        ];
    }

    public function contacts(){
        $contacts =  DB::table('contacts')->select('id' , 'name', 'email' , 'phone' , 'message')->orderByDesc('id')->get();
        $contacts_count = $contacts->count();
        return[
            "count"=>$contacts_count,
            "contacts"=>$contacts,
        ];
    }

    public function settings(){
        $settings =  DB::table('settings')->select('id' , 'title', 'logo', 'brand_name', 'description', 'keywords', 'author', 'telegram_link', 'instagram_link', 'youtube_link')->orderByDesc('id')->get();
        $settings_count = $settings->count();
        return[
            "count"=>$settings_count,
            "settings"=>$settings,
        ];
    }

    public function users(){
        $users =  DB::table('users')->select('id' ,'name','email', 'password','image')->orderByDesc('id')->get();
        $users_count = $users->count();
        return[
            "count"=>$users_count,
            "users"=>$users,
        ];
    }



}
