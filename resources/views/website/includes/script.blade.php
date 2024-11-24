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
            $('#cartSuccessMessage').text('Success! Added to cart item.').show();
            setTimeout(function() {
                $('#cartSuccessMessage').fadeOut(); // Using fadeOut for smooth transition
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
             $('#nav-cart-count').text(result.data.cartCount);
             $('#footer-cart-count').text(result.data.cartCount);
             calculateTotal();
             $('#district_cart').val().trigger("change");
        },
        error: function(response) {
          //  alert(JSON.stringify(response));
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
   
    var name=$('#name_cart').val();
    var mobile=$('#mobile_cart').val();
    var address=$('#address_cart').val();
    var note=$('#note_id').val();
    var _token = $('input[name="_token"]').val();

    var fd = new FormData();
    fd.append('name', name);
    fd.append('mobile', mobile);
    fd.append('address', address);
    fd.append('note', note);
    fd.append('_token', _token);

    
    $.ajax({
        url: "{{ route('product.checkOutCart') }}",
        method: "POST",
        data: fd,
        contentType: false,
        processData: false,
        datatype: "json",
        success: function(result) {
            alert(JSON.stringify(result));
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
            alert(JSON.stringify(response));
            $('#name_cartError').text(response.responseJSON.errors.name);
            $('#mobile_cartError').text(response.responseJSON.errors.mobile);
            $('#address_cartError').text(response.responseJSON.errors.address);
            $('#noteError').text(response.responseJSON.errors.note);
            
        }
    })
   
}

function reset(){
    $('#name_cart').val('');
    $('#mobile_cart').val('');
    $('#address_cart').val('');
    $('#note_cart').val('');
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