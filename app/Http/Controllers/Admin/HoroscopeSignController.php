<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HoroscopeSign;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class HoroscopeSignController extends Controller
{

    public function index()
    {
        $signs = HoroscopeSign::orderBy('sign_id','DESC')->get();
        return view('admin.horoscope_signs.index', compact('signs'));
    }

    public function create()
    {
        return view('admin.horoscope_signs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ]);

        $iconName = null;
        $imageName = null;

        // Upload Icon
        if ($request->hasFile('icon')) {

            $iconName = $request->icon->store('uploads/horoscope_icon', 'public');

            $iconName = basename($iconName);
        }

         // Upload Icon
        if ($request->hasFile('image')) {

            $imageName = $request->image->store('uploads/horoscope_image', 'public');

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

        // Insert
        HoroscopeSign::create([
            'name' => $request->name,
            'slug' => $slug,
            'icon' => $iconName,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.signs.index')
            ->with('success', 'Horoscope Sign added successfully!');
    }

    public function edit($id)
    {
        $sign = HoroscopeSign::findOrFail($id);
        return view('admin.horoscope_signs.edit', compact('sign'));
    }

   public function update(Request $request, $id)
    {
        $sign = HoroscopeSign::findOrFail($id);

        $request->validate([
            'name' => 'required|max:50',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $slug = Str::slug($request->name);

         $iconName = $sign->icon;

        if ($request->hasFile('icon')) {
            if ($sign->icon && Storage::disk('public')->exists('uploads/horoscope_icon/' . $sign->icon)) {
                Storage::disk('public')->delete('uploads/horoscope_icon/' . $sign->icon);
            }
            $iconName = basename(
                $request->file('icon')->store('uploads/horoscope_icon', 'public')
            );
        }

       $imageName = $sign->image;

        if ($request->hasFile('image')) {
            if ($sign->image && Storage::disk('public')->exists('uploads/horoscope_image/' . $sign->image)) {
                Storage::disk('public')->delete('uploads/horoscope_image/' . $sign->image);
            }
            $imageName = basename(
                $request->file('image')->store('uploads/horoscope_image', 'public')
            );
        }

        $sign->update([
            'name' => $request->name,
            'slug' => $slug,
            'icon' => $iconName,
            'image' => $imageName,
        ]);

        return redirect()
            ->route('admin.signs.index')
            ->with('success','Sign Updated Successfully');
    }

    public function delete($id)
    {
        HoroscopeSign::findOrFail($id)->delete();

        return redirect()->route('admin.signs.index')->with('success','Sign Deleted');
    }

}