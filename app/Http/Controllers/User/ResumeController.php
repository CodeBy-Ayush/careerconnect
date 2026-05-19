<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UploadResumeRequest;
use App\Models\Resume;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function store(UploadResumeRequest $request)
    {
        $user = auth()->user();

        $path = $request->file('resume')->store('resumes', 'public');

        $user->resumes()->create([
            'file_path' => $path,
            'file_name' => $request->file('resume')->getClientOriginalName(),
            'is_primary' => $user->resumes()->count() == 0, // Set first resume as primary
        ]);

        return back()->with('success', 'Resume uploaded successfully!');
    }

    public function destroy(Resume $resume)
    {
        if ($resume->user_id !== auth()->id()) { abort(403); }
        
        Storage::disk('public')->delete($resume->file_path);
        $resume->delete();

        return back()->with('success', 'Resume deleted.');
    }
}