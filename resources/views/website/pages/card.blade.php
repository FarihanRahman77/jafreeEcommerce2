@extends('website.master')
@section('title')
Jafree Ecommerce - Cart
@endsection
@section('content')
        <div class="site__body">
            <div class="page-header">
                <div class="page-header__container custom-container">
                    <div class="page-header__breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a> <svg class="breadcrumb-arrow"
                                        width="6px" height="9px">
                                        <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                    </svg></li>
                                <li class="breadcrumb-item"><a href="#">Breadcrumb</a> <svg class="breadcrumb-arrow"
                                        width="6px" height="9px">
                                        <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                    </svg></li>
                                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="page-header__title">
                        <h1>Shopping Cart</h1>
                    </div>
                </div>
            </div>
            <div class="cart block">
                <div class="custom-container">
                    <div class="row">
                        <div class="col-8 col-md-8 col-lg-8 col-xl-8" id="cartTable">

                        </div>
                        <div class="col-4 col-md-4 col-lg-4 col-xl-4 row ">
                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Place Order</h3>
                                        <div class="form-row">
                                            <div class="form-group col-md-6"><label for="form-name">Your Name</label> <input type="text" id="form-name" class="form-control" placeholder="Your Name"></div>
                                            <div class="form-group col-md-6"><label for="form-email">Email</label> <input type="email" id="form-email" class="form-control" placeholder="Email Address"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="form-subject">Subject</label> 
                                            <input type="text" id="form-subject" class="form-control" placeholder="Subject">
                                        </div>
                                        <div class="form-group">
                                            <label for="form-message">Message</label> 
                                            <textarea id="form-message" class="form-control" rows="4"></textarea>
                                        </div>
                                        <a class="btn btn-primary btn-xl btn-block cart__checkout-button"  href="checkout.html">
                                            Proceed to checkout
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection