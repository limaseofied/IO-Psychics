<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceStep;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    // List
    public function index()
    {
        $services = Service::latest()->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    // Create
    public function create()
    {
        return view('admin.services.create');
    }


   public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'banner_image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'steps.*.image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ]);

        $thumbnailName = null;
        $bannerName = null;

        // ✅ Upload Thumbnail
        if ($request->hasFile('thumbnail')) {

            $thumbnailName = $request->thumbnail->store('uploads/services/thumbnail', 'public');
            $thumbnailName = basename($thumbnailName);
        }

        // ✅ Upload Banner
        if ($request->hasFile('banner_image')) {

            $bannerName = $request->banner_image->store('uploads/services/banner', 'public');
            $bannerName = basename($bannerName);
        }

        // ✅ Create Service
        $service = Service::create([
            'title' => $request->title,
            'thumbnail' => $thumbnailName,
            'banner_image' => $bannerName,
            'small_description' => $request->small_description,
            'full_description' => $request->full_description,
            'final_thoughts' => $request->final_thoughts,
        ]);

        // ✅ Steps Insert
        if ($request->steps) {

            foreach ($request->steps as $step) {

                $stepImage = null;

                if (isset($step['image']) && $step['image'] instanceof \Illuminate\Http\UploadedFile) {

                    $stepImage = $step['image']->store('uploads/services/steps', 'public');
                    $stepImage = basename($stepImage);
                }

                ServiceStep::create([
                    'service_id' => $service->id,
                    'title' => $step['title'] ?? null,
                    'content' => $step['content'] ?? null,
                    'image' => $stepImage,
                ]);
            }
        }

        return redirect()->route('admin.services.index')
            ->with('success', 'Service added successfully!');
    }

    // Edit
    public function edit($id)
    {
        $service = Service::with('steps')->findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

   public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'banner_image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'steps.*.image' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ]);

        $thumbnailName = $service->thumbnail;
        $bannerName = $service->banner_image;

        // ✅ Update Thumbnail
        if ($request->hasFile('thumbnail')) {

            // delete old
            if ($service->thumbnail && file_exists(public_path('storage/uploads/services/thumbnail/' . $service->thumbnail))) {
                unlink(public_path('storage/uploads/services/thumbnail/' . $service->thumbnail));
            }

            $thumbnailName = $request->thumbnail->store('uploads/services/thumbnail', 'public');
            $thumbnailName = basename($thumbnailName);
        }

        // ✅ Update Banner
        if ($request->hasFile('banner_image')) {

            if ($service->banner_image && file_exists(public_path('storage/uploads/services/banner/' . $service->banner_image))) {
                unlink(public_path('storage/uploads/services/banner/' . $service->banner_image));
            }

            $bannerName = $request->banner_image->store('uploads/services/banner', 'public');
            $bannerName = basename($bannerName);
        }

        // ✅ Update Service
        $service->update([
            'title' => $request->title,
            'thumbnail' => $thumbnailName,
            'banner_image' => $bannerName,
            'small_description' => $request->small_description,
            'full_description' => $request->full_description,
            'final_thoughts' => $request->final_thoughts,
        ]);

        // ✅ Delete old step images + records
        $oldSteps = ServiceStep::where('service_id', $service->id)->get();

        foreach ($oldSteps as $oldStep) {
            if ($oldStep->image && file_exists(public_path('storage/uploads/services/steps/' . $oldStep->image))) {
                unlink(public_path('storage/uploads/services/steps/' . $oldStep->image));
            }
        }

        ServiceStep::where('service_id', $service->id)->delete();

        // ✅ Insert new steps
        if ($request->steps) {

            foreach ($request->steps as $step) {

                $stepImage = null;

                if (isset($step['image']) && $step['image'] instanceof \Illuminate\Http\UploadedFile) {

                    $stepImage = $step['image']->store('uploads/services/steps', 'public');
                    $stepImage = basename($stepImage);
                }

                ServiceStep::create([
                    'service_id' => $service->id,
                    'title' => $step['title'] ?? null,
                    'content' => $step['content'] ?? null,
                    'image' => $stepImage,
                ]);
            }
        }

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully');
    }

    // Delete
    public function destroy($id)
    {
        Service::findOrFail($id)->delete();

        return redirect()->route('admin.services.index')
                         ->with('success', 'Service deleted');
    }
}