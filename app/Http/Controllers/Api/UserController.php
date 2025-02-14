<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users =  DB::table('users')->select('id',  'name','email','password','image')->orderByDesc('id')->get();
        $users_count = $users->count();
        return[
            "count"=>$users_count,
            "users"=>$users,
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:8'],
            'image' => ['required', 'file'],
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('User', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'image' => $path,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);

        $user->syncRoles('client');

        return [
            'message' => 'Success',
            'user' => $user,
        ];
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $users = User::find($id);
            if ($users) {
                return $users;
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
        $user = User::find($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'min:8'],
        ]);

        $path = $user->image;

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => ['required', 'image'],
            ]);
            $path = $request->file('image')->store('User', 'public');
        } else {
            $path = $user->image;
        }

        $user->update([
            'name' => $request->name,
            'image' => $path,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        $user->syncRoles('client');

        return[
            'message' => "Ma'lumot o'zgartirildi",
            'user' => $user
        ];

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id);
            if ($user) {
                $user->delete();
                return "Ma'lumot o'chirildi";
            } else {
                return "Topilmadi";
            }
        } catch (\Exception $e) {
            return "Topilmadi";
        }
    }
}
