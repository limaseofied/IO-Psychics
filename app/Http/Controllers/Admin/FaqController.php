<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
         $faq = Faq::latest()->get();

        return view('admin.faq.index', compact('faq'));
    }

    public function store(Request $request)
    {
         $request->validate([
            'question' => 'required|unique:faqs,question,',
            'answer' => 'required',
            'category' => 'required',
        ]);

        if (trim(strip_tags($request->answer)) == '') {
            return back()
                ->withErrors(['answer' => 'Answer is required'])
                ->withInput();
        }

        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'category' => $request->category,
        ]);

        return redirect()
            ->route('admin.faq.index')
            ->with('success', 'Created successfully.');
    }

     public function create()
    {
        return view('admin.faq.create');
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.faq.edit', compact('faq'));
    }

     public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);

        $request->validate([
            'question' => 'required|unique:faqs,question,'. $faq->id,
            'answer' => 'required',
            'category' => 'required'
        ]);

        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'category' => $request->category,
        ]);

        return redirect()
            ->route('admin.faq.index')
            ->with('success', 'Updated successfully.');
    }


    public function destroy($id)
    {
        Faq::destroy($id);

        return redirect()
            ->route('admin.faq.index')
            ->with('success', 'Deleted successfully.');
    }
}