<footer class="site__footer">
    <div class="site-footer">
        <div class="custom-container">
            <div class="site-footer__widgets">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="site-footer__widget footer-contacts">
                            <h5 class="footer-contacts__title">Contact Us</h5>
                            <div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius ratione accusamus consequuntur non quod voluptas adipisci blanditiis aliquam saepe repellendus modi rem perferendis, numquam tempore ea, nemo alias. Ipsum, cupiditate.</p>
                            </div>
                            <ul class="footer-contacts__contacts">
                                <li><i class="footer-contacts__icon fas fa-globe-americas"></i> {{$settings->address}}</li>
                                <li><i class="footer-contacts__icon far fa-envelope"></i> {{$settings->email}}
                                </li>
                                <li><i class="footer-contacts__icon fas fa-mobile-alt"></i> {{$settings->phone}}</li>
                                <li><i class="footer-contacts__icon far fa-clock"></i>{{$settings->opening_hour}}
                                </li>
                                <li><i class="footer-contacts__icon far fa-clock"></i>{{$settings->opening_day}}
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 col-lg-2">
                        <div class="site-footer__widget footer-links">
                            <h5 class="footer-links__title">Information</h5>
                            <ul class="footer-links__list">
                                <li class="footer-links__item"><a href="#" class="footer-links__link">About
                                        Us</a></li>
                                <li class="footer-links__item"><a href="#" class="footer-links__link">Delivery
                                        Information</a></li>
                                <li class="footer-links__item"><a href="#" class="footer-links__link">Privacy
                                        Policy</a></li>
                                <li class="footer-links__item"><a href="#" class="footer-links__link">Brands</a>
                                </li>
                                <li class="footer-links__item"><a href="#" class="footer-links__link">Contact
                                        Us</a></li>
                                <li class="footer-links__item"><a href="#"
                                        class="footer-links__link">Returns</a></li>
                                <li class="footer-links__item"><a href="#" class="footer-links__link">Site
                                        Map</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2">
                        <div class="site-footer__widget footer-links">
                            <h5 class="footer-links__title">My Account</h5>
                            <ul class="footer-links__list">
                                <li class="footer-links__item"><a href="#" class="footer-links__link">Store
                                        Location</a></li>
                                <li class="footer-links__item"><a href="#" class="footer-links__link">Order
                                        History</a></li>
                                <li class="footer-links__item"><a href="#" class="footer-links__link">Wish
                                        List</a></li>
                                <li class="footer-links__item"><a href="#"
                                        class="footer-links__link">Newsletter</a></li>
                                <li class="footer-links__item"><a href="#"
                                        class="footer-links__link">Specials</a></li>
                                <li class="footer-links__item"><a href="#" class="footer-links__link">Gift
                                        Certificates</a></li>
                                <li class="footer-links__item"><a href="#"
                                        class="footer-links__link">Affiliate</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="site-footer__widget footer-newsletter">
                            <h5 class="footer-newsletter__title">Newsletter</h5>
                            <div class="footer-newsletter__text">Praesent pellentesque volutpat ex, vitae auctor
                                lorem pulvinar mollis felis at lacinia.</div>
                            <form action="#" class="footer-newsletter__form"><label class="sr-only"
                                    for="footer-newsletter-address">Email Address</label> <input type="text"
                                    class="footer-newsletter__form-input form-control"
                                    id="footer-newsletter-address" placeholder="Email Address..."> <button
                                    class="footer-newsletter__form-button btn btn-primary">Subscribe</button>
                            </form>
                            <div class="footer-newsletter__text footer-newsletter__text--social">Follow us on
                                social networks</div>
                            <ul class="footer-newsletter__social-links">
                                <li
                                    class="footer-newsletter__social-link footer-newsletter__social-link--facebook">
                                    <a href="{{$settings->facebook}}" target="_blank"><i
                                            class="fab fa-facebook-f"></i></a>
                                </li>
                                <li
                                    class="footer-newsletter__social-link footer-newsletter__social-link--twitter">
                                    <a href="{{$settings->linkedin}}" target="_blank"><i
                                            class="fab fa-linkedin"></i></a>
                                </li>
                                <li
                                    class="footer-newsletter__social-link footer-newsletter__social-link--youtube">
                                    <a href="{{$settings->youtube}}" target="_blank"><i
                                            class="fab fa-youtube"></i></a>
                                </li>
                                <li
                                    class="footer-newsletter__social-link footer-newsletter__social-link--instagram">
                                    <a href="{{$settings->instagram}}" target="_blank"><i
                                            class="fab fa-instagram"></i></a>
                                </li>
                                <!-- <li class="footer-newsletter__social-link footer-newsletter__social-link--rss">
                                            <a href="https://themeforest.net/user/kos9" target="_blank"><i
                                                    class="fas fa-rss"></i></a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-footer__bottom">
                <div class="site-footer__copyright"><a target="_blank"
                        href="https://alitechbd.com/">Ali Technology</a></div>
                <div class="site-footer__payments"><img src="images/payments.png" alt=""></div>
            </div>
        </div>
    </div>
    
    <div class="indicator indicator--mobile2"> 
        <a href="{{ url('/card') }}" class="indicator__button2"> 
            <div class="indicator__area2"> 
                <i class="fa fa-cart-arrow-down"></i> 
                <div class="indicator__value2" id="cartCounterTextFooter">0</div> 
            </div>
        </a>
    </div>
    <div class="alert-message"> 
        <div class="alert alert-success p-3" role="alert" style="display:none;" id="successMessage"></div>
        <div class="alert alert-danger p-3" role="alert" style="display:none;" id="errorMessage"></div>
    </div>
</footer><!-- site__footer / end -->