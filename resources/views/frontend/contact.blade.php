@extends('frontend.layout')
@section('content')
<section class="custom-breadcrumb">
        <h2 class="custom-breadcrumb-title">Contact Us</h2>
</section>

    <section class="inner-page custom-gradinnercontent">
        <div class="contact-page-content pb-5">
            <div class="contact-features">
                <div class="contact-features-row">
                    <div class="contact-features-col">
                        <div class="contact-features-box">
                            <img src="{{ asset('frontassets/images/images/emailsupport.webp')}}" alt="">
                            <h2 class="primary-h3">24/7 Email Support</h2>
                            <a href="mailto:seekersupport@iopsychics.com">seekersupport@iopsychics.com</a>
                        </div>
                    </div>
                    <div class="contact-features-col">
                        <div class="contact-features-box">
                            <img src="{{ asset('frontassets/images/images/support-1.webp')}}" alt="">
                            <h2 class="primary-h3">Guide Support</h2>
                            <a href="mailto:teamsupport@iopsychics.com">teamsupport@iopsychics.com</a>
                        </div>
                    </div>
                    <div class="contact-features-col">
                        <div class="contact-features-box">
                            <img src="{{ asset('frontassets/images/images/chat-2.webp')}}" alt="">
                            <h2 class="primary-h3">24/7 Live Support</h2>
                            <p>
                                Click Here for Live Chat
                            </p>
                        </div>
                    </div>
                    <div class="contact-features-col">
                        <div class="contact-features-box">
                            <img src="{{ asset('frontassets/images/images/findus.webp')}}" alt="">
                            <h2 class="primary-h3">Find Us</h2>
                            <p>
                                4917 S. Alma School Rd.
                                <br>
                                Suite 2
                                <br>
                                Chandler, AZ 85248
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-page-form pb-5">
                <div class="contact-form">
                    <form action="">
                        <div class="row">
                            <div class="mb-3 col-md-12 col-lg-6 contact-form-col">
                                <label for="user-type" class="form-label">
                                    User Type
                                    <span> (Required) </span>
                                </label>
                                <select class="form-select" aria-label="Default select example" id="user-type"
                                    name="user-type">
                                    <option value="user-type1" selected>I am a Seeker</option>
                                    <option value="user-type1">I am a Guide</option>
                                    <option value="user-type">I have not created an account yet</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-12 col-lg-6 contact-form-col">
                                <label for="contacting-about" class="form-label">
                                    I am contacting IO Psychic about
                                    <span> (Required) </span>
                                </label>
                                <select class="form-select" aria-label="Default select example" id="contacting-about"
                                    name="contacting-about">
                                    <option value="contacting-about1" selected>Account Support</option>
                                    <option value="contacting-about2">Billing Inquiry</option>
                                    <option value="contacting-about3">My Reading</option>
                                    <option value="contacting-about4">Technical Support</option>
                                    <option value="contacting-about5">How To pick an Advisor</option>
                                    <option value="contacting-about6">Other</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-12 col-lg-12 contact-form-col">
                                <label for="your-name" class="form-label">Your Name</label>
                                <input type="text" class="form-control" id="your-name" name="your-name">
                            </div>
                            <div class="mb-3 col-md-12 col-lg-12 contact-form-col">
                                <label for="email_id" class="form-label">
                                    Your Email
                                    <span> (Required) </span>
                                </label>
                                <input type="email" class="form-control" id="email_id" name="email_id"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3 col-md-12 contact-form-col contact-form-textarea">
                                <label for="message" class="form-label">
                                    Message
                                    <span> (Required) </span>
                                </label>
                                <textarea class="form-control" id="message" name="message" rows="10"
                                    type="text"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="contact-form-btn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @endsection