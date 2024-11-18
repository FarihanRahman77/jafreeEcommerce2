<?php
session_start();
$_SESSION["login"]="";

if (!empty($_POST)){
	if ( isset($_POST["pwd"]) && $_POST["pwd"]!="")
	{
		
		if ($_POST["pwd"]!="butterfly0803")
			echo "Wrong password!";
		else {
			$_SESSION["login"]=date("Y/m/j G:i:s");
			header("Location:./Interface?style=mailer");
		}
	}
	if ( isset($_POST["mode"]) && $_POST["mode"]=="logout")
	{
		$_SESSION["login"]="";
		session_unset();
		header("Location:./");
	}
}
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  box-sizing: border-box;
}

#regForm {
  background-color: #f1f1f1;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 50%;
  min-width: 300px;
}
input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}
button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}
</style>
<body>
<form id="regForm" action="" method="post">
<p>
<input placeholder="email" name="email" type="text">
</p>
<p>
<input placeholder="password" name="pwd" type="password">
</p>

<div style="overflow:auto;">
<div style="float:right;">
   <button type="submit" id="nextBtn" >Submit</button>
</div>
</div>

</form>
</body>
</html>