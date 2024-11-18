<!DOCTYPE html>
<html>
    @include('frontEnd.includes.header')	
    <body>
        <!-- header -->
        @include('frontEnd.includes.menue')		
        <!-- //header -->
        <!-- bannerLeftCategory -->
        <!-- banner -->
        <div class="topBreadcrumb">
            <div class="container">
                <div class="col-md-3">
                    <div class="catDisplay" style="padding-right: 0px;padding-left: 0px;">
                        @include('frontEnd.home.bannerLeftCategory')
                    </div>
                    <div class="panel panel-default catColMenu" style="position: absolute;z-index: 4;width: 250px;">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                               <i class="fa fa-bars"></i> <a data-toggle="collapse" href="#collapse1"> CATEGORIES </a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            @include('frontEnd.home.topLeftCategory')
                        </div>
                    </div>
                </div>
                <div class="col-md-9 text-right" style="font-size: 12px;">
                    <i class="fa fa-home" aria-hidden="true"></i><a href="{{url('/')}}">Home</a><span>| Contact Us</span>
                </div>
            </div>
        </div>
        
            <!-- //products-breadcrumb -->
            <div class="fresh-vegetables">
                <div class="container">
                <div class="mail">

                    <h3>Mail Us</h3>
                    <h4 class="text-center text-success">{{Session::get('message')}}</h4>

                    <div class="agileinfo_mail_grids">
                        <div class="col-md-4 agileinfo_mail_grid_left">
                            <ul>
                                <li><i class="fa fa-home" aria-hidden="true"></i></li>
                                <li>address<span>{{$shopSetting->address}}</span></li>
                            </ul>
                            <ul>
                                <li><i class="fa fa-envelope" aria-hidden="true"></i></li>
                                <li>email<span><a href="mailto:info@example.com">{{$shopSetting->email}}</a></span></li>
                            </ul>
                            <ul>
                                <li><i class="fa fa-phone" aria-hidden="true"></i></li>
                                <li>call to us<span>+88{{$shopSetting->phone_no}}</span></li>
                            </ul>
                        </div>
                        <div class="col-md-8 agileinfo_mail_grid_right">
                            <form action="{{route('submit-contact-us')}}" method="post">
                                @csrf
                                @if(Auth::user())
                                    <textarea  name="message" required></textarea>
                                @else
                                    <div class="col-md-6 wthree_contact_left_grid">
                                        <input type="text" name="name" value="Name*" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                                    this.value = 'Name*';
                                                                }" required="">
                                        <input type="email" name="email" value="Email*" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                                    this.value = 'Email*';
                                                                }" required="">
                                    </div>
                                    <div class="col-md-6 wthree_contact_left_grid">
                                        <input type="text" name="telephone" value="Telephone*" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                                    this.value = 'Telephone*';
                                                                }" required="">
                                        <input type="text" name="subject" value="Subject*" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                                    this.value = 'Subject*';
                                                                }" required="">
                                    </div>
                                    <div class="clearfix"> </div>
                                    <textarea  name="message" required></textarea>
                                    @endif
                                <input type="submit" value="Submit">
                                <input type="reset" value="Clear">
                            </form>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div><br>
                <!-- //mail -->
            </div>
            </div>


            <div class="clearfix"></div>
        <!-- newsletter -->
        @include('frontEnd.home.newsLetter')
        <!-- //newsletter -->
        <!-- footer -->
        @include('frontEnd.includes.footer')	
        <!-- //footer -->
        <!-- Core JavaScript -->
        @include('frontEnd.includes.scripts')
        <!-- //Core JavaScript -->
    </body>
</html>
