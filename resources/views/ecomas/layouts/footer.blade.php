<!-- footer -->
<footer id="footer" class="footer background-gray md-pb-70">
            <div class="footer-wrap">
                <div class="footer-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-12">
                                <div class="footer-infor">
                                    <div class="footer-logo">
                                        <a href="index.html">
                                            <img src="images/logo/logo.svg" alt="">
                                        </a>
                                    </div>
                                    <ul>
                                        <li>
                                            <p>Address: {{$settings->address}}</p>
                                        </li>
                                        <li>
                                            <p>Email: {{$settings->email}}</p>
                                        </li>
                                        <li>
                                            <p>Phone: {{$settings->phone}}</p>
                                        </li>
                                    </ul>
                                    <a href="contact-1.html" class="tf-btn btn-line">Get direction<i class="icon icon-arrow1-top-left"></i></a>
                                    <ul class="tf-social-icon d-flex gap-10">
                                        <li><a href="#" class="box-icon w_34 round social-facebook social-line"><i class="icon fs-14 icon-fb"></i></a></li>
                                        <li><a href="#" class="box-icon w_34 round social-twiter social-line"><i class="icon fs-12 icon-Icon-x"></i></a></li>
                                        <li><a href="#" class="box-icon w_34 round social-instagram social-line"><i class="icon fs-14 icon-instagram"></i></a></li>
                                        <li><a href="#" class="box-icon w_34 round social-tiktok social-line"><i class="icon fs-14 icon-tiktok"></i></a></li>
                                        <li><a href="#" class="box-icon w_34 round social-pinterest social-line"><i class="icon fs-14 icon-pinterest-1"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-12 footer-col-block">
                                <div class="footer-heading footer-heading-desktop">
                                    <h6>Help</h6>
                                </div>
                                <div class="footer-heading footer-heading-moblie">
                                    <h6>Help</h6>
                                </div>
                                <ul class="footer-menu-list tf-collapse-content">
                                    <li>
                                        <a href="{{url('/privacyPolicy')}}" class="footer-menu_item">Privacy Policy</a>
                                    </li>
                                    <li> 
                                        <a href="{{url('/termscondition')}}" class="footer-menu_item">Terms &amp; Conditions</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/faq')}}" class="footer-menu_item">FAQ’s</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xl-3 col-md-6 col-12 footer-col-block">
                                <div class="footer-heading footer-heading-desktop">
                                    <h6>About us</h6>
                                </div>
                                <div class="footer-heading footer-heading-moblie">
                                    <h6>About us</h6>
                                </div>
                                <ul class="footer-menu-list tf-collapse-content">
                                    <li>
                                        <a href="about-us.html" class="footer-menu_item">Our Story</a>
                                    </li>
                                    <li> 
                                        <a href="our-store.html" class="footer-menu_item">Visit Our Store</a>
                                    </li>
                                    <li> 
                                        <a href="{{url('/contactus')}}" class="footer-menu_item">Contact Us</a>
                                    </li>
                                    <li> 
                                        <a href="login.html" class="footer-menu_item">Account</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xl-3 col-md-6 col-12">
                                <div class="footer-newsletter footer-col-block">
                                    <div class="footer-heading footer-heading-desktop">
                                        <h6>Sign Up for Email</h6>
                                    </div>
                                    <div class="footer-heading footer-heading-moblie">
                                        <h6>Sign Up for Email</h6>
                                    </div>
                                    <div class="tf-collapse-content">
                                        <div class="footer-menu_item">Sign up to get first dibs on new arrivals, sales, exclusive content, events and more!</div>
                                        <form class="form-newsletter" id="subscribe-form" action="#" method="post" accept-charset="utf-8" data-mailchimp="true">
                                            <div id="subscribe-content">
                                                <fieldset class="email">
                                                    <input type="email" name="email-form" id="subscribe-email" placeholder="Enter your email...." tabindex="0" aria-required="true">
                                                </fieldset>
                                                <div class="button-submit">
                                                    <button id="subscribe-button" class="tf-btn btn-sm radius-3 btn-fill btn-icon animate-hover-btn" type="button">Subscribe<i class="icon icon-arrow1-top-left"></i></button>
                                                </div>
                                            </div>
                                            <div id="subscribe-msg"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="footer-bottom-wrap d-flex gap-20 flex-wrap justify-content-between align-items-center">
                                    <div class="footer-menu_item">© 2025 Ali Technology. All Rights Reserved</div>
                                    <div class="tf-payment">
                                        <img src="images/payments/visa.png" alt="">
                                        <img src="images/payments/img-1.png" alt="">
                                        <img src="images/payments/img-2.png" alt="">
                                        <img src="images/payments/img-3.png" alt="">
                                        <img src="images/payments/img-4.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Floating Cart Button -->
            <a href="#shoppingCart" class="btn btn-outline-primary cart-button" data-bs-toggle="modal">
                <i class="fa fa-cart-plus text-primary"></i>
                <span class="badge badge-danger position-absolute" style="top: -10px; right: -10px;" id="cartCounterTextFooter">0</span>
            </a>
            <div class="alert-message"> 
                <div class="alert alert-success p-3" role="alert" style="display:none;" id="successMessage"></div>
                <div class="alert alert-danger p-3" role="alert" style="display:none;" id="errorMessage"></div>
            </div>
        </footer>
        <!-- /footer -->