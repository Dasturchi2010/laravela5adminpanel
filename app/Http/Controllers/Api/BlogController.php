<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = DB::table('blogs')->select('id', 'title', 'mini_text', 'text')->orderByDesc('id')->get();
        $blogs_count = $blogs->count();

        return [
            "count" => $blogs_count,
            "blogs" => $blogs,
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:256',
            'mini_text' => 'required|max:500',
            'text' => 'required|max:2000',
        ]);

        $blog = Blog::create([
            'title' => $request->title,
            'mini_text' => $request->mini_text,
            'text' => $request->text,
        ]);

        return [
            'message' => "Ma'lumot qo'shildi",
            'blog' => $blog,
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $blog = Blog::find($id);
            if ($blog) {
                return $blog;
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
        try {
            $blog = Blog::find($id);
            if ($blog) {
                $request->validate([
                    'title' => 'required|max:256',
                    'mini_text' => 'required|max:500',
                    'text' => 'required|max:2000',
                ]);

                $blog->update([
                    'title' => $request->title,
                    'mini_text' => $request->mini_text,
                    'text' => $request->text,
                ]);

                return [
                    'message' => "Update Success",
                    'blog' => $blog,
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
            $blog = Blog::find($id);
            if ($blog) {
                $blog->delete();
                return "Ma'lumot o'chirildi";
            } else {
                return "Topilmadi";
            }
        } catch (\Exception $e) {
            return "Topilmadi";
        }
    }
}
