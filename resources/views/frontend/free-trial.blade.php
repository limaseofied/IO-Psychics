@extends('frontend.layout')
@section('content')

<section class="custom-breadcrumb">
        <h3 class="custom-breadcrumb-sub-title">Unlock Your</h3>
        <h2 class="custom-breadcrumb-title">7-Day Free Trial</h2>
        <p class="custom-breadcrumb-description">
            Try IO Psychics for a full week with no risk. Explore different Guides, see how sessions feel in real life,
            and decide if a subscription fits you–without being charged during your trial.
        </p>
    </section>

    <section class="inner-page custom-gradinnercontent">
        <div class="custom-top-bg-purple-gradiant">
            <div class="free-trail-section plr-40 pt-80">
                <div class="trial-box">
                    <h4 class="head-ttl-of-free-trail">Why Your 7-Day Free Trial is Worth It</h4>
                    <ul class="why-free-trail">
                        <li>
                            <img src="{{ asset('frontassets/images/cropped-Siteicon-192x192.webp')}}">
                            <h3 class="primary-h3">Preview a Higher Plan</h3>
                            <p>Sample the Quest experience (normally 60 min/month) in a shorter 15-minute trial preview,
                                so you can feel the difference before committing.</p>
                        </li>
                        <li>
                            <img src="{{ asset('frontassets/images/cropped-Siteicon-192x192.webp')}}">
                            <h3 class="primary-h3">Try Different Guides</h3>
                            <p>Sample different styles, tools, and specialties to find the Guides you click with most.
                            </p>
                        </li>
                        <li>
                            <img src="{{ asset('frontassets/images/cropped-Siteicon-192x192.webp')}}">
                            <h3 class="primary-h3">Support on Your Schedule</h3>
                            <p>Use your single 15-minute session whenever it fits best into your week—a focused check-in
                                for clarity, grounding, or next steps.</p>
                        </li>
                        <li>
                            <img src="{{ asset('frontassets/images/cropped-Siteicon-192x192.webp')}}">
                            <h3 class="primary-h3">Clarity Before You Commit</h3>
                            <p>Make your decision based on real sessions, not guesswork or hype.</p>
                        </li>
                        <li>
                            <img src="{{ asset('frontassets/images/cropped-Siteicon-192x192.webp')}}">
                            <h3 class="primary-h3">Risk-Free Start</h3>
                            <p>You’re in a full trial window with no charges during those 7 days, as long as you cancel
                                in time.</p>
                        </li>
                    </ul>
                </div>
                <div class="moon-divider plr-40">
                    <div class="moon-divider-content">
                        <img src="{{ asset('frontassets/./images/moon.webp')}}" alt="">
                    </div>
                </div>
                <div class="trial-box pt-80">
                    <h4 class="head-ttl-of-free-trail">Good to Know Before You Start</h4>
                    <ul class="why-free-trail">
                        <li>
                            <img src="{{ asset('frontassets/images/cropped-Siteicon-192x192.webp')}}">
                            <h3 class="primary-h3">Trial Window</h3>
                            <p>Your free trial runs for 7 days from the moment you activate it. We’ll send you a
                                reminder before your trial ends.</p>
                        </li>
                        <li>
                            <img src="{{ asset('frontassets/images/cropped-Siteicon-192x192.webp')}}">
                            <h3 class="primary-h3">What You Get During Trial</h3>
                            <p>All Quest-level features are unlocked during your trial, with a free 15-minute session
                                available to use.

                                (The full Quest plan normally includes 60 minutes per month—the 15-minute cap applies to
                                the free trial only.)</p>
                        </li>
                        <li>
                            <img src="{{ asset('frontassets/images/cropped-Siteicon-192x192.webp')}}">
                            <h3 class="primary-h3">What Happens After 7 Days</h3>
                            <p>If you don’t cancel during your trial, you’ll roll into our starter subscription,
                                Discovery (30 minutes for $80/month).</p>
                        </li>
                    </ul>
                </div>
                <div class="trial-box pb-80">
                    <ul class="why-free-trail">
                        <li>
                            <img src="{{ asset('frontassets/images/cropped-Siteicon-192x192.webp')}}">
                            <h3 class="primary-h3">Billing Start Date</h3>
                            <p>Your first $80 charge will occur on the 8th day after your trial starts, then on that
                                same date each month.</p>
                        </li>
                        <li>
                            <img src="{{ asset('frontassets/images/cropped-Siteicon-192x192.webp')}}">
                            <h3 class="primary-h3">Upgrading Your Plan</h3>
                            <p>If you keep a subscription after your trial, you can upgrade from Discovery to Quest or
                                Odyssey anytime under “Manage Subscriptions” in your Account Dashboard.</p>
                        </li>
                        <li>
                            <img src="{{ asset('frontassets/images/cropped-Siteicon-192x192.webp')}}">
                            <h3 class="primary-h3">How to Cancel</h3>
                            <p>You can easily cancel any time during your 7-day trial to avoid charges, directly from
                                your Account Dashboard.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="large-orange-gradient">
        <div class="large-orange-gradient-box">
            <h5>No Charges During Your 7-Day Trial</h5>
            <p>You won’t be charged while your 7-day free trial is active. A valid payment method is required, but it’s
                only used if you don’t cancel before the trial ends.</p>
        </div>
    </section>
    <section class="custom-gradinnercontent free-trial-form-container">
        <div class="custom-top-bg-purple-gradiant">
            <div class="form-page-content free-trial-form-content">
                <form action="">
                    <div class="primary-form free-trial-form">
                        <div class="primary-form-header pb-5 pt-3">
                            <h2 class="primary-form-title">Register Account</h2>
                            <div class="have-account-not">
                                <span>Already have an account?</span>
                                <a href="#">Login</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-12 col-lg-12 primary-form-col">
                                <label for="username" class="form-label floating-label">* Username</label>
                                <input type="text" class="form-control floating-input" id="username" name="username">
                            </div>
                            <div class="mb-3 col-md-12 col-lg-12 primary-form-col">
                                <label for="first-name" class="form-label floating-label">* First Name</label>
                                <input type="text" class="form-control floating-input" id="first-name"
                                    name="first-name">
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
                                <input type="password" class="form-control floating-input password-input" id="password"
                                    name="password">
                                <span class="toggle-password">
                                    <i class="fa-regular fa-eye-slash eye-close"></i>
                                </span>
                                <!-- Example: showing "Good" -->
                                <!-- /* ========= Comment Out these Colors from CSS after Password Validation ======= */ -->
                                <div class="strength-container">
                                    <div class="strength-bar">
                                        <div class="strength-segment very-weak"></div>
                                        <div class="strength-segment weak"></div>
                                        <div class="strength-segment good"></div>
                                        <div class="strength-segment good2"></div>
                                        <div class="strength-segment strong"></div>
                                    </div>
                                    <div class="strength-text">Strength: Very Weak</div>
                                </div>
                            </div>
                            <div class="mb-3 mt-5 col-md-12 col-lg-12 primary-form-col">
                                <span class="confirmation-title"> *Confirmation</span>
                                <div class="primary-form-check-col">
                                    <input type="checkbox" class="form-check-input" id="form-check-input">
                                    <label class="form-check-label" for="form-check-input">
                                        By checking this box, I confirm that I am at least 18 years old and that I have
                                        read
                                        and
                                        agree to IO Psychics’ <a href="#" target="_blank">Terms of Service</a> and <a
                                            href="#" target="_blank">Privacy
                                            Policy</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="payment-Summary text-center">
                        <h3 class="primary-small-title">Payment Summary</h3>
                        <ul class="payment-Summary-list">
                            <li>
                                <span>Selected Plan : </span>
                                <strong> Trial</strong>
                            </li>
                            <li>
                                <span>Renewal Amount : </span>
                                <strong> $80.00 /mo (after 7 days)</strong>
                            </li>
                            <li>
                                <span>Today's Payment : </span>
                                <strong> $0.00</strong>
                            </li>
                        </ul>
                        <button type="submit" class="start-trial-form-btn">Start Trial</button>
                        <div class="have-account-not mt-2">
                            <span>Already have an account?</span>
                            <a href="#">Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection