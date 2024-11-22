<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('backend.auth.profile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function updateImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048'
        ]);

        $id = auth()->user()->id;
        $user = User::find($id);
        // dd($user);

        if ($request->hasfile('image')) {
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }

            $path = $request->file('image')->store("User", 'public');
            $user->image = $path;
            $user->save();
        }
         return redirect()->back()->with('error', 'Rasm yuklanmadi');
    }

    public function message()
    {
        $notifications = Notification::where('user_id', auth()->user()->id)->get();
        return view('site.auth.message', compact('notifications'));
    }

    public function updateNotificationsStatus(Request $request)
    {
        try {
            $userId = $request->input('user_id');
            // Foydalanuvchiga tegishli xabarlarning statusini 0 ga o'zgartirish
            Notification::where('user_id', $userId)->update(['status' => 0]);
            return response()->json(['message' => 'Foydalanuvchi uchun xabarlar holati muvaffaqiyatli o\'zgartirildi']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


}
