@extends('frontend.layout')

@section('content')
    <section class="home-banner">
        <div class="banner-content">
            <h5> Guiding Your Path with </h5>
            <h1 class="primary-title">
                Clarity + Compassion
            </h1>
            <div class="banner-btns">
                <a href="{{ route('free.trial') }}" class="primary-btn1">Unlock Your Free Trial</a>
                <a href="{{ route('horoscopes') }}" class="primary-btn2 primary-btn1">View Horoscopes</a>
            </div>
        </div>
    </section>

    <section class="banner-featured-sec plr-40">
        <div class="banner-featured-content">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="banner-featured-text">
                        <h3>Your Journey,</h3>
                        <h3>No Judgment</h3>
                        <p>
                            Whether you're seeking spiritual enlightenment, emotional support, or decision-making
                            insight, we help you navigate life’s twists and turns with confidence.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="banner-featured-box">
                        <div class="banner-featured-box-content">
                            <img src="{{ asset('frontassets/images/Icon1.webp')}}" alt="">
                            <h4 class="primary-h3">Personalized Guidance</h4>
                            <p>
                                Our handpicked Guides offer insightful psychic readings tailored to your unique needs.
                            </p>
                            <div class="banner-featured-box-divider"></div>
                            <a href="{{ route('signup') }}">Sign-Up</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="banner-featured-box banner-featured-box-reverse">
                        <div class="banner-featured-box-content">
                            <img src="{{ asset('frontassets/images/icon2.webp')}}" alt="">
                            <h4 class="primary-h3">At Your Pace</h4>
                            <p>
                                Dive deep into your questions and work through them at your own pace with help from our
                                Guides.
                            </p>
                            <div class="banner-featured-box-divider"></div>
                            <a href="{{ route('how.it.works') }}">How it Works</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="banner-featured-box">
                        <div class="banner-featured-box-content">
                            <img src="{{ asset('frontassets/images/icon3.webp')}}" alt="">
                            <h4 class="primary-h3">24/7 Support</h4>
                            <p>
                                Need assistance? Our dedicated US-based customer support team is here for you around the
                                clock.
                            </p>
                            <div class="banner-featured-box-divider"></div>
                            <a href="{{ route('contact') }}">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- --- Banner Section End ----- -->
    <!-- ======================= Team Member + Testimonial Section Start =====================  -->
    <section class="team-testimonial-sec custom-top-bg-white-orange-gradiant plr-40">
        <!-- --- Team Member Section Start ----- -->
        <section class="team-member-sec">
            <div class="team-member-content">
                <div class="section-title align-items-center">
                    <h3 class="sub-title">Guides Currently</h3>
                    <h2 class="primary-title">Online</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="team-member-box">
                            <div class="team-member-profile">
                                <a href="#" class="team-member-avatar">
                                    <img src="{{ asset('frontassets/images/avatar-fallback.webp')}}" alt="">
                                </a>
                                <div class="member-level-price">
                                    <div class="member-level">
                                        Core Level
                                    </div>
                                    <div class="member-price">
                                        From $50
                                        <br>
                                        Per Session
                                    </div>
                                </div>
                            </div>
                            <div class="team-member-guide-schedule">
                                <div class="member-guide">
                                    guide's
                                    <span class="member-guidance">
                                        Guidance
                                    </span>
                                </div>
                                <div class="member-schedule">
                                    <a href="#">
                                        Schedule Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-member-box">
                            <div class="team-member-profile">
                                <a href="#" class="team-member-avatar">
                                    <img src="{{ asset('frontassets/images/avatar-fallback.webp')}}" alt="">
                                </a>
                                <div class="member-level-price">
                                    <div class="member-level">
                                        Master Level
                                    </div>
                                    <div class="member-price">
                                        From $100
                                        <br>
                                        Per Session
                                    </div>
                                </div>
                            </div>
                            <div class="team-member-guide-schedule">
                                <div class="member-guide">
                                    guide's
                                    <span class="member-guidance">
                                        Teter's
                                    </span>
                                </div>
                                <div class="member-schedule">
                                    <a href="#">
                                        Schedule Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-member-box">
                            <div class="team-member-reviews">
                                3.5
                            </div>
                            <div class="team-member-profile">
                                <a href="#" class="team-member-avatar">
                                    <img src="{{ asset('frontassets/images/1761748684_1761748679_testingrow-400x400.webp')}}" alt="">
                                </a>
                                <div class="member-level-price">
                                    <div class="member-level">
                                        Senior Level
                                    </div>
                                    <div class="member-price">
                                        From $70
                                        <br>
                                        Per Session
                                    </div>
                                </div>
                            </div>
                            <div class="team-member-guide-schedule">
                                <div class="member-guide">
                                    Rosemary's
                                    <span class="member-guidance">
                                        Guidance
                                    </span>
                                </div>
                                <div class="member-schedule">
                                    <a href="#">
                                        Schedule Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- --- Team Member Section End ----- -->
        <!------- Testimonial Slider Start --------->
        <section class="home-testimonial pt-80">
            <div class="section-title align-items-center">
                <h3 class="sub-title">Truth be Told...</h3>
                <h2 class="primary-title">Testimonials</h2>
            </div>
            <div class="custom-tabs">

                <!-- Tab Content -->
                <div class="tab-content">
                    <div id="tab1" class="tab-pane active">
                        <p>I wasn’t sure what to expect when I booked a session with Jill, but I was immediately put at
                            ease. She shared specific insights that felt incredibly personal and accurate—things I
                            hadn’t told anyone..</p>
                        <p>
                            Jill’s calm, genuine approach made the whole experience feel grounding and affirming. Her
                            guidance gave me clarity during a confusing time, and I left the session feeling lighter and
                            more focused. I’d absolutely recommend her to anyone looking for insight or peace of mind.
                        </p>
                    </div>
                    <div id="tab2" class="tab-pane">
                        <p>I didn’t really know what to expect before my session with Jill, but she quickly made me feel
                            comfortable. Her insights were surprisingly personal and spot-on, touching on things I had
                            never spoken about before.</p>
                        <p>
                            Jill’s gentle and sincere manner created a calming atmosphere that helped me feel safe and
                            supported. Her guidance brought much-needed clarity during a confusing phase in my life, and
                            I left feeling more centered and at peace. I would highly recommend her to anyone seeking
                            guidance or reassurance.
                        </p>
                    </div>
                    <div id="tab3" class="tab-pane">
                        <p>Before my session with Jill, I wasn’t sure what the experience would be like, but she
                            immediately created a sense of ease and comfort. The insights she shared felt remarkably
                            personal and accurate, even addressing aspects of my life I had never discussed with anyone.
                        </p>
                        <p>
                            Her calm and authentic presence made the session deeply grounding and reassuring. Jill’s
                            guidance helped me gain clarity during a challenging time, and I walked away feeling more
                            balanced and confident. I would wholeheartedly recommend her to anyone seeking clarity,
                            direction, or peace of mind.
                        </p>
                    </div>
                </div>

                <!-- Navs -->
                <ul class="tab-nav">
                    <li class="active" data-tab="tab1">
                        <div class="client-name">
                            George Wallace
                        </div>
                        <div class="review-date">
                            User since 2019
                        </div>
                    </li>
                    <li data-tab="tab2">
                        <div class="client-name">
                            Jane Doe
                        </div>
                        <div class="review-date">
                            User since 2019
                        </div>
                    </li>
                    <li data-tab="tab3">
                        <div class="client-name">
                            Freddie Mercury
                        </div>
                        <div class="review-date">
                            User since 2019
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!------- Testimonial Slider End --------->
    </section>
    <!-- ======================= Team Member + Testimonial Section Start =====================  -->
    <!-- ----------- FAQ Section Start ------------ -->
    <section class="home-faq custom-faq-bg pt-80">
        <div class="section-title align-items-center">
            <h3 class="sub-title text-white">We’ve Got Answers</h3>
            <h2 class="primary-title">Got Questions?</h2>
        </div>

        <div class="custom-faq-sec">
            <div class="row">
                 @foreach ($faq as $f)      
                <div class="col-lg-6 col-md-12">
                    <div class="accordion">
                        <div class="accordion-item">
                            <a class="accordion-header">{{$f->question}}</a>
                            <div class="accordion-content">
                                {{$f->answer}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!------- FAQ Section End --------->
    <!-- ----------- Services Section Start ------------ -->
    <section class="home-service">
        <div class="home-service-content">
            <div class="row">
                <div class="col-lg-3 col-md-6 p-0 p-0">
                    <div class="home-service-box">
                        <img src="{{ asset('frontassets/images/Aromatherapy.webp')}}" alt="">
                        <div class="home-service-box-text">
                            <a href="#" class="home-service-type">Aromatherapy</a>
                            <a href="#" class="home-service-btn">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 p-0">
                    <div class="home-service-box">
                        <img src="{{ asset('frontassets/images/Candle Energy.webp')}}" alt="">
                        <div class="home-service-box-text">
                            <a href="#" class="home-service-type">Candle Energy</a>
                            <a href="#" class="home-service-btn">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 p-0">
                    <div class="home-service-box">
                        <img src="{{ asset('frontassets/images/Connecting with Your Spirit Guides.webp')}}" alt="">
                        <div class="home-service-box-text">
                            <a href="#" class="home-service-type">Connecting with Your Spirit Guides</a>
                            <a href="#" class="home-service-btn">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 p-0">
                    <div class="home-service-box">
                        <img src="{{ asset('frontassets/images/The Art of Tarot.webp')}}" alt="">
                        <div class="home-service-box-text">
                            <a href="#" class="home-service-type">The Art of Tarot</a>
                            <a href="#" class="home-service-btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     @endsection

   
   