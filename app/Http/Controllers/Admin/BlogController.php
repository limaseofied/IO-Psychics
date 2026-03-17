<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of blogs
     */
    public function index()
    {
        $blogs = Blog::with(['category'])
            ->latest()
            ->paginate(10);

        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new blog
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created blog
     */
   // Store new blog
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content'     => 'required',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'      => 'nullable|boolean',
        ]);

        $imageName = null;

        // Image upload (same logic as Country)
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('uploads/blog', 'public');
            $imageName = basename($imageName);
        }

        // Generate unique blog URL / slug
        try {
            $url = $this->generateUrl($request->title);
        } catch (\Exception $e) {
            return back()
                ->withErrors(['title' => $e->getMessage()])
                ->withInput();
        }

        Blog::create([
            'title'       => $request->title,
            'slug'    => $url,
            'category_id' => $request->category_id,
            'content'     => $request->content,
            'status'      => $request->status ?? 1,
            'image'       => $imageName,
            'user_id'  => auth('super_admin')->id(),
        ]);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog added successfully!');
    }


    /**
     * Show the form for editing the specified blog
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::orderBy('name')->get();

        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified blog
     */
    // Update blog
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content'     => 'required',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'      => 'nullable|boolean',
        ]);

        $blog = Blog::findOrFail($id);
        $imageName = $blog->image;

        // Image replace logic (same as Country)
        if ($request->hasFile('image')) {
            if ($blog->image && Storage::disk('public')->exists('uploads/blog/' . $blog->image)) {
                Storage::disk('public')->delete('uploads/blog/' . $blog->image);
            }

            $imageName = basename(
                $request->file('image')->store('uploads/blog', 'public')
            );
        }

        // Regenerate URL only if title changed
        try {
            $url = $this->generateUrl($request->title, $blog->id);
        } catch (\Exception $e) {
            return back()
                ->withErrors(['title' => $e->getMessage()])
                ->withInput();
        }

        $blog->update([
            'title'       => $request->title,
            'slug'    => $url,
            'category_id' => $request->category_id,
            'content'     => $request->content,
            'status'      => $request->status ?? 1,
            'image'       => $imageName,
        ]);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog updated successfully!');
    }


    /**
     * Remove the specified blog
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Blog deleted successfully.');
    }
    private function generateUrl($name, $ignoreId = null)
    {
        $slug = Str::slug($name);

        $query = Blog::where('slug', $slug);

        // Ignore current record during update
        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }

        if ($query->exists()) {
            throw new \Exception('Blog already exists');
        }

        return $slug;
    }
}
