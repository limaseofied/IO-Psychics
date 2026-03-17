<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReadingStyle;
use Illuminate\Http\Request;

class ReadingStyleController extends Controller
{
    public function index()
    {
         $read = ReadingStyle::latest()->get();

        return view('admin.reading-styles.index', compact('read'));
    }

    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|string|max:150|unique:reading_styles,name,',
        ]);

        ReadingStyle::create([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('admin.readingstyles.index')
            ->with('success', 'Created successfully.');
    }

     public function create()
    {
        return view('admin.reading-styles.create');
    }

    public function edit($id)
    {
        $read = ReadingStyle::findOrFail($id);
        return view('admin.reading-styles.edit', compact('read'));
    }

     public function update(Request $request, $id)
    {
        $read = ReadingStyle::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:150|unique:reading_styles,name,' . $read->id,
        ]);

        $read->update([
            'name' => $request->name
        ]);

        return redirect()
            ->route('admin.readingstyles.index')
            ->with('success', 'Updated successfully.');
    }


    public function destroy($id)
    {
        ReadingStyle::destroy($id);

        return redirect()
            ->route('admin.readingstyles.index')
            ->with('success', 'Deleted successfully.');
    }
}