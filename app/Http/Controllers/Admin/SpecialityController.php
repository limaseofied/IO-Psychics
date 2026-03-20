<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\Speciality;

class SpecialityController extends Controller
{
    public function index()
    {
         $speciality = Speciality::latest()->get();

        return view('admin.specialities.index', compact('speciality'));
    }

    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|string|max:150|unique:specialities,name,',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName = $request->image->store('uploads/specialities', 'public');

            $imageName = basename($imageName);
        }

         // Generate Slug
        try {

            $slug = Str::slug($request->name);

        } catch (\Exception $e) {

            return back()
                ->withErrors(['name' => $e->getMessage()])
                ->withInput();

        }

        Speciality::create([
            'name' => $request->name,
            'slug' => $slug,
            'image' => $imageName,
        ]);

        return redirect()
            ->route('admin.specialities.index')
            ->with('success', 'Speciality created successfully.');
    }

     public function create()
    {
        return view('admin.specialities.create');
    }

    public function edit($id)
    {
        $specialities = Speciality::findOrFail($id);
        return view('admin.specialities.edit', compact('specialities'));
    }

     public function update(Request $request, $id)
    {
        $Speciality = Speciality::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:150|unique:specialities,name,' . $Speciality->id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $slug = Str::slug($request->name);

          $imageName = $Speciality->image;

        if ($request->hasFile('image')) {
            if ($Speciality->image && Storage::disk('public')->exists('uploads/specialities/' . $Speciality->image)) {
                Storage::disk('public')->delete('uploads/specialities/' . $Speciality->image);
            }
            $imageName = basename(
                $request->file('image')->store('uploads/specialities', 'public')
            );
        }

        $Speciality->update([
            'name' => $request->name,
            'slug' => $slug,
            'image' => $imageName,
        ]);

        return redirect()
            ->route('admin.specialities.index')
            ->with('success', 'Speciality updated successfully.');
    }


    public function destroy($id)
    {
        Speciality::destroy($id);

        return redirect()
            ->route('admin.specialities.index')
            ->with('success', 'Speciality deleted successfully.');
    }
}