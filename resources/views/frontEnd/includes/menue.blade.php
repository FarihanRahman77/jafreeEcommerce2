@if(!empty($_COOKIE[config('eu-cookie-consent.cookie_name')]))
    <div id="cookiePopup" style="display:none">{!! EuCookieConsent::getPopup() !!}</div>
@else
	<div id="cookiePopup">{!! EuCookieConsent::getPopup() !!}</div>
@endif
<div class="agileits_header">
    <div class="w3l_offers">
        <a href="{{url('/')}}">Today's special Offers !</a>
    </div>
    <div class="loginMenu">
        <div class="logInSub">
                <ul class="fh5co-social">
                        @if(Route::has('login'))
                        @auth
                        @if(Auth::user()->utype ==='ADM')
                        <li class="dropdown profile_details_drop" style="border-right: none;">
                            <div>
                                <a href="#" class="dropdown-toggle"  data-toggle="dropdown">({{Auth::user()->name}})<b class="caret"></b></a>
                            </div>
                            <ul class="dropdown-menu" >
                                <li style="border-right: none;">
                                    <a href="{{url('/dashboard')}}">Dashboard</a>
                                </li>
                                <li style="border-right: none;">
                                    <a href="{{ route('logout') }}"onclick="event.preventDefault();
                                    document.getElementById('logoutForm').submit();">Logout</a>
                                </li>
                                    <form method="POST" id="logoutForm" action="{{ route('logout') }}">
                                        @csrf
                                    </form>
                        </ul>
                    </li>
                    @else
                    <li class="dropdown profile_details_drop" style="border-right: none;">
                        <div>
                           <i class="fa fa-user" aria-hidden="true" style="color:#fff"></i>  <a href="#" class="dropdown-toggle" data-toggle="dropdown">({{Auth::user()->name}}) <span class="caret"></span></a>
                        </div>
                        <ul class="dropdown-menu" >
                            <li style="border-right: none;">
                                <a href="{{url('/userDashboard')}}">Dashboard</a>
                            </li>
                            <li style="border-right: none;">
                                <a href="{{route('user-profile-view')}}">Your Profile</a>
                            </li>
                            <li style="border-right: none;">
                                <a href="{{route('user-order-list',['id'=>'all'])}}">Your Order</a>
                            </li>
                            <li style="border-right: none;">
                                <a href="{{route('user-payment-history')}}">Payment History</a>
                            </li>
                            <li style="border-right: none;">
                                <a href="{{route('user-change-password')}}">Change Password</a>
                            </li>
                            <li style="border-right: none;">
                                <a href="{{ route('logout') }}"onclick="event.preventDefault();
                                document.getElementById('logoutForm').submit();">Logout</a>
                            </li>
                            <form method="POST" id="logoutForm" action="{{ route('logout') }}">
                                @csrf
                            </form>
            
                        </ul>
                    </li>
                    @endif
                    @else
                    
                        <a href="{{url('/login')}}"><i class="fa fa-user" aria-hidden="true"></i> <u>SIGN IN</u></a>	
                    	
                    @endif
            
                    @endif
            
                </ul>
            </div>
        <div class="registerSub"><a href="{{url('/register')}}">REGISTER</a></div>
    </div>    
    <div class="w3l_search">
        <div class="form-group">
            <form action="{{route('search-products')}}" id="form_search" method="post">
                @csrf
                <input type="text" name="searchProduct" id="searchProduct" placeholder="Search a product..." autocomplete="off">
                <div id="productList"></div>
                <input type="submit" value="">
            </form>
            
        </div>

    </div>
    <!--div class="product_list_header">  
        <form action="#" method="post" class="last">
            <fieldset>
                <input type="hidden" name="cmd" value="_cart" />
                <input type="hidden" name="display" value="1" />
                <input type="button" name="submit" value="View your cart" class="button" onclick="viewCart('model')" />
            </fieldset>
        </form>
    </div-->
    <div class="w3l_header_right">
        <ul class="fh5co-social">
            @if(Route::has('login'))
            @auth
            @if(Auth::user()->utype ==='ADM')
            <li class="dropdown profile_details_drop" style="border-right: none;">
                <div style="padding: 1em 1em;">
                    <a href="#" class="dropdown-toggle"  data-toggle="dropdown">({{Auth::user()->name}})<b class="caret"></b></a>
                </div>
                <ul class="dropdown-menu" >
                    <li style="border-right: none;">
                        <a href="{{url('/dashboard')}}">Dashboard</a>
                    </li>
                    <li style="border-right: none;">
                        <a href="{{ route('logout') }}"onclick="event.preventDefault();
                        document.getElementById('logoutForm').submit();">Logout</a>
                    </li>
                        <form method="POST" id="logoutForm" action="{{ route('logout') }}">
                            @csrf
                        </form>
            </ul>
        </li>
        @else
        <li class="dropdown profile_details_drop" style="border-right: none;">
            <div style="padding: 1em 1em;">
               <i class="fa fa-user" aria-hidden="true" style="color:#fff"></i>  <a href="#" class="dropdown-toggle" data-toggle="dropdown">({{Auth::user()->name}}) <span class="caret"></span></a>
            </div>
            <ul class="dropdown-menu" >
                <li style="border-right: none;">
                    <a href="{{url('/userDashboard')}}">Dashboard</a>
                </li>
                <li style="border-right: none;">
                    <a href="{{route('user-profile-view')}}">Your Profile</a>
                </li>
                <li style="border-right: none;">
                    <a href="{{route('user-order-list',['id'=>'all'])}}">Your Order</a>
                </li>
                <li style="border-right: none;">
                    <a href="{{route('user-payment-history')}}">Payment History</a>
                </li>
                <li style="border-right: none;">
                    <a href="{{route('user-change-password')}}">Change Password</a>
                </li>
                <li style="border-right: none;">
                    <a href="{{ route('logout') }}"onclick="event.preventDefault();
                    document.getElementById('logoutForm').submit();">Logout</a>
                </li>
                <form method="POST" id="logoutForm" action="{{ route('logout') }}">
                    @csrf
                </form>

            </ul>
        </li>
        @endif
        @else
        <li class="dropdown profile_details_drop">
            <div style="padding: 1em 1em;">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i>  Sign In <span class="caret"></span></a>
            </div>
            <div class="mega-dropdown-menu">
                <div class="w3ls_vegetables">
                    <ul class="dropdown-menu drp-mnu">
                        <li><a href="{{url('/login')}}">Login</a></li> 
                        <li><a href="{{url('/register')}}">Sign Up</a></li>
                    </ul>
                </div>                  
            </div>	
        </li>	
        @endif

        @endif

    </ul>
