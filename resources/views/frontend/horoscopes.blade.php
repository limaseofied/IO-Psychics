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
                <a href="{{'free.trial'}}" class="primary-btn1 mt-3">Unlock Your Free Trial</a>
            </div>

            <div class="horoscopes-card-section plr-40 pt-80">
                <div class="row">
                     @foreach($signs as $s)
                    <div class="col-lg-3 col-md-6">
                        <div class="horoscopes-card">
                            <a href="{{'horoscope?sign='.$s->slug}}" class="horoscopes-card-svg">
                               <img src="{{asset('public/storage/uploads/horoscope_image/'.$s->image)}}">
                            </a>
                            <a href="{{'horoscope?sign='.$s->slug}}" class="horoscopes-card-title">
                                {{$s->name}}
                            </a>
                            <a href="{{'horoscope?sign='.$s->slug}}" class="horoscopes-card-date">
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
                                        <img src="./images/avatar-fallback.webp" alt="">
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
                                        <img src="./images/avatar-fallback.webp" alt="">
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
            @foreach ($specialities as $sp)
                
            <div class="horoscopes-categories pt-80">
                <div class="section-title align-items-center text-center">
                    <h3 class="sub-title">Explore Other Guide</h3>
                    <h2 class="primary-title">Categories</h2>
                </div>
                <div class="owl-carousel owl-theme owl-categories-slider primary-owl-carousel">
                    <div class="items">
                        <a href="#" class="categories-slider-box">
                            <img src="./images/career.webp" alt="">
                            <span>Career & Finance</span>
                        </a>
                    </div>
                    <div class="items">
                        <a href="#" class="categories-slider-box">
                            <img src="./images/conflict.webp" alt="">
                            <span>Conflict & Resolution</span>
                        </a>
                    </div>
                    <div class="items">
                        <a href="#" class="categories-slider-box">
                            <img src="./images/decision.webp" alt="">
                            <span>Decision Making</span>
                        </a>
                    </div>
                    <div class="items">
                        <a href="#" class="categories-slider-box">
                            <img src="./images/dream.webp" alt="">
                            <span>Dream Exploration</span>
                        </a>
                    </div>
                    <div class="items">
                        <a href="#" class="categories-slider-box">
                            <img src="./images/energyheal.webp" alt="">
                            <span>Energy Healer</span>
                        </a>
                    </div>
                    <div class="items">
                        <a href="#" class="categories-slider-box">
                            <img src="./images/future.webp" alt="">
                            <span>Future Outlook</span>
                        </a>
                    </div>
                    <div class="items">
                        <a href="#" class="categories-slider-box">
                            <img src="./images/grief.webp" alt="">
                            <span>Grief</span>
                        </a>
                    </div>
                    <div class="items">
                        <a href="#" class="categories-slider-box">
                            <img src="./images/health.webp" alt="">
                            <span>Health & Wellness</span>
                        </a>
                    </div>
                    <div class="items">
                        <a href="#" class="categories-slider-box">
                            <img src="./images/lost.webp" alt="">
                            <span>Lost Items</span>
                        </a>
                    </div>
                    <div class="items">
                        <a href="#" class="categories-slider-box">
                            <img src="./images/lostlovedones.webp" alt="">
                            <span>Lost Loved Ones & Pets</span>
                        </a>
                    </div>
                    <div class="items">
                        <a href="#" class="categories-slider-box">
                            <img src="./images/love.webp" alt="">
                            <span>Love & Relationships</span>
                        </a>
                    </div>
                    <div class="items">
                        <a href="#" class="categories-slider-box">
                            <img src="./images/past.webp" alt="">
                            <span>Past Lives</span>
                        </a>
                    </div>
                    <div class="items">
                        <a href="#" class="categories-slider-box">
                            <img src="./images/growth.webp" alt="">
                            <span>Personal Growth</span>
                        </a>
                    </div>
                    <div class="items">
                        <a href="#" class="categories-slider-box">
                            <img src="./images/pets.webp" alt="">
                            <span>Pets & Animals</span>
                        </a>
                    </div>
                    <div class="items">
                        <a href="#" class="categories-slider-box">
                            <img src="./images/spirit.webp" alt="">
                            <span>Spirituality & Inner Guidance</span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="custom-faq-bg pt-80">
            <div class="section-title align-items-center text-white">
                <h3 class="sub-title text-white">We’ve Got Answers</h3>
                <h2 class="primary-title">Got Questions?</h2>
                <h4 class="yellow-bold-text">Call us at 1-888-662-5502 anytime.</h4>
                <p>
                    Our support specialists can guide you through the selection, account setup, and payment process.
                </p>
                <a href="#" class="primary-btn1 bg-transparent">Sign Up Today</a>
            </div>

            <div class="custom-faq-sec">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="accordion">
                            <div class="accordion-item">
                                <a class="accordion-header">What is a horoscope?</a>
                                <div class="accordion-content">
                                    <p>A horoscope is an astrological chart of the heavens, representing the positions
                                        of the sun, moon, and planets, as well as the ruling signs of the zodiac at the
                                        time of a specific event, such as your birth. It’s a practice that’s been used
                                        for over 2,000 years.
                                    </p>
                                    <p>
                                        Astrologers use this chart to evaluate your character and predict your future.
                                        They can also use your chart to offer guidance on various aspects of life, such
                                        as relationships, career, and personal growth.
                                    </p>
                                    <p>
                                        Horoscopes are often divided into daily, weekly, monthly, or yearly forecasts
                                        and are typically based on the twelve zodiac signs.
                                    </p>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <a class="accordion-header">What are the zodiac signs?</a>
                                <div class="accordion-content">
                                    <p>
                                        The zodiac signs are twelve constellations that the sun, moon, and planets move
                                        through over the year. Each sign is associated with specific dates and
                                        personality traits.
                                    </p>
                                    <ul>
                                        <li>
                                            <strong> Aries </strong>
                                            (March 21 - April 19)
                                        </li>
                                        <li>
                                            <strong>Taurus </strong>
                                            (April 20 - May 20)
                                        </li>
                                        <li>
                                            <strong>Gemini </strong>
                                            (May 21 - June 20)
                                        </li>
                                        <li>
                                            <strong>Cancer </strong>
                                            (June 21 - July 22)
                                        </li>
                                        <li>
                                            <strong>Leo </strong>
                                            (July 23 - August 22)
                                        </li>
                                        <li>
                                            <strong>Virgo </strong>
                                            (August 23 - September 22)
                                        </li>
                                        <li>
                                            <strong>Libra </strong>
                                            (September 23 - October 22)
                                        </li>
                                        <li>
                                            <strong>Scorpio </strong>
                                            (October 23 - November 21)
                                        </li>
                                        <li>
                                            <strong>Sagittarius </strong>
                                            (November 22 - December 21)
                                        </li>
                                        <li>
                                            <strong>Capricorn </strong>
                                            (December 22 - January 19)
                                        </li>
                                        <li>
                                            <strong>Aquarius </strong>
                                            (January 20 - February 18)
                                        </li>
                                        <li>
                                            <strong>Pisces </strong>
                                            (February 19 - March 20)
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <a class="accordion-header">What can horoscopes help with?</a>
                                <div class="accordion-content">
                                    <p>
                                        Horoscopes can help with a variety of aspects of your life by providing
                                        insights, guidance, and predictions based on astrological influences. Horoscopes
                                        can be beneficial for:
                                    </p>
                                    <ul>
                                        <li>
                                            <strong>Self-awareness: </strong>
                                            Understand your personality, strengths, weaknesses, and motivations.
                                        </li>
                                        <li>
                                            <strong>Decision-making: </strong>
                                            Receive guidance that can help you choose the best path forward.
                                        </li>
                                        <li>
                                            <strong>Relationships: </strong>
                                            Gain insight into compatibility, communication styles, and potential
                                            challenges.
                                        </li>
                                        <li>
                                            <strong>Timing: </strong>
                                            Figure out the best time to start a new project, make a change, or take a
                                            risk.
                                        </li>
                                        <li>
                                            <strong>Spirituality: </strong>
                                            Enhance your spiritual journey by understanding cosmic influences at play.
                                        </li>
                                        <li>
                                            <strong>Daily guidance: </strong>
                                            Get daily insights to help you face the challenges and opportunities each
                                            day presents.
                                        </li>
                                    </ul>
                                    <p>
                                        If you have a specific question related to your horoscope, reach out to one of
                                        our astrological Guides so they can give you the insight you seek.
                                    </p>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <a class="accordion-header">How often should you read your horoscope?</a>
                                <div class="accordion-content">
                                    <p>
                                        You can read your horoscope daily, weekly, monthly, or yearly, depending on your
                                        preference and the level of guidance you seek. You might choose to check your
                                        horoscope daily to help you plan and navigate your day. Or, you might choose to
                                        look at your yearly horoscope to identify a larger theme and see what’s in store
                                        for you.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ======= -->
                    <div class="col-lg-6 col-md-12">
                        <div class="accordion">
                            <div class="accordion-item">
                                <a class="accordion-header">Can horoscopes predict the future?</a>
                                <div class="accordion-content">
                                    <p>Horoscopes provide insights and guidance based on astrological patterns but are
                                        not definitive predictions. Instead, they highlight possibilities and trends
                                        based on the positions and movements of celestial bodies at a given time.
                                    </p>
                                    <p>
                                        Astrologers interpret these patterns to offer advice on how to navigate upcoming
                                        challenges and opportunities. While horoscopes can help you prepare for what may
                                        come, they should not be viewed as absolute forecasts. Personal decisions, free
                                        will, and other factors also play important roles in shaping your future.
                                    </p>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <a class="accordion-header">What is a birth chart?</a>
                                <div class="accordion-content">
                                    <p>
                                        A birth chart, or natal chart, is a detailed map of the positions of celestial
                                        bodies at the exact time and place of a person's birth. The key components of a
                                        birth chart include:
                                    </p>
                                    <ul>
                                        <li>
                                            <strong>Zodiac Signs: </strong>
                                            The 12 signs that the sun, moon, and planets occupy at the time of birth.
                                        </li>
                                        <li>
                                            <strong>Planets: </strong>
                                            The positions of the planets in the zodiac signs and houses, each
                                            representing different aspects of life and personality.
                                        </li>
                                        <li>
                                            <strong>Houses: </strong>
                                            A birth chart is divided into twelve houses, each representing a different
                                            area of life, such as career, relationships, health, and finances. The
                                            positions of the planets within these houses influence these specific life
                                            areas.
                                        </li>
                                        <li>
                                            <strong>Aspects: </strong>
                                            The angles and relationships between planets in the chart. These can
                                            indicate how different parts of your personality interact and how you might
                                            experience certain events.
                                        </li>
                                        <li>
                                            <strong>Ascendant (Rising Sign): </strong>
                                            This is the zodiac sign rising on the eastern horizon at the time of birth.
                                            It represents your outward behavior and how others perceive you.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <a class="accordion-header">What are the houses in astrology?</a>
                                <div class="accordion-content">
                                    <p>Typically, the heavens are illustrated by a circle divided into 12 intersections
                                        known as houses.
                                    </p>
                                    <p>
                                        Each house represents a different aspect of life, such as career, finances,
                                        marriage, career, relationships, etc. It's believed that the planet that falls
                                        within each house has a major influence on it.
                                        This is why there are different types of horoscopes that cater to these specific
                                        areas. There's even a birthday horoscope that sheds light on the year ahead!
                                    </p>
                                    <p>
                                        Here’s what each of the houses represents:
                                    </p>
                                    <ul>
                                        <li>
                                            <strong>First House (Ascendant): </strong>
                                            Self, appearance, personality, and beginnings. This house reflects how you
                                            present yourself to the world and your overall approach to life.
                                        </li>
                                        <li>
                                            <strong>Second House: </strong>
                                            Finances, possessions, values, and self-worth. This house deals with your
                                            material resources and personal values.
                                        </li>
                                        <li>
                                            <strong>Third House: </strong>
                                            Communication, siblings, short trips, and learning. It governs how you
                                            think, communicate, and interact with your immediate environment.
                                        </li>
                                        <li>
                                            <strong>Fourth House: </strong>
                                            Home, family, roots, and inner foundation. This house focuses on your
                                            domestic life, heritage, and emotional security.
                                        </li>
                                        <li>
                                            <strong>Fifth House: </strong>
                                            Creativity, romance, children, and hobbies. It relates to self-expression,
                                            pleasure, and recreational activities.
                                        </li>
                                        <li>
                                            <strong>Sixth House: </strong>
                                            Health, work, routine, and service. This house governs daily
                                            responsibilities, personal well-being, and your approach to work and
                                            service.
                                        </li>
                                        <li>
                                            <strong>Seventh House: </strong>
                                            Partnerships, marriage, and one-on-one relationships. This could be with
                                            significant others, business partnerships, and close relationships.
                                        </li>
                                        <li>
                                            <strong>Eighth House: </strong>
                                            Transformation, shared resources, sexuality, and the occult. This house
                                            involves deep emotional bonds, financial matters involving others, and major
                                            life changes.
                                        </li>
                                        <li>
                                            <strong>Ninth House: </strong>
                                            Higher education, travel, philosophy, and spirituality. It represents your
                                            quest for knowledge, spiritual beliefs, and long-distance travel.
                                        </li>
                                        <li>
                                            <strong>Tenth House (Midheaven): </strong>
                                            Career, public image, and aspirations. This house is associated with your
                                            professional life, achievements, and how you are perceived by society.
                                        </li>
                                        <li>
                                            <strong>Eleventh House: </strong>
                                            Friendships, groups, and social causes. It focuses on your social networks,
                                            community involvement, and aspirations for the future.
                                        </li>
                                        <li>
                                            <strong>Twelfth House: </strong>
                                            Subconscious, solitude, and hidden matters. This house relates to your inner
                                            world, spirituality, and areas of life that are hidden or unconscious.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <a class="accordion-header">Can I get a personalized horoscope?</a>
                                <div class="accordion-content">
                                    <p>
                                        Yes! Personalized horoscopes are based on your birth chart and provide more
                                        detailed and specific insights compared to general horoscopes. To receive your
                                        personalized horoscope, reach out to one of our experienced astrological Guides.
                                    </p>
                                    <p>
                                        If you’re new here, you’ll need to make an account first. It’s quick and easy —
                                        you can get started here.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection