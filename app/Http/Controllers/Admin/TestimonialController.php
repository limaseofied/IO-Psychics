<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    // List testimonials with filter and pagination
    public function index(Request $request)
    {
        $testimonials = Testimonial::orderBy('id','desc')->get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    // Show create form
    public function create()
    {
        return view('admin.testimonials.create');
    }

    // Store new testimonial
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        Testimonial::create($request->all());

        return redirect()->route('admin.testimonials.index')
                         ->with('success', 'Testimonial added successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    // Update testimonial
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update($request->all());

        return redirect()->route('admin.testimonials.index')
                         ->with('success', 'Testimonial updated successfully.');
    }

    // Delete testimonial
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
                         ->with('success', 'Testimonial deleted successfully.');
    }
}