</div>
@if (Request::path() != 'checkout' && Request::path() != 'payment' && substr(Request::path(), 0,  13) != 'user/re-order')
    <div class="w3l_header_cart">
        <button id="showRight" value="View your cart" class="navig"><i class="fas fa-shopping-cart"></i> Cart (<span id="noOfCartProducts">0</span>)</button>
    </div>
@endif
    
    <div class="w3l_header_right_contact">
        <a href="{{url('/contactUs')}}">Contact Us</a>
    </div>
<div style="position: fixed;" class="clearfix"> </div>
</div>
<!-- script-for sticky-nav -->
<script>
    $(document).ready(function () {
        var navoffeset = $(".agileits_header").offset().top;
        $(window).scroll(function () {
            var scrollpos = $(window).scrollTop();
            if (scrollpos >= navoffeset) {
                $(".agileits_header").addClass("fixed");
            } else {
                $(".agileits_header").removeClass("fixed");
            }
        });

    });
</script>
<style>
	.background{
		background: hsla(0, 100%, 0%, 0.4);
	}
</style>
<!-- //script-for sticky-nav -->
<div class="logo_products">
    <div class="container">
        <div class="w3ls_logo_products_left">
            <a href="{{url('/')}}"><img src="{{asset($shopSetting->shop_logo)}}" style="width: 200px;"/></a>
        </div>
        <div class="w3ls_logo_products_left1">
            <ul class="special_items">
                <li><a href="{{url('/aboutUs')}}">About Us</a><i>|</i></li>

                <li><a href="{{url('/campaign')}}">Campaign</a><i>|</i></li>
                <li><a href="{{url('/bestDeals')}}">Best Deals</a><i>|</i></li>
                <li><a href="{{url('/service')}}">Services</a></li>
           
                <li><i class="fa fa-phone" aria-hidden="true"></i>{{$shopSetting->phone_no}}</li>
                <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:{{$shopSetting->email}}">{{$shopSetting->email}}</a></li>
            </ul>
        </div>
        <div class="w3l_searchHide">
            
                <form action="{{route('search-products')}}" id="form_searchMobile" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="searchProduct" id="searchProductMobile" placeholder="Search a product..." autocomplete="off">
                        <div id="productListMobile"></div>
                        <input type="submit" value="">
                    </div>
                </form>
                
            
        </div>
        <div class="clearfix"> </div>
    </div>
    
</div>
    
<script>
var liSelected
    $(document).ready(function(){
    $('#searchProduct').keydown(function(e){ 
        //alert(e.which);
        if(e.which == 13){
            alert(liSelected.text());
            e.preventDefault();
            
        }
    });
     $('#searchProduct').keyup(function(e){ 
         if(e.which != 40 && e.which != 38 && e.which != 13){
        var query = $(this).val();
        if(query != '')
        {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                 url:"{{ route('autocomplete.fetch') }}",
                method:"POST",
                data:{query:query, _token:_token},
                success:function(data){
                $('#productList').fadeIn();  
                $('#productList').html(data);
                
                }
            });
        }
        }else if(e.which === 13){
            e.preventDefault();
               $('#searchProduct').val(liSelected.text());  
                $('#productList').fadeOut();  
                $("#form_search").submit();
        
            }else{
                var li = $('#productList ul li');
            var selected;
            if(e.which === 40){
            	if(liSelected){
            		liSelected.removeClass('background');
            		next = liSelected.next();
            		if(next.length > 0){
            			liSelected = next.addClass('background');
            			selected = next.text();
            
            		}else{
            			liSelected = li.eq(0).addClass('background');
            			selected = li.eq(0).text();
            		}
            	}else{
            		liSelected = li.eq(0).addClass('background');
            			selected = li.eq(0).text();
            	}
            }else if(e.which === 38){
            	if(liSelected){
            		liSelected.removeClass('background');
            		next = liSelected.prev();
            		if(next.length > 0){
            			liSelected = next.addClass('background');
            			selected = next.text();
            
            		}else{
            
            			liSelected = li.last().addClass('background');
            			selected = li.last().text()
            		}
            	}else{
            
            		liSelected = li.last().addClass('background');
            		selected = li.last().text()
            	}
            }
            //alert(selected)
            }
       
       /**/
   
     
 });

    $("#productList").on('click', 'li', function(){  
        $('#searchProduct').val($(this).text());  
        $('#productList').fadeOut();  
        $("#form_search").submit();
    });  

 });
</script>