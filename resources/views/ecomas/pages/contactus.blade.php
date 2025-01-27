
@extends('ecomas.master')
@section('title')
{{$settings->website_name}} - Contact Us
@endsection
@section('content')
    <!-- page-title -->
    <div class="tf-page-title style-2">
        <div class="container-full">
            <div class="heading text-center">Contact Us</div>
        </div>
    </div>
    <!-- /page-title -->
    <!-- map -->
    <section class="flat-spacing-9">
        <div class="container">
            <div class="tf-grid-layout gap-0 lg-col-2">
                <div class="w-100">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.3950376758467!2d91.82702011495537!3d22.338707985303696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30ad2758048e1465%3A0x56b3d539d5367b41!2zSkFGUkVFIFRSQURFUlMgKOCmnOCmvuCmq-CmsOCngCDgpp_gp43gprDgp4fgpqHgpr7gprDgp43gprgp!5e0!3m2!1sen!2sbd!4v1649253827865!5m2!1sen!2sbd"></iframe>
                </div>
                <div class="tf-content-left has-mt">
                    <div class="sticky-top">
                        <h5 class="mb_20">Visit Our Store</h5>
                        <div class="mb_20">
                            <p class="mb_15"><strong>Address</strong></p>
                            <p>{{$settings->address}}</p>
                        </div>
                        <div class="mb_20">
                            <p class="mb_15"><strong>Phone</strong></p>
                            <p>{{$settings->phone}}</p>
                        </div>
                        <div class="mb_20">
                            <p class="mb_15"><strong>Email</strong></p>
                            <p>{{$settings->email}}</p>
                        </div>
                        <div class="mb_36">
                            <p class="mb_15"><strong>Open Time</strong></p>
                            <p class="mb_15">Our store has re-opened for shopping, </p>
                            <p>{{$settings->opening_hour}} <br> {{$settings->opening_day}}</p>
                        </div>
                        <div>
                            <ul class="tf-social-icon d-flex gap-20 style-default">
                                <li><a href="#" class="box-icon link round social-facebook border-line-black"><i class="icon fs-14 icon-fb"></i></a></li>
                                <li><a href="#" class="box-icon link round social-twiter border-line-black"><i class="icon fs-12 icon-Icon-x"></i></a></li>
                                <li><a href="#" class="box-icon link round social-instagram border-line-black"><i class="icon fs-14 icon-instagram"></i></a></li>
                                <li><a href="#" class="box-icon link round social-tiktok border-line-black"><i class="icon fs-14 icon-tiktok"></i></a></li>
                                <li><a href="#" class="box-icon link round social-pinterest border-line-black"><i class="icon fs-14 icon-pinterest-1"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /map -->
    <!-- form -->
    <section class="bg_grey-7 flat-spacing-9">
        <div class="container">
            <div class="flat-title">
                <span class="title">Get in Touch</span>
                <p class="sub-title text_black-2">If you’ve got great products your making or looking to work with us then drop us a line.</p>
            </div>
            <div>
                <form class="mw-705 mx-auto text-center form-contact" id="contactform" action="./contact/contact-process.php" method="post">
                    <div class="d-flex gap-15 mb_15">
                        <fieldset class="w-100">
                            <input type="text" name="name" id="name" required placeholder="Name *"/>
                        </fieldset>
                        <fieldset class="w-100">
                            <input type="email" name="email" id="email" required placeholder="Email *"/>
                        </fieldset>
                    </div>
                    <div class="mb_15">
                        <textarea placeholder="Message" name="message" id="message" required cols="30" rows="10"></textarea>
                    </div>
                    <div class="send-wrap">
                        <button type="submit" class="tf-btn radius-3 btn-fill animate-hover-btn justify-content-center">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /form -->
@endsection