@extends('frontend.layout')
@section('content')
<section class="custom-breadcrumb">
        <h2 class="custom-breadcrumb-title">Sign Up</h2>
    </section>

    <section class="inner-page custom-gradinnercontent">
        <div class="form-page-content sign-in-up-page">

            <form action="">
                <div class="primary-form">
                    <div class="primary-form-header pb-5 pt-3">
                        <h2 class="primary-form-title">Register Account</h2>
                        <div class="have-account-not">
                            <span>Already have an account?</span>
                            <a href="{{route('login')}}">Login</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-12 col-lg-12 primary-form-col">
                            <label for="username" class="form-label floating-label">* Username</label>
                            <input type="text" class="form-control floating-input" id="username" name="username">
                        </div>
                        <div class="mb-3 col-md-12 col-lg-12 primary-form-col">
                            <label for="first-name" class="form-label floating-label">* First Name</label>
                            <input type="text" class="form-control floating-input" id="first-name" name="first-name">
                        </div>
                        <div class="mb-3 col-md-12 col-lg-12 primary-form-col">
                            <label for="last-name" class="form-label floating-label">* Last Name</label>
                            <input type="text" class="form-control floating-input" id="last-name" name="last-name">
                        </div>
                        <div class="mb-3 col-md-12 col-lg-12 primary-form-col">
                            <label for="email-id" class="form-label floating-label">* Email Address</label>
                            <input type="email" class="form-control floating-input" id="email-id" name="email-id"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 col-md-12 col-lg-12 primary-form-col password-container">
                            <label for="password" class="form-label floating-label">* Password</label>
                            <input type="password" class="form-control floating-input password-input" id="password" name="password">
                        </div>
                        <div class="mb-3 mt-5 col-md-12 col-lg-12 primary-form-col">
                            <span class="confirmation-title"> *Confirmation</span>
                            <div class="primary-form-check-col">
                                <input type="checkbox" class="form-check-input" id="form-check-input">
                                <label class="form-check-label" for="form-check-input">
                                    By checking this box, I confirm that I am at least 18 years old and that I have read
                                    and
                                    agree to IO Psychics’ <a href="#" target="_blank">Terms of Service</a> and <a
                                        href="#" target="_blank">Privacy
                                        Policy</a>
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="primary-form-btn">Register</button>
                    <div class="have-account-not mt-2">
                        <span>Already have an account?</span>
                        <a href="{{route('login')}}">Login</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
    
    @endsection