@extends('frontend.layout')
@section('content')

 <section class="custom-breadcrumb">
        <!-- <h3 class="custom-breadcrumb-sub-title">Meet IO Psychics</h3> -->
        <h2 class="custom-breadcrumb-title">Plans & Pricing</h2>
        <!-- <p class="custom-breadcrumb-description">
            We’re a close-knit community of gifted psychics, astrologers, and spiritual guides dedicated to
            supporting you on your journey toward clarity.
        </p> -->
    </section>

    <section class="inner-page custom-gradinnercontent">
        <div class="section-title align-items-center section-title-description text-center pt-80">
            <h3 class="sub-title">Pricing Packages</h3>
            <h2 class="primary-title">Choose Your Path</h2>
            <p>
                Take the first steps toward deeper self-awareness and a clearer understanding of your future. Whether
                you choose a subscription plan for ongoing guidance or prefer the flexibility of pay-per-session, the
                path is yours to define. Each option offers a unique way to explore insights at your own pace—whether
                you're seeking consistent growth or checking in when the moment feels right. This is about trusting your
                intuition, honoring your rhythm, and selecting what aligns best with your goals. There’s no
                one-size-fits-all.
            </p>
        </div>
        <div class="pricing-plan-section pt-3">
            <div class="pricing-plan-container pricing-plan-container-first">
                <div class="pricing-plan-content">
                    <h2 class="primary-small-title text-dark text-center">Subscription Plans</h2>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="pricing-plan-box">
                                <h5 class="primary-ex-small-title pricing-plan-purpple-title">Discovery</h5>
                                <span class="price-rate">$80/mo</span>
                                <p class="time-core-guide">
                                    30 min
                                    <small>core guide</small>
                                </p>
                                <div class="pricing-plan-bar purpple-bar"></div>
                                <p>
                                    2×15 min or 1×30 min
                                </p>
                                <a href="#" class="pricing-plan-btn pricing-plan-purpple-btn">Subscribe</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="pricing-plan-box">
                                <h5 class="primary-ex-small-title pricing-plan-orange-title">Quest</h5>
                                <span class="price-rate">$140/mo</span>
                                <p class="time-core-guide">
                                    60 min
                                    <small>core guide</small>
                                </p>
                                <div class="pricing-plan-bar orange-bar"></div>
                                <p>
                                    4×15 min or 2×30 min Priority booking
                                </p>
                                <a href="#" class="pricing-plan-btn pricing-plan-orange-btn">Subscribe</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="pricing-plan-box">
                                <h5 class="primary-ex-small-title pricing-plan-red-title">Odyssey</h5>
                                <span class="price-rate">$200/mo</span>
                                <p class="time-core-guide">
                                    90 min
                                    <small>core guide</small>
                                </p>
                                <div class="pricing-plan-bar red-bar"></div>
                                <p>
                                    3×30 min or 2×45 min
                                    Best per-minute value
                                    + VIP support
                                </p>
                                <a href="#" class="pricing-plan-btn pricing-plan-red-btn">Subscribe</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pricing-plan-container pricing-plan-container-second">
                <div class="pricing-plan-content text-center">
                    <h2 class="primary-small-title text-dark text-center">Pay-Per-Session Blocks</h2>
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="pricing-plan-box">
                                <h5 class="primary-ex-small-title pricing-plan-purpple-title">15 min</h5>
                                <span class="price-rate">$50</span>
                                <a href="#" class="primary-btn1">Select</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="pricing-plan-box">
                                <h5 class="primary-ex-small-title pricing-plan-purpple-title">30 min</h5>
                                <span class="price-rate">$90</span>
                                <a href="#" class="primary-btn1">Select</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="pricing-plan-box">
                                <h5 class="primary-ex-small-title pricing-plan-purpple-title">45 min</h5>
                                <span class="price-rate">$130</span>
                                <a href="#" class="primary-btn1">Select</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="pricing-plan-box">
                                <h5 class="primary-ex-small-title pricing-plan-purpple-title">60 min</h5>
                                <span class="price-rate">$160</span>
                                <a href="#" class="primary-btn1">Select</a>
                            </div>
                        </div>
                    </div>
                    <p>
                        <strong> UPGRADE </strong> Senior Guide + $20/block Master Guide + $50/block
                    </p>
                </div>
            </div>
        </div>
        <div class="pricing-plan-faq fade-purpple-faq pb-80 pt-80">
            <div class="section-title">
                <h2 class="primary-small-title text-dark text-center">Billing FAQs</h2>
            </div>
            <div class="custom-faq-sec">
                <div class="accordion">
                    <div class="accordion-item">
                        <a class="accordion-header">What are my payment options?</a>
                        <div class="accordion-content">
                            <p>
                                Choose pay‑per‑session if you prefer to book as needed, or subscribe to a monthly plan
                                (Discovery, Quest, or Odyssey) for ongoing guidance at a lower per‑minute rate.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <a class="accordion-header">Is there a free trial available for subscriptions?</a>
                        <div class="accordion-content">
                            <p>
                                Yes. You can start with a 7‑day free trial to explore the platform before committing to
                                a plan.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <a class="accordion-header">When will I be billed?</a>
                        <div class="accordion-content">
                            <p>
                                Your plan renews monthly on the same day you enrolled (e.g., join on July 12 → renews on
                                August 12).
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <a class="accordion-header">Do unused minutes roll over?</a>
                        <div class="accordion-content">
                            <p>
                                No. Minutes expire at the end of your billing cycle—schedule sessions to use your full
                                allotment.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <a class="accordion-header">What if my payment fails?</a>
                        <div class="accordion-content">
                            <p>
                                We’ll notify you and retry the charge. Confirm your card details and billing address. If
                                it still fails, contact your bank or use a different card.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <a class="accordion-header">What happens if I run out of my monthly minutes?</a>
                        <div class="accordion-content">
                            <p>
                                Purchase add‑on minutes at the standard pay‑per‑session rate or upgrade to a higher
                                subscription tier.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <a class="accordion-header">How does Pay-Per-Session pricing work?</a>
                        <div class="accordion-content">
                            <p>
                                You choose a 15/30/45/60‑minute block at checkout. There’s no monthly commitment—pay
                                only for each session you book.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <a class="accordion-header">How do I pay?</a>
                        <div class="accordion-content">
                            <p>
                                You prepay at booking with a credit card—select your Guide, pick the session length, and
                                check out.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <a class="accordion-header">Can I switch between subscription and pay-per-session?</a>
                        <div class="accordion-content">
                            <p>
                                Yes. You can pause or cancel your subscription and book individual sessions instead, or
                                upgrade to a subscription any time.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <a class="accordion-header">How do I know which option is right for me?</a>
                        <div class="accordion-content">
                            <p>
                                If you connect regularly (even once or twice a month), a subscription is the best value.
                                If you book only when something specific comes up, pay‑per‑session offers flexibility.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pricing-plan-faq fade-purpple-faq pb-80">
            <div class="section-title">
                <h2 class="primary-small-title text-dark text-center">Subscription FAQs</h2>
            </div>
            <div class="custom-faq-sec">
                <div class="accordion">
                    <div class="accordion-item">
                        <a class="accordion-header">Is there a free trial available for subscriptions?</a>
                        <div class="accordion-content">
                            <p>
                                Yes. You can start with a 7‑day free trial to explore the platform before committing to
                                a plan.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <a class="accordion-header">What’s the difference between a subscription plan and
                            pay-per-session?</a>
                        <div class="accordion-content">
                            <p>
                                Subscriptions give you monthly minutes at a reduced per‑minute rate. Pay‑per‑session
                                lets you buy time in simple blocks at the standard rate with no monthly commitment.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <a class="accordion-header">What subscription tiers do you offer?</a>
                        <div class="accordion-content">
                            <p>
                                Discovery – $80/month for 30 minutes; Quest – $140/month for 60 minutes; Odyssey –
                                $200/month for 90 minutes.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <a class="accordion-header">What are the benefits of a monthly subscription?</a>
                        <div class="accordion-content">
                            <p>
                                Subscribers save each month with lower per‑minute pricing, get priority scheduling/early
                                access to select Guides, and can split minutes across multiple sessions.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <a class="accordion-header">Can I pause or cancel my subscription?</a>
                        <div class="accordion-content">
                            <p>
                                Yes. You can pause for up to 3 months or cancel in your Account Dashboard. For terms and
                                timing, see our cancellation policy.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <a class="accordion-header">Can I re-subscribe after cancelling?</a>
                        <div class="accordion-content">
                            <p>
                                Yes. You can re‑subscribe any time from your account or the subscription page.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <a class="accordion-header">What if I have an issue with my subscription or need assistance?</a>
                        <div class="accordion-content">
                            <p>
                                Please reach out via our Contact Us page and the team will assist with subscription
                                questions or issues.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection