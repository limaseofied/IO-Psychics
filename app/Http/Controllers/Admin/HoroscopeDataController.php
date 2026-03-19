<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HoroscopeDaily;
use App\Models\HoroscopeMonthly;
use Carbon\Carbon;

class HoroscopeDataController extends Controller
{
    // ================= DAILY =================

    public function dailyIndex(Request $request) {
        // Use the 'date' filter from request or default to today
    $date = $request->date ?? date('Y-m-d');

    // Fetch daily horoscope for the selected date
     $data = HoroscopeDaily::with('sign')
            ->whereDate('horoscope_date', $date)
            ->orderBy('id', 'desc')
            ->paginate(2)
            ->appends(['date' => $date]);

    // Pass $date to the view
    return view('admin.horoscope-daily.index', compact('data', 'date'));
    }
    // ================= MONTHLY =================

    public function monthlyIndex(Request $request) {
         // Get filter values from request, or default to current month/year
        $month = $request->month ?? date('m');
        $year  = $request->year ?? date('Y');

        // Query filtered monthly horoscope
        $data = HoroscopeMonthly::with('sign')
                ->where('month', $month)
                ->where('year', $year)
                ->orderBy('id', 'desc')
                ->paginate(2)              // Pagination
                ->appends(['month' => $month, 'year' => $year]); // Keep filters in pagination links

        // Pass $month and $year to the view
        return view('admin.horoscope-monthly.index', compact('data', 'month', 'year'));
    }

}