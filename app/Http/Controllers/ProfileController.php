<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Product;
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
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
    public function user()
    {
        $user = User::all();
     
        return view('admin.user',  ['user' => $user] );
    }
    public function destroyuser(User $User){
        $User->delete();
        return redirect(route('admin.user'))->with('success','User Deleted Successfully');
    }

    public function edituser(User $user){
        return view('admin.edit', ['user' => $user]);
    }
    public function updateuser( User $user, Request $request){
        $data = $request->validate([
            'name' => 'required',  
            'email' => 'required',
            'usertype' => 'required',
        ]);
        $user->update($data);
        return redirect(route('admin.user'))->with('success','Product Update Successfully');
    }

}
