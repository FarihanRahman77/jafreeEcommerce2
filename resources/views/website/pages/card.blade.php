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
                        <li class="breadcrumb-item"><a href="#">Breadcrumb</a> <svg class="breadcrumb-arrow" width="6px"
                                height="9px">
                                <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                            </svg></li>
                        <li class="breadcrumb-item active" aria-current="page">Request for Quote</li>
                    </ol>
                </nav>
            </div>
            <div class="page-header__title">
                <h1>Request for Quote</h1>
            </div>
        </div>
    </div>
    <div class="cart block">
        <div class="custom-container">
            <div class="row">
                <div class="col-md-8 table-responsive" id="cartTable">
                    
                </div>
                <div class="col-md-4 ">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Send Inquiry</h3>
                            <form id="checkoutForm" method="POST" enctype="multipart/form-data" action="#">
                                @csrf
                                <div class=" row">
                                    <div class="form-group col-md-6">
                                        <label for="form-name">Your Name <span class="text-danger">*</span></label>
                                        <input type="text" id="name_cart" class="form-control" placeholder="Your Name">
                                        <span id="name_cartError" class="text-danger"></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="form-subject">Mobile <span class="text-danger">*</span></label>
                                        <input type="text" id="mobile_cart" class="form-control" placeholder="018">
                                        <span id="mobile_cartError" class="text-danger"></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="form-email">Email</label>
                                        <input type="text" id="email_cart" class="form-control" placeholder="Email">
                                        <span id="email_cartError" class="text-danger"></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="form-email">Address</label>
                                        <input type="text" id="address_cart" class="form-control" placeholder="Address">
                                        <span id="address_cartError" class="text-danger"></span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="form-message">Note</label>
                                        <textarea id="note_cart" class="form-control" rows="4" placeholder="Notes"></textarea>
                                        <span id="note_cartError" class="text-danger"></span>
                                    </div>
                                    <div class="form-group  col-md-12 ">
                                        <button type="submit" class="btn btn-primary float-right">Checkout</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <button  class="btn btn-danger" onclick="clearCart()">Clear Cart</button>
        </div>
    </div>
</div>
@endsection