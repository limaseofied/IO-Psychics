<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPlan;

use Illuminate\Http\Request;

class SubscriptionPlanController extends Controller
{
    public function index()
    {
         $subscription = SubscriptionPlan::latest()->get();

        return view('admin.subscription.index', compact('subscription'));
    }

    public function store(Request $request)
    {
        // Validate all fields
        $request->validate([
            'name' => 'required|string|max:150|unique:subscription_plans,name',
            'duration_min' => 'required|integer|min:1',
            'guide_level' => 'required|in:core,senior,master',
            'price' => 'required|numeric|min:0',
        ]);

        // Create subscription plan
        SubscriptionPlan::create([
            'name' => $request->name,
            'duration_min' => $request->duration_min,
            'guide_level' => $request->guide_level,
            'price' => $request->price,
            'created_at' => now(),
        ]);

        return redirect()
            ->route('admin.subscription.index')
            ->with('success', 'Subscription Plan created successfully.');
    }

     public function create()
    {
        return view('admin.subscription.create');
    }

    public function edit($id)
    {
        $plan = SubscriptionPlan::findOrFail($id);
        return view('admin.subscription.edit', compact('plan'));
    }

    public function update(Request $request, $id)
    {
        $subscription = SubscriptionPlan::findOrFail($id);

        // Validate all fields with unique rule ignoring current record
        $request->validate([
            'name' => 'required|string|max:150|unique:subscription_plans,name,' . $subscription->id,
            'duration_min' => 'required|integer|min:1',
            'guide_level' => 'required|in:core,senior,master',
            'price' => 'required|numeric|min:0',
        ]);

        // Update subscription plan
        $subscription->update([
            'name' => $request->name,
            'duration_min' => $request->duration_min,
            'guide_level' => $request->guide_level,
            'price' => $request->price,
        ]);

        return redirect()
            ->route('admin.subscription.index')
            ->with('success', 'Subscription Plan updated successfully.');
    }

    public function destroy($id)
    {
        SubscriptionPlan::destroy($id);

        return redirect()
            ->route('admin.subscription.index')
            ->with('success', 'Tool deleted successfully.');
    }
}