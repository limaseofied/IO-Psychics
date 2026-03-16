<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Models\Contacts;
use App\Mail\ContactFormSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function aboutUs()
    {
        return view('frontend.about-us');
    }

    public function careers()
    {
        return view('frontend.careers');
    }

    public function press()
    {
        return view('frontend.press');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email',
            'country_code' => 'required|string|max:5',
            'phone'        => 'required|digits_between:10,12',
            'message'    => 'required|string|min:10',
            'captcha'      => 'required|string',
        ]);

        // CAPTCHA validation
        if (
            !session()->has('captcha_text') ||
            now()->greaterThan(session('captcha_expires')) ||
            $request->captcha !== session('captcha_text')
        ) {
            return back()
                ->withErrors(['captcha' => 'Invalid or expired CAPTCHA'])
                ->withInput();
        }

        // Clear CAPTCHA after successful validation
        session()->forget(['captcha_text', 'captcha_expires']);

        

         $formData = $request->only([
                'first_name', 'last_name', 'email', 'country_code', 'phone', 'message'
            ]);

            // Store in database
          Contacts::create($formData);

         // Send email to admin
         Mail::to(env('ADMIN_EMAIL'))->send(new ContactFormSubmitted($formData));

        return redirect()
            ->route('thank-you')
            ->with('success', 'Thank you! We will contact you shortly.');
    }

    public function signup()
    {
        return view('frontend.signup');
    }

    public function supplierTerms()
    {
        return view('frontend.supplier-terms-conditions');
    }

    public function generalTerms()
    {
        return view('frontend.general-terms-conditions');
    }

    public function legalNotice()
    {
        return view('frontend.legal-notice');
    }

    public function privacyPolicy()
    {
        return view('frontend.privacy-policy');
    }

    public function cookiesPreferences()
    {
        return view('frontend.Cookies-and-Marketing-Preferences');
    }

    public function activityProvider($slug)
    {

         // 1️⃣ Get supplier by slug
        $supplier = DB::table('supplier_master')
            ->where('supplier_url', $slug)
            ->where('status', 1)
            ->first();

        // If supplier not found
        if (!$supplier) {
            abort(404, 'Activity Provider not found');
        }

        $tours = DB::table('tour_products as tp')
                ->join('product_countries as pc', 'tp.id', '=', 'pc.product_id')
                ->join('country_master as cm', 'pc.country_id', '=', 'cm.id')
                ->where('tp.supplier_id', $supplier->id)   // 👈 supplier filter
                ->where('tp.status', 1)
                ->where('tp.deleted_flag', 0)
                ->select(
                    'tp.*',

                    // Duration format
                    DB::raw("CASE 
                        WHEN tp.duration_type = 'hourly' 
                            THEN CONCAT(tp.hours, ' hour', IF(tp.hours > 1, 's', ''))
                        WHEN tp.duration_type = 'daywise' 
                            THEN CONCAT(tp.days, ' day', IF(tp.days > 1, 's', ''))
                        ELSE ''
                    END AS duration"),

                    'tp.group_type',

                    // Group size only if group
                    DB::raw("CASE 
                        WHEN tp.group_type = 'group' THEN tp.group_size 
                        ELSE NULL 
                    END AS group_size"),

                    // Show MRP only if different from sale price
                    DB::raw("IF(
                        tp.mrp_price IS NOT NULL 
                        AND tp.mrp_price != tp.sale_price, 
                        tp.mrp_price, 
                        NULL
                    ) AS mrp_price"),

                    // ⭐ Average rating
                    DB::raw("(SELECT IFNULL(ROUND(AVG(star_rating), 1), 0)
                            FROM tour_reviews 
                            WHERE product_id = tp.id) AS avg_rating"),

                    // 📝 Total reviews
                    DB::raw("(SELECT COUNT(*) 
                            FROM tour_reviews 
                            WHERE product_id = tp.id) AS total_reviews"),
                             'cm.country_url',
                )
                ->orderBy('tp.id', 'DESC')
                ->get();


        // 3️⃣ Return view
        return view('frontend.activity-provider', compact('supplier', 'tours'));
    }


}
