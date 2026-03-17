<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    public function index()
    {
        return Speciality::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100'
        ]);

        return Speciality::create($request->all());
    }

    public function show($id)
    {
        return Speciality::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $speciality = Speciality::findOrFail($id);

        $speciality->update($request->all());

        return $speciality;
    }

    public function destroy($id)
    {
        Speciality::destroy($id);

        return response()->json(['message' => 'Deleted successfully']);
    }
}