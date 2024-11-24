<script>
    showDepartments();

    function showDepartments() {
        var isSlider=$('#isSlider').val();
        if(isSlider == 'slider'){
            document.querySelector('.departments').classList.add('departments--opened');
        }else{
            document.querySelector('.departments').classList.remove('departments--opened');
        }
       
    }

    function shopLink() {
        window.open("{{ url('/shop_grid_3_columns_sidebar')}}"); 
}

fetchCart();
function addToCart(id){
    var quantity=1;
    $.ajax({
        url: "{{ route('product.addToCart') }}",
        method: "GET",
        data: {
            "id": id,
            "quantity":quantity
        },
        datatype: "json",
        success: function(result) {
            alert(JSON.stringify(result));
            $('#cartSuccessMessage').text('Success! Added to cart item.').show();
            setTimeout(function() {
                $('#cartSuccessMessage').fadeOut(); // Using fadeOut for smooth transition
            }, 5000);
            fetchCart();
            calculateTotal();
            $('#district_cart').val().trigger("change");
        },
        error: function(response) {
            alert(JSON.stringify(response));
        },
        beforeSend: function() {
            $('#loading').show();
        },
        complete: function() {
            $('#loading').hide();
        }
    });
}


function fetchCart(){
    $.ajax({
        url: "{{ route('product.fetchCart') }}",
        method: "GET",
        
        datatype: "json",
        success: function(result) {
            alert(JSON.stringify(result));
            $('#cartTable').html(result.data.cart);
             $('#nav-cart-count').text(result.data.cartCount);
             $('#footer-cart-count').text(result.data.cartCount);
             calculateTotal();
             $('#district_cart').val().trigger("change");
        },
        error: function(response) {
            alert(JSON.stringify(response));
        },
        beforeSend: function() {
            $('#loading').show();
        },
        complete: function() {
            $('#loading').hide();
        }
    });
}


function updateCart(id) {
    var quantity = $('#quantity_' + id ).val();
    if(quantity <= 0){
        $('#quantity_' + id ).val(1);
        var quantity=1;
    }
    const input = document.getElementById('quantity_' + id);
    
    // Allow only numeric values by removing any non-digit characters
    input.value = input.value.replace(/[^0-9]/g, '');
    $.ajax({
        url: "{{ route('product.updateCart') }}",
        method: "GET",
        data: {
            "id": id,
            "quantity":quantity
        },
        datatype: "json",
        success: function(result) {
           // alert(JSON.stringify(result));
            if (result.data == "Success") {
                fetchCart();
                calculateTotal();
                $('#district_cart').val().trigger("change");
            } else {
                alert("Error To update cart");
            }
        },
        error: function(response) {
          //  alert(JSON.stringify(response));
        }
    });
}
function deleteCart(id) {
    $.ajax({
        url: "{{ route('product.deleteCart') }}",
        method: "GET",
        data: {
            "id": id
        },
        datatype: "json",
        success: function(result) {
            //alert(JSON.stringify(result));
            if (result.data == "Success") {
                fetchCart();
                calculateTotal();
                $('#district_cart').val().trigger("change");
            } else {
                alert("Error To delete cart item");
            }
        },
        error: function(response) {
         //   alert(JSON.stringify(response));
        }
    });
}


function clearCart() {
    $.ajax({
        url: "{{ route('product.clearCart') }}",
        method: "GET",
        datatype: "json",
        success: function(result) {
           // alert(JSON.stringify(result));
            if (result.data == "Success") {
                fetchCart();
                calculateTotal();
                
            } else {
                alert("Error To delete cart item");
            }
        },
        error: function(response) {
           // alert(JSON.stringify(response));
        }
    });
}



function checkOutCart() {
    var totalAmount = $("#totalAmount").text();
    var deliveryAmount = $("#deliveryAmount").text();
    var grand_total=$('#grand_total').text();
    var name=$('#name_cart').val();
    var mobile=$('#mobile_cart').val();
    var address=$('#address_cart').val();
    var district=$('#district_cart').val();
    var payment_method=$('#payment_method').val();
    var last_digits=$('#last_digits').val();
    var transaction_id=$('#transaction_id').val();
    var _token = $('input[name="_token"]').val();

    var fd = new FormData();
    fd.append('total_amount', totalAmount);
    fd.append('deliveryAmount', deliveryAmount);
    fd.append('grand_total', grand_total);
    fd.append('name', name);
    fd.append('mobile', mobile);
    fd.append('address', address);
    fd.append('payment_method',payment_method);
    fd.append('district', district);
    fd.append('last_digits', last_digits);
    fd.append('transaction_id', transaction_id);
    
    fd.append('_token', _token);
    if(deliveryAmount > 0){
    $.ajax({
        url: "{{ route('product.checkOutCart') }}",
        method: "POST",
        data: fd,
        contentType: false,
        processData: false,
        datatype: "json",
        success: function(result) {
            //alert(JSON.stringify(result));
            if (result.data == "Success") {
                $('#cartSuccessMessage').text('Success! Your Order successfully saved.').show();
                setTimeout(function() {
                    $('#cartSuccessMessage').fadeOut(); // Using fadeOut for smooth transition
                }, 5000);
                fetchCart();
                
            }else if(result.data == "Empty"){
                $('#errorMessage').text('Error! Your cart is empty.').show();
                setTimeout(function() {
                    $('#errorMessage').fadeOut(); // Using fadeOut for smooth transition
                }, 5000);
            }
            else {
                $('#errorMessage').text('Error To delete cart item.').show();
                setTimeout(function() {
                    $('#errorMessage').fadeOut(); // Using fadeOut for smooth transition
                }, 5000);
            }
            reset();
            fetchCart();
            
        },
        beforeSend: function() {
            $('#loading').show();
        },
        complete: function() {
            $('#loading').hide();
        },
        error: function(response) {
            //alert(JSON.stringify(response));
            $('#name_cartError').text(response.responseJSON.errors.name);
            $('#mobile_cartError').text(response.responseJSON.errors.mobile);
            $('#address_cartError').text(response.responseJSON.errors.address);
            $('#payment_methodError').text(response.responseJSON.errors.payment_method);
            $('#districtError').text(response.responseJSON.errors.district);
            $('#last_digitsError').text(response.responseJSON.errors.last_digits);
            $('#transaction_idError').text(response.responseJSON.errors.transaction_id);
        }
    })
    }else{
        $('#district_cart').val('').trigger("change");
        $('#errorMessage').text('Please select district again.').show();
        setTimeout(function() {
            $('#errorMessage').fadeOut(); // Using fadeOut for smooth transition
        }, 5000);
    }
}

function reset(){
    $("#totalAmount").text(0);
    $("#deliveryAmount").text(0);
    $('#name_cart').val('');
    $('#mobile_cart').val('');
    $('#address_cart').val('');
    $('#district_cart').val('').trigger("change");
    $('#payment_method').val('').trigger("change");
    $('#last_digits').val('');
    $('#transaction_id').val('');
}

    
</script>