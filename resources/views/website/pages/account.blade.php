<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{asset('website/images/JT 3D png-07.png')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
    <link rel="stylesheet" href="{{asset('website/vendor/bootstrap-4.2.1/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/vendor/owl-carousel-2.3.4/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/style.css')}}">
    <script src="{{asset('website/vendor/jquery-3.3.1/jquery.min.js')}}"></script>
    <script src="{{asset('website/vendor/bootstrap-4.2.1/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('website/vendor/owl-carousel-2.3.4/owl.carousel.min.js')}}"></script>
    <script src="{{asset('website/vendor/nouislider-12.1.0/nouislider.min.js')}}"></script>
    <script src="{{asset('website/js/number.js')}}"></script>
    <script src="{{asset('website/js/main.js')}}"></script>
    <script src="{{asset('website/vendor/svg4everybody-2.1.9/svg4everybody.min.js')}}"></script>
    <script>svg4everybody();</script><!-- font - fontawesome -->
    <link rel="stylesheet" href="{{asset('website/vendor/fontawesome-5.6.1/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/fonts/stroyka/stroyka.css')}}">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-97489509-6"></script>
    <script>window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments); } gtag('js', new Date()); gtag('config', 'UA-97489509-6');</script>
</head>
        <div class="site__body">
          

                <!-- <div class="container">
                        <div class="col-md-6">
                            <div class="card flex-grow-1 mb-md-0">
                                <div class="card-body">
                                  <h3 class="card-title">Login</h3>
                                    <form>
                                        <div class="form-group"><label>Email address</label> <input type="email" class="form-control" placeholder="Enter email"></div>
                                        <div class="form-group"><label>Password</label> <input type="password" class="form-control" placeholder="Password"> <small class="form-text text-muted"><a href="#">Forgotten Password</a></small></div>
                                        <div class="form-group">
                                            <div class="form-check"><span class="form-check-input input-check"><span class="input-check__body"><input class="input-check__input" type="checkbox" id="login-remember"> <span class="input-check__box"></span> <svg class="input-check__icon" width="9px" height="7px">
                                                            <use xlink:href="images/sprite.svg#check-9x7"></use>
                                                        </svg> </span></span><label class="form-check-label" for="login-remember">Remember Me</label></div>
                                        </div><button type="submit" class="btn btn-primary mt-4">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                </div> -->
                <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
    <div class="col-md-6">
        <div class="card flex-grow-1 mb-md-0">
            <div class="card-body">
                <h3 class="card-title text-center">Login</h3>
                <form>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password">
                        <small class="form-text text-muted"><a href="#">Forgotten Password</a></small>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <span class="form-check-input input-check">
                                <span class="input-check__body">
                                    <input class="input-check__input" type="checkbox" id="login-remember">
                                    <span class="input-check__box"></span>
                                    <svg class="input-check__icon" width="9px" height="7px">
                                        <use xlink:href="images/sprite.svg#check-9x7"></use>
                                    </svg>
                                </span>
                            </span>
                            <label class="form-check-label" for="login-remember">Remember Me</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>


        </div>
    
        <footer class="site__footer">
            <div class="site-footer">
                <div class="container">
                    <div class="site-footer__widgets">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="site-footer__widget footer-contacts">
                                    <h5 class="footer-contacts__title">Contact Us</h5>
                                    <div class="footer-contacts__text">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit. Integer in feugiat lorem. Pellentque ac placerat tellus.</div>
                                    <ul class="footer-contacts__contacts">
                                        <li><i class="footer-contacts__icon fas fa-globe-americas"></i> 715 Fake Street,
                                            New York 10021 USA</li>
                                        <li><i class="footer-contacts__icon far fa-envelope"></i> stroyka@example.com
                                        </li>
                                        <li><i class="footer-contacts__icon fas fa-mobile-alt"></i> (800) 060-0730,
                                            (800) 060-0730</li>
                                        <li><i class="footer-contacts__icon far fa-clock"></i> Mon-Sat 10:00pm - 7:00pm
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
                                            <a href="https://themeforest.net/user/kos9" target="_blank"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li
                                            class="footer-newsletter__social-link footer-newsletter__social-link--twitter">
                                            <a href="https://themeforest.net/user/kos9" target="_blank"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li
                                            class="footer-newsletter__social-link footer-newsletter__social-link--youtube">
                                            <a href="https://themeforest.net/user/kos9" target="_blank"><i
                                                    class="fab fa-youtube"></i></a></li>
                                        <li
                                            class="footer-newsletter__social-link footer-newsletter__social-link--instagram">
                                            <a href="https://themeforest.net/user/kos9" target="_blank"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        <li class="footer-newsletter__social-link footer-newsletter__social-link--rss">
                                            <a href="https://themeforest.net/user/kos9" target="_blank"><i
                                                    class="fas fa-rss"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="site-footer__bottom">
                        <div class="site-footer__copyright"><a target="_blank"
                                href="https://www.templateshub.net">Templates Hub</a></div>
                        <div class="site-footer__payments"><img src="images/payments.png" alt=""></div>
                    </div>
                </div>
            </div>
        </footer><!-- site__footer / end -->