<?php
session_start();
if($_SESSION["me"]==""){
?>
<script>
window.location="login.php";
</script>
<?php
}
$id=$_SESSION["id"];
$me=$_SESSION["me"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chitchat</title>
<link rel="icon" type="img/png" href="css/messages.png" sizes="96x96"></link>
<link rel="stylesheet" href="css1/chatbox.css"></link>
</head>
<body onload="start()" class="background-image" style="margin: 0px;padding: 0px">
<header>
<a href="search.php" class="srch">Search</a>
<span style="padding-left: 28em;"><img src="css/messages.png" alt="chitchat" style="width: 80px; height: 80px;" align="middle">ChitChat</span>
<a href="logout.php" class="sign">Logout</a>
</header>
<hr style="color: #404040;margin-top: 0px;margin-bottom: 0px;">

