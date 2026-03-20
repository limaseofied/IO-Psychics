@extends('frontend.layout')
@section('content')
 <section class="custom-breadcrumb">
        <h2 class="custom-breadcrumb-title">Log In</h2>
    </section>

    <section class="inner-page custom-gradinnercontent">
        <div class="form-page-content sign-in-up-page">
            <form action="">
                <div class="primary-form">
                    <div class="row">
                        <div class="mb-3 col-md-12 col-lg-12 primary-form-col">
                            <label for="username" class="form-label floating-label">* Username</label>
                            <input type="text" class="form-control floating-input" id="username" name="username">
                        </div>
                        <div class="mb-3 col-md-12 col-lg-12 primary-form-col password-container">
                            <label for="password" class="form-label floating-label">* Password</label>
                            <input type="password" class="form-control floating-input password-input" id="password"
                                name="password">
                            <span class="toggle-password">
                                <i class="fa-regular fa-eye eye-open"></i>
                            </span>
                        </div>
                        <div class="mb-5 mt-3 col-md-12 col-lg-12 primary-form-col">
                            <div class="primary-form-check-col">
                                <input type="checkbox" class="form-check-input" id="form-check-input">
                                <label class="form-check-label" for="form-check-input">
                                    Remember me
                                </label>
                                <div class="have-account-not">
                                    <a href="#">Lost Your Password</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="primary-form-btn">LOGIN</button>
                    <div class="have-account-not mt-2">
                        <span>Dont have account?</span>
                        <a href="#">SIGNUP</a>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection