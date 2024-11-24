@extends('website.master')
@section('title')
{{$settings->website_name}}-Contact Us
@endsection
<link rel="icon" type="image/png" href="{{asset('website/images/setting/'.$settings->image)}}">
@section('content')

<div class="site__body">
    <div class="block-map block">
        <div class="block-map__body"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.3950376758467!2d91.82702011495537!3d22.338707985303696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30ad2758048e1465%3A0x56b3d539d5367b41!2zSkFGUkVFIFRSQURFUlMgKOCmnOCmvuCmq-CmsOCngCDgpp_gp43gprDgp4fgpqHgpr7gprDgp43gprgp!5e0!3m2!1sen!2sbd!4v1649253827865!5m2!1sen!2sbd" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div>
    </div>
    <div class="page-header">
        <div class="page-header__container container">
            <!-- <div class="page-header__breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a> <svg class="breadcrumb-arrow" width="6px" height="9px">
                                        <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                    </svg></li>
                                <li class="breadcrumb-item"><a href="#">Breadcrumb</a> <svg class="breadcrumb-arrow" width="6px" height="9px">
                                        <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                    </svg></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                            </ol>
                        </nav>
                    </div> -->
            <div class="page-header__title">
                <h1>Contact Us</h1>
            </div>
        </div>
    </div>
    <div class="block">
        <div class="container">
            <div class="card mb-0">
                <div class="card-body contact-us">
                    <div class="contact-us__container">
                        <div class="row">
                            <div class="col-12 col-lg-6 pb-4 pb-lg-0">
                                <h4 class="contact-us__header card-title">Our Address</h4>
                                <div class="contact-us__address">
                                    <p>{{$settings->website_name}}<br>Email: {{$settings->email}}<br>Phone Number: {{$settings->phone}}</p>
                                    <p><strong>Opening Hours</strong><br>{{$settings->opening_hour}}</p>
                                    <p><strong>Opening Day</strong><br>{{$settings->opening_day}}<br></p>

                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <h4 class="contact-us__header card-title">Leave us a Message</h4>
                                <form id="messageForm" method="POST" enctype="multipart/form-data" action="#">
    @csrf
                                
                                <input type="hidden" name="id">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="form-name">Your Name</label> 
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Your Name">
                                        <span class="text-danger" id="nameError"></span>
                                    </div>
                                        <div class="form-group col-md-6">
                                            <label for="form-email">Email</label> 
                                            <input type="email" id="email"  name="email"  class="form-control" placeholder="Email Address">
                                            <span class="text-danger" id="emailError"></span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="form-subject">Subject</label> 
                                            <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject">
                                            <span class="text-danger" id="textError"></span>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="form-mobile">Mobile</label>
                                             <input type="number" id="mobile" name="mobile" class="form-control" placeholder="Mobile Number">
                                             <span class="text-danger" id="textError"></span>
                                            </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="form-message">Message</label>
                                         <textarea id="text" name="text" class="form-control" rows="4"></textarea>
                                         <span class="text-danger" id="textError"></span>
                                        </div>
                                    <button type="submit" class="btn btn-primary" >Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    
</script>
@endsection