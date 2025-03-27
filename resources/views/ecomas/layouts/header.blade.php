<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

   <!-- font -->
   <link rel="stylesheet" href="{{asset('ecomas/fonts/fonts.css')}}">
   <link rel="stylesheet" href="{{asset('ecomas/fonts/font-icons.css')}}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="{{asset('ecomas/css/bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{asset('ecomas/css/swiper-bundle.min.css')}}">
   <link rel="stylesheet" href="{{asset('ecomas/css/animate.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('ecomas/css/styles.css')}}"/>

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{asset('ecomas/images/logo/'.$settings->image)}}">
<link rel="apple-touch-icon-precomposed" href="{{asset('ecomas/images/logo/'.$settings->image)}}">
<style>
        .cart-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .cart-button i {
            font-size: 24px;
            color: #fff;
        }

        .cart-button:hover {
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }
        /* Custom styles to position the indicator at the bottom right */
        .alert-message {
            position: fixed;       /* Fixed positioning relative to the viewport */
            bottom: 50px;          /* Distance from the bottom */
            right: 20px;           /* Distance from the right */
            z-index: 9999;         /* Ensure it stays above other content */
        }
    </style>
</head>