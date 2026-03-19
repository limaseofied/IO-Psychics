<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guide;
use App\Models\Speciality;
use App\Models\Tool;
use App\Models\Skill;
use App\Models\ReadingStyle;
use Illuminate\Support\Facades\Storage;

class GuideController extends Controller
{
    // LIST
    public function index()
    {
        $guides = Guide::latest()->get();
        return view('admin.guides.index', compact('guides'));
    }

    // CREATE FORM
    public function create()
    {
        return view('admin.guides.create', [
        'specialities' => Speciality::all(),
        'tools' => Tool::all(),
        'skills' => Skill::all(),
        'reading_styles' => ReadingStyle::all(),
    ]);
    }

   public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:guides,email',
            'phone' => 'required',
            'password' => 'required|min:6',
            'price_per_session' => 'required|numeric',
            'guide_level' => 'required|in:core,senior,master',

            // ✅ Multi-select validation
            'speciality_id' => 'nullable|array',
            'speciality_id.*' => 'exists:specialities,id',

            'tool_id' => 'nullable|array',
            'tool_id.*' => 'exists:tools,id',

            'skill_id' => 'nullable|array',
            'skill_id.*' => 'exists:skills,id',

            'reading_style_id' => 'nullable|array',
            'reading_style_id.*' => 'exists:reading_styles,id',
        ]);

        $data = $request->except(['_token', 'profile_image']);

         
       $imageName = null;

        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('uploads/guide_profile', 'public');
            $imageName = basename($imagePath);
        }

        $data['profile_image'] = $imageName;

        // ✅ Convert multi-select arrays → string
        $data['speciality_id'] = $request->speciality_id ? implode(',', $request->speciality_id) : null;
        $data['tool_id'] = $request->tool_id ? implode(',', $request->tool_id) : null;
        $data['skill_id'] = $request->skill_id ? implode(',', $request->skill_id) : null;
        $data['reading_style_id'] = $request->reading_style_id ? implode(',', $request->reading_style_id) : null;

        // Default status
        $data['status'] = $request->status ?? 1;

        Guide::create($data);

        return redirect()->route('admin.guides.index')
            ->with('success', 'Guide created successfully');
    }

    // EDIT FORM
    public function edit($id)
    {
        $guide = Guide::findOrFail($id);

        return view('admin.guides.edit', [
            'guide' => $guide,
            'specialities' => Speciality::all(),
            'tools' => Tool::all(),
            'skills' => Skill::all(),
            'reading_styles' => ReadingStyle::all(),
        ]);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $guide = Guide::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:guides,email,' . $guide->id,
            'phone' => 'required',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'price_per_session' => 'required|numeric',
            'guide_level' => 'required|in:core,senior,master',

            // ✅ Multi-select validation
            'speciality_id' => 'nullable|array',
            'speciality_id.*' => 'exists:specialities,id',

            'tool_id' => 'nullable|array',
            'tool_id.*' => 'exists:tools,id',

            'skill_id' => 'nullable|array',
            'skill_id.*' => 'exists:skills,id',

            'reading_style_id' => 'nullable|array',
            'reading_style_id.*' => 'exists:reading_styles,id',

            // Optional password
            'password' => 'nullable|min:6'
        ]);

        $data = $request->except(['_token', '_method', 'profile_image']);

        // Handle profile image update
        if ($request->hasFile('profile_image')) {

            // Delete old image (if exists)
            if ($guide->profile_image && Storage::disk('public')->exists('uploads/guide_profile/' . $guide->profile_image)) {
                Storage::disk('public')->delete('uploads/guide_profile/' . $guide->profile_image);
            }

            // Upload new image
            $imagePath = $request->file('profile_image')->store('uploads/guide_profile', 'public');

            // Save filename
            $data['profile_image'] = basename($imagePath);
        }

        // ✅ Convert multi-select arrays → string
        $data['speciality_id'] = $request->speciality_id ? implode(',', $request->speciality_id) : null;
        $data['tool_id'] = $request->tool_id ? implode(',', $request->tool_id) : null;
        $data['skill_id'] = $request->skill_id ? implode(',', $request->skill_id) : null;
        $data['reading_style_id'] = $request->reading_style_id ? implode(',', $request->reading_style_id) : null;

         // Update password only if provided
        if ($request->filled('password')) {
            $data['password'] = $request->password;
        } else {
            unset($data['password']);
        }

        $guide->update($data);

        return redirect()->route('admin.guides.index')
            ->with('success', 'Guide updated successfully');
    }
    // DELETE
    public function destroy($id)
    {
        Guide::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }

    public function toggleDisplay(Request $request)
    {
        $guide = Guide::findOrFail($request->id);

        $guide->display_in_home = $request->display_in_home;
        $guide->save();

        return response()->json([
            'success' => true,
            'message' => 'Updated successfully'
        ]);
    }
}