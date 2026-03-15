<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Show supplier profile edit page
     */
    public function edit()
    {
        // assuming supplier is authenticated
        $admin = Admin::findOrFail(auth('super_admin')->id());

        return view('admin.profile.edit', compact('admin'));
    }

    /**
     * Update admin profile
     */
    public function update(Request $request)
    {
        $admin = Admin::findOrFail(auth('super_admin')->id());

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'phone'                => 'nullable|string|max:50',
            'email'          => 'nullable|url|max:255'
        ]);

        $admin->update($validated);

        return redirect()
            ->route('admin.profile.edit')
            ->with('success', 'Profile updated successfully');
    }

    // Show the Change Password page
    public function changePasswordForm()
    {
        return view('admin.profile.change_password');
    }

   

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => [
                'required',
                'confirmed', // must match new_password_confirmation
                Password::min(8)       // minimum 8 characters
                    ->mixedCase()      // at least one uppercase and one lowercase
                    ->numbers()        // at least one number
                    ->symbols()        // at least one special character
            ],
        ]);

        $admin = auth('super_admin')->user();

        // Check current password
        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors([
                'current_password' => 'Current password is incorrect'
            ]);
        }

        // Update password (plain text, mutator will bcrypt)
        $admin->update([
            'password' => $request->new_password,
        ]);

        return redirect()->route('admin.profile.changepassword')
            ->with('success', 'Password updated successfully');
    }

    
}
