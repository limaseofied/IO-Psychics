 <footer>
        <div class="footer-contents">
            <div class="row footer-link-row">
                <div class="col-md-6 col-lg-2">
                    <div class="quick-links">
                        <h2 class="footer-title">Explore</h2>
                        <ul>
                            <li><a href="{{ route('about') }}">About IO</a></li>
                            <li><a href="{{ route('how.it.works') }}">How It Works</a></li>
                            <li><a href="{{ route('horoscopes') }}">Horoscopes</a></li>
                            <li><a href="{{ route('blog') }}">Blog</a></li>
                            <li><a href="{{ route('plans') }}">Plans & Pricing</a></li>
                            {{-- <li><a href="#">IO Rewards</a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div class="quick-links">
                        <h2 class="footer-title">Meet Guides</h2>
                        <ul>
                            <li><a href="{{ route('guides') }}">All Guides</a></li>
                            <li><a href="{{ route('guides') }}">Love Guides</a></li>
                            <li><a href="{{ route('guides') }}">Career & Finance Guides</a></li>
                            <li><a href="{{ route('guides') }}">Mediums</a></li>
                            <li><a href="{{ route('guides') }}">Tarot</a></li>
                            <li><a href="{{ route('guides') }}">Connect by Topic</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="quick-links footer-logo-social-btns">
                        <img src="{{ asset('frontassets/images/website_log.webp')}}" alt="" class="footer-logo">
                        <a href="{{ route('free.trial') }}" class="primary-btn1">Unlock Your Free Trial</a>
                        <ul class="footer-social">
                            <li>
                                <a href="#" target="_blank">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="fa-brands fa-tiktok"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div class="quick-links">
                        <h2 class="footer-title">Seeker Support</h2>
                        <ul>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            <li><a href="{{ route('help-center') }}">Help Center</a></li>
                            <li><a href="{{ route('contact') }}">Seeker Support</a></li>
                            <li><a href="{{ route('contact') }}">Guide Support</a></li>
                            <li><a href="{{ route('become-gifted-guide') }}">Become A Gifted Guide</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div class="quick-links">
                        <div class="subscribe-follow">
                            <h2 class="footer-title">Newsletter Signup</h2>
                            <p>
                                Signup to get the latest updates. We will not spam you!
                            </p>
                            <div class="footer-newsletter">
                                <form action="">
                                    <input type="email" class="form-control" id="email_id" name="email_id"
                                        aria-describedby="emailHelp" placeholder="Email Address">
                                    <button type="submit">
                                        <img src="{{ asset('frontassets/images/buttonstar.webp')}}" alt="">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="footer-copyright">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright-content text-center">
                        <p>©{{date('Y')}} IO Psychics. All Rights Reserved.
                            <a href="#"> Customer Terms of Use.</a>
                            <a href="#"> Psychics Terms of Use.</a>
                            <a href="#"> Disclaimer.</a>
                            <a href="#"> Privacy Policy</a>
                            <a href="#"> Code of Ethics.</a>
                            <a href="#"> Satisfaction Guarantee Policy.</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </footer>
    <!-- ------ Footer End ------ -->

    <!-- -------- Bottom to Top Scroll Button and Whatsapp Button Start ------------->
    <button onclick="scrollToTop()" id="scrollTopBtn" class="show">
        <i class="fa-solid fa-angle-up"></i>
    </button>
    <!-- -------- Bottom to Top Scroll Button and Whatsapp Button End ------------->

    <script src="{{ asset('frontassets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontassets/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontassets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontassets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontassets/js/custom.js') }}"></script>
    <script src="{{ asset('frontassets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontassets/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('frontassets/js/mediaelement-and-player.min.js') }}"></script>

