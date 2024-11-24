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