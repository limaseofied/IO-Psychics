<?php 
namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class SuperAdminForgotPasswordController extends Controller
{
    public function show()
    {
        return view('admin.forgot-password');
    }

    // STEP 1: SEND OTP
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin) {
            return back()->withErrors(['email' => 'Email is not valid']);
        }

        $otp = rand(100000, 999999);

        session([
            'ad_email' => $admin->email,
            'ad_otp'   => $otp,
            'ad_otp_sent' => true
        ]);

        Mail::raw("Your OTP is: $otp", function ($m) use ($admin) {
            $m->to($admin->email)->subject('Password Reset OTP');
        });

        return back()->with('success', 'OTP sent to your email');
    }

    // STEP 2: VERIFY OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6'
        ]);

        if ($request->otp != session('ad_otp')) {
            return back()->withErrors(['otp' => 'Invalid OTP']);
        }

        session(['ad_otp_verified' => true]);

        return redirect()->route('admin.password.reset.form');
    }

    // STEP 3: RESET FORM
    public function resetForm()
    {
        abort_unless(session('ad_otp_verified'), 403);

        return view('admin.reset-password');
    }

    // STEP 4: RESET PASSWORD
    public function reset(Request $request)
    {

   
        $request->validate([
        'password' => [
        'required',
        'confirmed',
        Password::min(8)
            ->mixedCase()     // Upper + Lower
            ->numbers()       // 0–9
            ->symbols()       // !@#$%^
            ->uncompromised() // optional but recommended
    ],
]);


        $admin = Admin::where('email', session('ad_email'))->firstOrFail();

        $admin->update([
            'password' => $request->password
        ]);

       

        session()->forget(['ad_email', 'ad_otp', 'ad_otp_sent', 'ad_otp_verified']);

         Mail::raw("Your New Password is: $request->password", function ($m) use ($admin) {
            $m->to($admin->email)->subject('New Password');
        });

        return redirect()->route('admin.login')
            ->with('success', 'Password reset successfully');
    }
}
