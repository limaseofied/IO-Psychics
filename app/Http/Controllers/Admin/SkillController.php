<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
         $skills = Skill::latest()->get();

        return view('admin.skills.index', compact('skills'));
    }

    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|string|max:150|unique:skills,name,',
        ]);

        Skill::create([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('admin.skills.index')
            ->with('success', 'Created successfully.');
    }

     public function create()
    {
        return view('admin.skills.create');
    }

    public function edit($id)
    {
        $skills = Skill::findOrFail($id);
        return view('admin.skills.edit', compact('skills'));
    }

     public function update(Request $request, $id)
    {
        $skills = Skill::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:150|unique:skills,name,' . $skills->id,
        ]);

        $skills->update([
            'name' => $request->name
        ]);

        return redirect()
            ->route('admin.skills.index')
            ->with('success', 'Updated successfully.');
    }


    public function destroy($id)
    {
        Skill::destroy($id);

        return redirect()
            ->route('admin.skills.index')
            ->with('success', 'Deleted successfully.');
    }
}