<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PayPerSessionPlan;

use Illuminate\Http\Request;

class PayPerSessionPlanController extends Controller
{
    // ✅ List all plans
    public function index()
    {
        $plans = PayPerSessionPlan::orderBy('id', 'desc')->get();
        return view('admin.pay_per_session.index', compact('plans'));
    }

    // ✅ Show create form
    public function create()
    {
        return view('admin.pay_per_session.create');
    }

    // ✅ Store new plan
    public function store(Request $request)
    {
        $request->validate([
            'duration_min' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:1',
        ]);

        PayPerSessionPlan::create([
            'duration_min' => $request->duration_min,
            'price' => $request->price,
        ]);

        return redirect()
            ->route('admin.pay-per-session.index')
            ->with('success', 'Plan added successfully');
    }

    // ✅ Show edit form
    public function edit($id)
    {
        $plan = PayPerSessionPlan::findOrFail($id);
        return view('admin.pay_per_session.edit', compact('plan'));
    }

    // ✅ Update plan
    public function update(Request $request, $id)
    {
        $plan = PayPerSessionPlan::findOrFail($id);

        $request->validate([
            'duration_min' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:1',
        ]);

        $plan->update([
            'duration_min' => $request->duration_min,
            'price' => $request->price,
        ]);

        return redirect()
            ->route('admin.pay-per-session.index')
            ->with('success', 'Plan updated successfully');
    }

    // ✅ Delete plan
    public function destroy($id)
    {
        $plan = PayPerSessionPlan::findOrFail($id);
        $plan->delete();

        return redirect()
            ->route('admin.pay-per-session.index')
            ->with('success', 'Plan deleted successfully');
    }
}