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
           // alert(JSON.stringify(result));
            $('#successMessage').text('Success! Added to cart item.').show();
            setTimeout(function() {
                $('#successMessage').fadeOut(); // Using fadeOut for smooth transition
            }, 5000);
            fetchCart();
            calculateTotal();
            $('#district_cart').val().trigger("change");
        },
        error: function(response) {
           // alert(JSON.stringify(response));
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
            //alert(JSON.stringify(result));
            $('#cartTable').html(result.data.cart);
             $('#cartCounterText').text(result.data.cartCount);
             $('#cartCounterTextFooter').text(result.data.cartCount);
             calculateTotal();
             $('#district_cart').val().trigger("change");
        },
        error: function(response) {
           //alert(JSON.stringify(response));
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
                $('#successMessage').text('Success! Cart data cleared successfully.').show();
                setTimeout(function() {
                    $('#successMessage').fadeOut(); // Using fadeOut for smooth transition
                }, 5000);
                fetchCart();
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



$("#checkoutForm").submit(function (e){
    e.preventDefault();
    clearCartMessages();
    var name=$('#name_cart').val();
    var mobile=$('#mobile_cart').val();
    var address=$('#address_cart').val();
    var email=$('#email_cart').val();
    var note=$('#note_cart').val();
    var _token = $('input[name="_token"]').val();
    var fd = new FormData();
    fd.append('name', name);
    fd.append('mobile', mobile);
    fd.append('address', address);
    fd.append('email', email);
    fd.append('note', note);
    fd.append('_token', _token);
    
    $.ajax({
        url: "{{ route('product.checkOutCart') }}",
        method: "POST",
        data: fd,
        contentType: false,
        processData: false,
        datatype: "json",
        beforeSend: function() {
            $('#loading').show();
        },
        success: function(result) {
            //alert(JSON.stringify(result));
            if (result.data == "Success") {
                $('#successMessage').text('Success! Your Order successfully sent.').show();
                setTimeout(function() {
                    $('#successMessage').fadeOut(); // Using fadeOut for smooth transition
                }, 5000);
                fetchCart();
                
            }else if(result.data == "Empty"){
                $('#errorMessage').text('Error! Your cart is empty.').show();
                setTimeout(function() {
                    $('#errorMessage').fadeOut(); // Using fadeOut for smooth transition
                }, 5000);
            }
            else {
                $('#errorMessage').text('Error To save cart item.').show();
                setTimeout(function() {
                    $('#errorMessage').fadeOut(); // Using fadeOut for smooth transition
                }, 5000);
            }
            reset();
            clearCartMessages();
            fetchCart();
        },
        complete: function() {
            $('#loading').hide();
        },
        error: function(response) {
           // alert(JSON.stringify(response));
            $('#name_cartError').text(response.responseJSON.errors.name);
            $('#mobile_cartError').text(response.responseJSON.errors.mobile);
            $('#address_cartError').text(response.responseJSON.errors.address);
            $('#email_cartError').text(response.responseJSON.errors.email);
            $('#noteError').text(response.responseJSON.errors.note);
            
        }
    })
   
});

function reset(){
    $('#name_cart').val('');
    $('#mobile_cart').val('');
    $('#address_cart').val('');
    $('#note_cart').val('');
}

function clearCartMessages(){
    $('#name_cartError').text('');
    $('#mobile_cartError').text('');
    $('#address_cartError').text('');
    $('#noteError').text('');
}

$("#messageForm").submit(function (e){
          
    e.preventDefault();
    clearMessages()
          var name = $("#name").val();
          var email = $("#email").val();
          var subject = $("#subject").val();
          var mobile = $("#mobile").val();
          var text = $("#text").val();
          var _token = $('input[name="_token"]').val();
          var fd = new FormData();
          fd.append('name',name);
          fd.append('email',email);
          fd.append('subject',subject);
          fd.append('mobile',mobile);
          fd.append('text',text);
          fd.append('_token',_token);
          $.ajax({
                url: "{{ route('message.store') }}",
                method:"POST",
                data:fd,
                contentType: false,
                processData: false,
                success:function(result){
                    alert(JSON.stringify(result));
                    table.ajax.reload(null, false);
              }, error: function(response) {
                    alert(JSON.stringify(response));
              }, beforeSend: function () {
                  $('#loading').show();
              },complete: function () {
                  $('#loading').hide();
              }

          })
    })   


         function clearMessages(){
          $('#nameError').text("");
          $('#emailError').text("");
          $('#subjectError').text("");
          $('#mobileError').text("");
          $('#textError').text("");
       
        }


    
</script>