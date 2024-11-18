<?php
if (!isset($_SESSION["login"]) || $_SESSION["login"]=="")
{
	header("Location:./");
}
?>

<html>
<head>
	<title>Mailer</title>
	<link rel="stylesheet" type="text/css" href="./res_files/common.css">
	<script src="./res_files/jquery-3.2.1.min.js"></script>
	
</head>
<body>
 <form id="form" method="post" action="">
 <div class="row" >
 <fieldset>
   <legend>Mailer Types</legend>
   <div class="g_radio">
       <input class="mailer_type_radio" type="radio" name="mailer_type"  value="smtp" id="radio-smtp" checked required>SMTP 
	
      <input class="mailer_type_radio" type="radio" name="mailer_type"  value="mail" id="radio-mail" required>Mail() 
     <!--
      <input class="mailer_type_radio" type="radio" name="mailer_type" value="Sendmail" id="radio-Sendmail" required>
	Sendmail 
      
      <input class="radio" type="radio" name="mailer_type" value="qmail" id="radio-qmail">Qmail 
	  
	  -->
	</div>
 </fieldset><br>
 </div>
 <div class="smtp_settings">
    <div class="row">
      <div class="col-25">
        <label for="fname">Smtp_host</label>
      </div>
      <div class="col-75">
        <input type="text" id="smtp_host" name="smtp_host" placeholder="smtp host"  >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">smtp id</label>
      </div>
      <div class="col-75">
        <input type="text" id="smtp_id" name="smtp_id" placeholder="smtp id"  >
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="lname">smtp_pwd</label>
      </div>
      <div class="col-75">
        <input type="password" id="smtp_pwd" name="smtp_pwd" placeholder="Password">
		<p><input type="checkbox" class="eye_pwd">Show Password</p>
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label >SMTP Secure</label>
      </div>
      <div class="col-75">
		None : <input class="smtp_secure_radio" type="radio" name="smtp_secure" id="is_none" checked value="none" >&nbsp;&nbsp;
		SSL : <input class="smtp_secure_radio" type="radio" name="smtp_secure" id="is_ssl" value="ssl">&nbsp;&nbsp;
		TLS : <input class="smtp_secure_radio" type="radio" name="smtp_secure" id="is_tls" value="tls">&nbsp;&nbsp;
		Port: <input type="number" name="port" id="port" min="1" style="width:100px">
      </div>
    </div>
	
	
</div>
	
	<div class="row">
      <div class="col-25">
        <label for="sender_name">sender_name</label>
      </div>
      <div class="col-75">
        <input type="text" id="sender_name" name="sender_name" placeholder="sender name">
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="sender">sender</label>
      </div>
      <div class="col-75">
        <input type="text" id="sender" name="sender" placeholder="sender email">
      </div>
    </div>
	
    <div class="row">
      <div class="col-25">
        <label for="recipient">recipient(s):</label>
      </div>
      <div class="col-75">
        <textarea id="recipient" name="recipient" placeholder="Write recipients.." style="height:100px"  ></textarea>
      </div>
    </div>
	<!--
	<div class="row" style="display:hidden">
      <div class="col-25">
        <label for="webid">webid</label>
      </div>
      <div class="col-75">
        <input type="text" id="webid" name="webid" placeholder="webid" value="<?php echo rand(100000,9999999); ?>">
      </div>
    </div>
	-->
	<div class="row">
      <div class="col-25">
        <label for="subject">subject</label>
      </div>
      <div class="col-75">
        <input type="text" id="subject" name="subject" placeholder="No subject">
      </div>
    </div>
	
	 <div class="row">
      <div class="col-25">
        <label for="message">Message</label>
      </div>
      <div class="col-75">
        <textarea id="message" name="message" placeholder="Write Message" style="height:100px"></textarea>
      </div>
    </div>
	<!--
	 <div class="row">
      <div class="col-25">
        <label >HTML Message Options</label>
      </div>
      <div class="col-75">
        Is_Html:<input type="checkbox" name="is_html" id="is_html" checked>&nbsp;&nbsp;
      </div>
    </div>
	-->
	
	
	 <div class="row">
      <input class="form_submit" type="submit" value="Submit">
	  <input type="reset" value="Reset" />
    </div>
  </form>
  <span class="error_msg"> </span>
<script>
$(function(){
	
	var _go_url="smtp_mailsender.php";
	$(".eye_pwd").click(function(){
		if ($("#smtp_pwd").attr("type")=="password") $("#smtp_pwd").attr("type", "text");
		else $("#smtp_pwd").attr("type", "password");
		
	});
	
	$(".mailer_type_radio").click(function(){
		
		var mtype=$(this).val();
		if (mtype!="smtp")
		{
			
			$(".smtp_settings").hide();
		}
		else $(".smtp_settings").show(); 
		
		switch (mtype)
		{
			case "smtp":
				_go_url="smtp_mailsender.php";
				$(".smtp_settings").show(); 
				break;
			case "mail":
				_go_url="mail_mailsender.php";
				$(".smtp_settings").hide(); 
				break;
		}
		
		console.log($(this).val());
	});
	$("form").submit(function(e){
		e.preventDefault();
		$(".form_submit").val("waiting...");
		
		
		$.post(_go_url,
			{
				smtp_host: $("#smtp_host").val(),
				smtp_id: $("#smtp_id").val(),
				smtp_pwd: $("#smtp_pwd").val(),
				sender_name:$("#sender_name").val(),
				sender:$("#sender").val(),
				recipient:$("#recipient").val(),
				webid: $("#webid").val(),
				subject: $("#subject").val(),
				message: $("#message").val(),
				is_html: $("#is_html").prop("checked"),
				smtp_secure: $(".smtp_secure_radio:checked").val(),
				mail_type:$(".mailer_type_radio:checked").val(),
				port: $("#port").val()
				
			},
			function(data, status){
				$(".error_msg").show();
				$(".error_msg").html(data);
				$(".form_submit").val("Submit");
				console.log(data);
			});
	});
});  
  
  
  
</script>
</body>
</html>