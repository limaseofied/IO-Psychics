<?php 
namespace App\Http\Controllers;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class ForgotPasswordController extends Controller
{
    public function show()
    {
        return view('supplier.forgot-password');
    }

    // STEP 1: SEND OTP
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $supplier = Supplier::where('email', $request->email)->first();

        if (!$supplier) {
            return back()->withErrors(['email' => 'Email not registered']);
        }

        $otp = rand(100000, 999999);

        session([
            'fp_email' => $supplier->email,
            'fp_otp'   => $otp,
            'otp_sent' => true
        ]);

        Mail::raw("Your OTP is: $otp", function ($m) use ($supplier) {
            $m->to($supplier->email)->subject('Password Reset OTP');
        });

        return back()->with('success', 'OTP sent to your email');
    }

    // STEP 2: VERIFY OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6'
        ]);

        if ($request->otp != session('fp_otp')) {
            return back()->withErrors(['otp' => 'Invalid OTP']);
        }

        session(['otp_verified' => true]);

        return redirect()->route('supplier.password.reset.form');
    }

    // STEP 3: RESET FORM
    public function resetForm()
    {
        abort_unless(session('otp_verified'), 403);

        return view('supplier.reset-password');
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

        $supplier = Supplier::where('email', session('fp_email'))->firstOrFail();

        $supplier->update([
            'password' => $request->password
        ]);

        session()->forget(['fp_email', 'fp_otp', 'otp_sent', 'otp_verified']);

         Mail::raw("Your New Password is: $request->password", function ($m) use ($supplier) {
            $m->to($supplier->email)->subject('New Password');
        });

        return redirect()->route('supplier.login')
            ->with('success', 'Password reset successfully');
    }
}
