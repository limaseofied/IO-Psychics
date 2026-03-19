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

    public function plans() {
        return view('frontend.plans');
    }

    public function guides() {
        return view('frontend.guides');
    }

    public function horoscopes() {
        return view('frontend.horoscopes');
    }

    public function tarot() {
        return view('frontend.tarot');
    }


    public function topics() {
        return view('frontend.topics');
    }

    public function howItWorks() {
        return view('frontend.how-it-works');
    }

    public function about() {
        return view('frontend.about');
    }

    public function contact() {
        return view('frontend.contact');
    }

    public function signup() {
        return view('frontend.signup');
    }

    public function login() {
        return view('frontend.login');
    }

    public function freeTrial() {
    return view('frontend.free-trial');
}


}
