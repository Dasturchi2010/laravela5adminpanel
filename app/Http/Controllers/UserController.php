<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('backend.User.index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('backend.User.create' , compact('roles'));
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
        'password' => Hash::make($request->password), // Parolni shifrlash
    ]);

    $user->syncRoles($request->roles);

    return redirect()->route('users.index')->with('create', "Yangi user qo'shildi");
}


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('backend.User.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('backend.User.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
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

        $user->syncRoles($request->roles);

        return redirect()->route('users.index')->with('update', "User ma'lumotlari o'zgartirildi");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('delete', "Siz 1 ta userni o'chirdingiz");
    }
}
