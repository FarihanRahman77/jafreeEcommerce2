<!-- shoppingCart -->
<div class="modal fullRight fade modal-shopping-cart" id="shoppingCart">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="header">
                <div class="title fw-5">Cart Item</div>
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <div class="wrap">
                <div class="tf-mini-cart-wrap">
                    <div class="tf-mini-cart-main">
                        <div class="tf-mini-cart-sroll">
                            <div class="tf-mini-cart-items">
                                <div class="col-md-12 table-responsive p-3" id="cartTable"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tf-mini-cart-bottom">
                        <div class="tf-mini-cart-bottom-wrap">
                            <div class="row">
                            <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5>Send Inquiry</h5>
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
                                                    <div class="form-group  col-md-12 tf-mini-cart-view-checkout">
                                                        <button  class="tf-btn btn-outline radius-3 link w-100 justify-content-center" onclick="clearCart()">Clear Cart</button>
                                                        <button type="submit" class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center">Checkout</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /shoppingCart -->