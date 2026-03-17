<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tool;

use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function index()
    {
         $tools = Tool::latest()->get();

        return view('admin.tools.index', compact('tools'));
    }

    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|string|max:150|unique:tools,name,',
        ]);

        Tool::create([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('admin.tools.index')
            ->with('success', 'Tool created successfully.');
    }

     public function create()
    {
        return view('admin.tools.create');
    }

    public function edit($id)
    {
        $tools = Tool::findOrFail($id);
        return view('admin.tools.edit', compact('tools'));
    }

     public function update(Request $request, $id)
    {
        $tools = Tool::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:150|unique:tools,name,' . $tools->id,
        ]);

        $tools->update([
            'name' => $request->name
        ]);

        return redirect()
            ->route('admin.tools.index')
            ->with('success', 'Tool updated successfully.');
    }


    public function destroy($id)
    {
        Tool::destroy($id);

        return redirect()
            ->route('admin.tools.index')
            ->with('success', 'Tool deleted successfully.');
    }
}