<?php 

session_start();
//echo $_SESSION["login"];
if (!isset($_SESSION["login"]) || $_SESSION["login"]=="")
{
	header("Location:./");
}

?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {margin:0;}

.top_navbar {
  overflow: hidden;
  background-color: #333c;
  position: fixed;
  top: 0;
  width: 100%;
}

.top_navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.top_navbar a:hover {
  background: #ddd;
  color: black;
}

.main {
  padding: 16px;
  margin-top: 40px;
height:auto;
}
</style>
</head>

<body>

<div class="top_navbar">
  <a href="./Interface?style=mailer">Mailer</a>
  
  <a style="float: right;" href="./?mode=logout">Logout</a>
</div>
<div class="main">
<?php 
if (!empty($_GET) && isset($_GET["style"]))
{
	if ($_GET["style"]=="mailer")
	{
		include "mailer.php";
	}
	else if ($_GET["style"]=="mail")
	{
		include "mail.php";
	}
}

?>
</div>
</body>
</html>