@extends('frontend.layout')
@section('content')
    <section class="custom-breadcrumb">
        <h3 class="custom-breadcrumb-sub-title">Find Your Guide</h3>
        <h2 class="custom-breadcrumb-title">Unlock New Perspectives</h2>
        <p class="custom-breadcrumb-description">
            Explore life’s most pressing questions across love, career, spirituality, and more. Connect with expert
            Guides at IO Psychics who are ready to provide clarity and guidance on the topics that matter to you most.
        </p>
    </section>

    <section class="inner-page custom-gradinnercontent">
        <div class="custom-top-bg-purple-gradiant pb-5">
            <div class="section-title align-items-center section-title-description text-center plr-40 pt-80">
                <h3 class="sub-title">Explore Your Free</h3>
                <h2 class="primary-title">Horoscope</h2>
                <p>
                    Find out what the planets have in store for you. Select your sign and check out your daily, weekly,
                    monthly, or yearly horoscope.
                </p>
                <a href="{{route('free.trial')}}" class="primary-btn1 mt-3">Unlock Your Free Trial</a>
            </div>

            <div class="horoscopes-card-section plr-40 pt-80">
                <div class="row">
                     @foreach($signs as $s)
                    <div class="col-lg-3 col-md-6">
                        <div class="horoscopes-card">
                            <a href="{{route('horoscopes?sign='.$s->slug)}}" class="horoscopes-card-svg">
                               <img src="{{asset('public/storage/uploads/horoscope_image/'.$s->image)}}">
                            </a>
                            <a href="{{route('horoscopes?sign='.$s->slug)}}" class="horoscopess-card-title">
                                {{$s->name}}
                            </a>
                            <a href="{{route('horoscopes?sign='.$s->slug)}}" class="horoscopes-card-date">
                                {{$s->date_range}}
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="features-sec">
                <div class="features-sec-content plr-40 pt-80 mt-5">
                    <div class="row">
                        <div class="col-lg-5 col-md-12">
                            <div class="section-title">
                                <h3 class="sub-title">Get Personalized</h3>
                                <h2 class="primary-title px-0">Astrological Insights</h2>
                                <p>
                                    Do you need specific advice or want to take a deeper dive into a particular subject
                                    or circumstance? Book an online session with one of our gifted Guides.
                                </p>
                                <a href="#" class="primary-btn1 mt-3">Connect with an Astrologer</a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12">
                            <div class="features-sec-boxes">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="features-sec-box features-sec-box-gradiant-border">
                                            <div class="features-sec-box-content">
                                                <h2 class="primary-small-title">Trusted Psychics</h2>
                                                <p>
                                                    Our Astrology psychics are vetted professionals with a deep
                                                    understanding of the zodiac.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div
                                            class="features-sec-box features-sec-box-gradiant-border features-sec-box-top-space">
                                            <div class="features-sec-box-content">
                                                <h2 class="primary-small-title">Available Anytime</h2>
                                                <p>
                                                    Questions can arise at any moment. We’re at the ready when you seek
                                                    guidance.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="features-sec-box features-sec-box-gradiant-border">
                                            <div class="features-sec-box-content">
                                                <h2 class="primary-small-title">Satisfaction Guaranteed</h2>
                                                <p>
                                                    If you’re not pleased with your reading, our dedicated support team
                                                    can make it right.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div
                                            class="features-sec-box-bg-btn features-sec-box-gradiant-border features-sec-box-top-space">
                                            <div class="features-sec-box-bg-btn-content">
                                                <h2>Follow the Stars</h2>
                                                <p>
                                                    Find a Guide written in your stars. Our quick quiz unveils your
                                                    ideal psychic connection.
                                                </p>
                                                <a href="#">Match Me Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="zodiac-sign-round-section rightcat-white-bg">
            <div class="zodiac-sign-round-content">

                <!-- Nav Tabs -->
                <div class="tabs-nav hover-tabs-nav">
                  
                    @foreach($signs as $i => $s)
                    <button class="tab-link <?=$i+1==0 ? 'active' : ''?> hover-tab-btn zodiac-sign-ball{{$i+1}} zodiac-sign-ball-top" data-tab="tab{{$i+1}}">
                        <img src="{{asset('public/storage/uploads/horoscope_icon/'.$s->icon)}}" alt="{{$s->name}}" class="btn-tab-img">
                        <div class="btn-tab-text">
                            <span>{{$s->name}}</span>
                            <span>{{$s->date_range}}</span>
                        </div>
                    </button>
                    @endforeach
                  
                </div>

                <!-- Tab Content -->
                <div class="zodiac-tab-content-area">
                    <div class="zodiac-tab-content hover-zodiac-tab-content active zodiac-active" id="tab0">
                        <div class="section-title align-items-center text-white text-center">
                            <h3 class="sub-title text-white">Discover Your Pet’s</h3>
                            <h2 class="primary-title">Cosmic Connection</h2>
                            <p>
                                Just like with people, cosmic forces can shape your pet’s personality and compatibility.
                                By understanding their horoscope, you can develop a more intuitive understanding of
                                their needs and create a nurturing, harmonious environment for them.
                            </p>
                        </div>
                    </div>
                    @foreach ($signs as $index => $s)
                    <div class="zodiac-tab-content hover-zodiac-tab-content" id="tab{{$index+1}}">
                        <div class="traits-personal-type-content">
                            <div class="traits-content">
                                <h4>
                                    Traits:
                                </h4>
                                <span>
                                   {{$s->traits}}
                                </span>
                            </div>
                            <div class="personal-type-content">
                                <h4>
                                   Personality Type:
                                </h4>
                                <small>
                                   {{$s->personality}}
                                </small>
                            </div>
                        </div>
                    </div>                        
                    @endforeach

                </div>
            </div>
        </div>
        <div class="custom-top-bg-white-orange-gradiant categories-slider-sec plr-40 pt-80">
            <div class="team-member-sec">
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
                    </div>
                </div>
            </div>
           
                
            <div class="horoscopes-categories pt-80">
                <div class="section-title align-items-center text-center">
                    <h3 class="sub-title">Explore Other Guide</h3>
                    <h2 class="primary-title">Categories</h2>
                </div>
                <div class="owl-carousel owl-theme owl-categories-slider primary-owl-carousel">
                     @foreach ($specialities as $sp)
                    <div class="items">
                        <a href="{{route('guides?category='.$sp->slug)}}" class="categories-slider-box">
                            <img src="{{asset('public/storage/uploads/specialities/'.$sp->image)}}" alt="{{$sp->name}}">
                            <span>{{$sp->name}}</span>
                        </a>
                    </div>
                     @endforeach
                </div>
            </div>
           
        </div>
        <div class="custom-faq-bg pt-80">
            <div class="section-title align-items-center text-white">
                <h3 class="sub-title text-white">We’ve Got Answers</h3>
                <h2 class="primary-title">Got Questions?</h2>
                <h4 class="yellow-bold-text">Call us at 1-888-662-5502 anytime.</h4>
                <p>
                    Our support specialists can guide you through the selection, account setup, and payment process.
                </p>
                <a href="{{route('signup')}}" class="primary-btn1 bg-transparent">Sign Up Today</a>
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
        </div>
    </section>

    @endsection