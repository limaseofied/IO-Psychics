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
        return view('plans');
    }

    public function guides() {
        return view('guides');
    }

    public function horoscopes() {
        return view('horoscopes');
    }

    public function tarot() {
        return view('tarot');
    }


    public function topics() {
        return view('topics');
    }

    public function howItWorks() {
        return view('how-it-works');
    }

    public function about() {
        return view('about');
    }

    public function contact() {
        return view('contact');
    }

    public function signup() {
        return view('signup');
    }

    public function login() {
        return view('login');
    }

    public function freeTrial() {
    return view('free-trial');
}


}
