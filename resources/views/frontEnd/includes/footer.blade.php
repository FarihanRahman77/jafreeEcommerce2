<style>
.custom-modal{
	position: fixed;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	width: fit-content;
	height: fit-content;
	padding: 0 !important;
}
.modal-dialog{margin: 0;}



.panel-title > a:before {
    float: right !important;
    font-family: FontAwesome;
    content:"\f068";
    padding-right: 5px;
}
.panel-title > a.collapsed:before {
    float: right !important;
    content:"\f067";
}
.panel-title > a:hover, 
.panel-title > a:active, 
.panel-title > a:focus  {
    text-decoration:none;
}
.panel-heading {
    padding: 10px 20px;
    border-bottom: 1px solid transparent;
    border-top-right-radius: 3px;
    border-top-left-radius: 3px;
}
.jumbotron {
    padding-top: 30px;
    padding-bottom: 30px;
    margin-bottom: 30px;
    color: inherit;
    background-color: #00bcd4;
    text-align: center;
    color: #fff;
}


</style>
<!--/ Old Cart modal Portion-->
    <!--div id="cartModal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog">
        
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cart <i class="fa fa-shopping-cart"></i></h4>
            </div>
            <div class="modal-body">
                <table  id="cartBody" class="table table-bordered datatable"></table>
            </div>
    	    <div class="modal-footer">
    		    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-default" onclick="clearCart()">Clear Cart</button>
                <a type="button" class="btn btn-default" href="{{url('checkout')}}">Check Out</a>
            </div>
        </div>
        </div>
    </div-->
    <!--/ Old Cart modal Portion-->  
    
    <!--/ Cart Left Option-->
    <div class="cbp-spmenu-push">
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" style="border: 1px solid #cacaca;" id="cbp-spmenu-s2">
            <div class="cart_header">
                <button type="button" class="close" onclick="closeCart()">&times;</button>
                <h4 class="modal-title"><i class="fas fa-shopping-cart"></i> Cart </h4>
            </div>
            <div class="cart_body">
                <table  id="cartBody" class="cart_font_Size"></table>
                <center><i class="fa fa-spinner fa-spin" style="font-size:24px;color:#000;display:none;" id="cartLoader"></i></center>
            </div>
            <div class="cart_total">Total : {!!Session::get("currency")!!} <span id="viewCartTotalPrice"></span></div>
            <div class="cart_footer">
                <button type="button" class="btn btn-default" onclick="closeCart()">Close</button>
                <button type="button" class="btn btn-default" onclick="clearCart()">Clear Cart</button>
                <a type="button" class="btn btn-default" href="{{url('checkout')}}">Check Out</a>
            </div>
        </nav>
    </div> 
    <!--// Cart Option--> 
    
<div class="footer">
    <div class="container">
        
        <div class="col-md-3 w3_footer_grid panel-default">
            <div class="panel-heading" role="tab" id="headingZero">
                <h4 class="panel-title">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseZero" aria-expanded="false" aria-controls="collapseZero">
                    Information
                  </a>
                </h4>
            </div>
            <div id="collapseZero" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingZero">
                <div class="panel-body">
                    <ul class="w3_footer_grid_list">
                        <li><a href="{{url('/events')}}">Events</a></li>
                        <li><a href="{{url('/aboutUs')}}">About Us</a></li>
                        <li><a href="{{url('/bestDeals')}}">Best Deals</a></li>
                        <li><a href="{{url('/service')}}">Services</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3 w3_footer_grid panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Policy info
                  </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <ul class="w3_footer_grid_list">
                        <li><a href="{{url('termsCondition')}}">privacy policy</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3 w3_footer_grid panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    What in stores
                  </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    <ul class="w3_footer_grid_list">
                    <li><a href="#">Nuts</a></li>
                    <li><a href="#">Dry Fruits</a></li>
                    <li><a href="#">Spyces</a></li>
                    <li><a href="#">Herbes</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3 w3_footer_grid footerSocialIcon">
            <ul class="w3_footer_grid_list" style="display: flex;">
            <li><a href="#" ><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#" ><i class="fab fa-twitter"></i></a></li>
            <li><a href="#" ><i class="fab fa-instagram"></i></a></li>
            <li><a href="#" ><i class="fab fa-dribbble"></i></a></li>
            </ul>
        </div>
    </div> 
    <div style="border: 1px solid #d2d2d2;">
        <div class="container">
            <div class="" style="text-align: center;">
                <ul class="footerInfor">
                    <li style="margin: 1%"><a alt="Privacy notice" target="_self" href="#cookiePopup" onclick="manageCookies()"><span>Manage Cookies</span></a></li>
                    <li style="margin: 1%"><a alt="Privacy notice" target="_self"><span>Privacy notice</span></a></li>
                    <li style="margin: 1%"><a alt="Website Cookies" target="_self" href="{{url('/websiteCookie')}}" ><span>Website Cookies</span></a></li>
                    <li style="margin: 1%"><a alt="Terms and conditions"  href="{{url('/termsCondition')}}" target="_self"><span>Terms and conditions</span></a></li>
                    <li style="margin: 1%"><a alt="Accessibility" href="{{url('/termsCondition')}}"  target="_self"><span>Accessibility</span></a></li>
                    <li style="margin: 1%"><a alt="Carrier bag charge" href="{{url('/termsCondition')}}" target="_self"><span>Carrier bag charge</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="clearfix"> </div>
        <div class="agile_footer_grids">
            <div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
                <div class="w3_footer_grid_bottom">
                    <h4>100% secure payments</h4>
                    <img src="{{asset('frontEnd/images/card.png')}}" alt=" " class="img-responsive" />
                </div>
            </div>
            <div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
                <div class="w3_footer_grid_bottom">
                    <h5 style="line-height: 21px;">connect with us <br><i class="fas fa-phone-alt" aria-hidden="true"></i> <b style="color:#337ab7;"> 07429 613046</b><br><i class="fa fa-envelope" aria-hidden="true"></i> <b style="color:#337ab7;"> store@jaman.co.uk</b></h5>
                    
                </div>
            </div>
            <div class="col-md-6">
                <h5 style="color: #1a1a1a;font-size: 1em;">© 2021 jaman.co.uk. All rights reserved | Design by <a href="https://alitechbd.com/">Alitechbd</a></h5>
            </div>
            <div class="clearfix"> </div>
        </div>
        
    </div>
</div>


<div class="footerMobile">
    <div class="container">
        <h5 style="color: #1a1a1a;font-size: 1em;">© 2021 jaman.co.uk. All rights reserved | Design by <a href="https://alitechbd.com/">Alitechbd</a></h5>
        
    </div>
</div>
