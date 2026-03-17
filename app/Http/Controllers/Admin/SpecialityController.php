<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

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
        ]);

        Speciality::create([
            'name' => $request->name,
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
        ]);

        $Speciality->update([
            'name' => $request->name
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