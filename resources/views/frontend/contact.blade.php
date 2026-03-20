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
                  <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">

                        {{-- User Type --}}
                        <div class="mb-3 col-md-12 col-lg-6 contact-form-col">
                            <label class="form-label">User Type <span>(Required)</span></label>
                            <select class="form-select" name="user_type" id="user_type" required>
                                <option value="">---Select -- </option>
                                <option value="Seeker">I am a Seeker</option>
                                <option value="Guide">I am a Guide</option>
                                <option value="Guest">I have not created an account yet</option>
                            </select>
                        </div>

                        {{-- Subject --}}
                        <div class="mb-3 col-md-12 col-lg-6 contact-form-col">
                            <label class="form-label">I am contacting about <span>(Required)</span></label>
                           @php
                            $subjects = [
                                'Account Support',
                                'Billing Inquiry',
                                'My Reading',
                                'Technical Support',
                                'Advisor Help',
                                'Other'
                            ];
                            @endphp

                            <select class="form-select" name="subject" id="subject" required>
                                <option value="">---Select---</option>

                                @foreach($subjects as $item)
                                    <option value="{{ $item }}" {{ old('subject') == $item ? 'selected' : '' }}>
                                        {{ $item }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Name --}}
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Your Name</label>
                            <input type="text" class="form-control" name="name"  id="name" required value="{{ old('name') }}">
                        </div>

                        {{-- Email --}}
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Your Email <span>(Required)</span></label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
                        </div>

                        {{-- Message --}}
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Message <span>(Required)</span></label>
                            <textarea class="form-control" name="message" id="message" rows="6" required maxlength="500">{{ old('message') }}</textarea>
                            Note: Max 500 characters
                        </div>

                    </div>

                    <button type="submit" class="contact-form-btn">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </section>
    @endsection