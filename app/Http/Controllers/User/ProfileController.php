<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Models\Skill;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        $skills = Skill::all();
        $categories = Category::with('interests')->get();
        
        return view('user.profile.edit', compact('user', 'skills', 'categories'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = auth()->user();
        $data = $request->validated();

        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->avatar) { Storage::disk('public')->delete($user->avatar); }
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($data);

        // Simple skill sync
        $user->skills()->sync($request->skills);
        
        // Simple interest sync
        $user->interests()->sync($request->interests);

        return back()->with('success', 'Profile updated successfully!');
    }
}