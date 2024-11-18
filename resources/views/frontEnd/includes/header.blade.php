<head>
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontEnd/images/favicon.ico')}}" />
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Nuts,Herbs,Grocery Store Responsive" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); }


$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<!-- //for-mobile-apps -->
<link href="{{asset('frontEnd/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('frontEnd/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/component.css')}}" />
<!-- font-awesome icons -->
<link href="{{asset('frontEnd/css/font-awesome.css')}}" rel="stylesheet" type="text/css" media="all" /> 
<!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"-->

<!-- //font-awesome icons -->

<link rel="stylesheet" type="text/css" href="{{asset('frontEnd/css/lightslider.css')}}"/>
<!--Jquery
<script type="text/javascript" src="{{asset('frontEnd/js/JQuery3.3.1.js')}}"></script>
<script type="text/javascript" src="{{asset('frontEnd/js/lightslider.js')}}"></script>-->


<!-- js -->
<script src="{{asset('frontEnd/js/jquery-1.11.1.min.js')}}"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">


{{-- button group css --}}
    <style>
    .action{background: #fff;border-bottom: 1px solid gray}
        .action:hover{background: #c7c7c7;
            border-bottom: 1px solid blue}
            /*tuition website*/
            .sidebar {
                margin: 0;
                padding: 0;
                background-color: #878888;
                overflow: auto;
            }

            p {
                text-align: left;
                font-size: 12px;
            }

            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border-bottom: 1px solid #ddd;
                text-align: left;
                padding: 7px;
                font-size: 12px;
            }
            /*
            tr:nth-child(even) {
                background-color: #dddddd;
            }
            */
            h3 {
                color: white;
                padding-top: 3%;
                font-size: 15px;
            }
            #loading {
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                position: fixed;
                display: block;
                opacity: 0.7;
                background-color: #fff;
                z-index: 99;
                text-align: center;
            }
            
            #loading-image {
                position: absolute;
                top: 48%;
                left: 48%;
                z-index: 100;
            }
            
            @media screen and (max-width: 700px) {
                .sidebar {
                    width: 100%;
                    height: auto;
                    position: relative;
                }

                .sidebar a {
                    float: left;
                }

                div.content {
                    margin-left: 0;
                }
            }

            @media screen and (max-width: 400px) {
                .sidebar a {
                    text-align: center;
                    float: none;
                }
            }
            .preloader {
               position: absolute;
               top: 0;
               left: 0;
               width: 100%;
               height: 100%;
               z-index: 9999;
               background-image: url({{url('frontEnd/images/triangle_square_animation.gif')}});
               background-repeat: no-repeat; 
               background-color: #FFF;
               background-position: center;
            }
            
    </style>
        <!-- start-smoth-scrolling -->
        <script type="text/javascript" src="{{asset('frontEnd/js/move-top.js')}}"></script>
        <script type="text/javascript" src="{{asset('frontEnd/js/easing.js')}}"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
                });
            });
        </script>
        <!-- start-smoth-scrolling -->
    </head>