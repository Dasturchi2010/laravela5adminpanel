<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderByDesc('id')->get();
        return view('backend.Blog.index' , compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.Blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:256',
            'date' => 'required|date',
            'author' => 'required',
            'mini_text' => 'required',
            'info' => 'required',
            'photo' => 'nullable|image|max:2048',
            'images.*' => 'nullable|image',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store("Blog", 'public');
        }

        $data = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $name = time() . '_' . $image->getClientOriginalName();
                $destinationPath = public_path("storage/uploads");
                $image->move($destinationPath, $name);
                $data[] = $name;
            }
        }

        $blog = Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'date' => $request->date,
            'author' => $request->author,
            'mini_text' => $request->mini_text,
            'text' => $request->info,
            'photo' => $photoPath,
            'images' => json_encode($data),
        ]);

        return redirect()->route('blogs.index')->with('success', "Yangi $blog->title muvaffaqiyatli qo'shildi!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('backend.Blog.show' , compact('blog'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('backend.Blog.edit' , compact('blog'));

    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|max:256',
            'date' => 'required|date',
            'author' => 'required',
            'mini_text' => 'required',
            'info' => 'required',
        ]);

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|max:2048',
            ]);
            $path = $request->file('photo')->store("Blog", 'public');
            $blog->photo = $path;
        }

        $data = [];
        if ($request->hasFile('images')) {
            $request->validate([
                'images.*' => 'image|max:2048',
            ]);
            foreach ($request->file('images') as $image) {
                $name = time() . '_' . $image->getClientOriginalName();
                $destinationPath = public_path("storage/uploads");
                $image->move($destinationPath, $name);
                $data[] = $name;
            }
            $blog->images = json_encode($data);
        }

        $blog->title = $request->title;
        $blog->date = $request->date;
        $blog->author = $request->author;
        $blog->mini_text = $request->mini_text;
        $blog->text = $request->info;
        $blog->slug = Str::slug($request->title, '-');
        $blog->save();

        return redirect()->route('blogs.index')->with('update', "Siz blogni o'zgartirdingiz!");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index')->with('delete', "Siz 1 ta Blogni o'chirdingiz");
    }
}
