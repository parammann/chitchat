<?php
session_start();
if($_SESSION["me"]==""){
?>
<script>
window.location="login.php";
</script>
<?php
}
$me=$_SESSION["me"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<script type="text/javascript">

function showHint(str){
if(str.length==0){
	document.getElementById("texhint").innerHTML="";
	
}
else{
	var me='<?php echo ($me) ?>';
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if(this.readyState == 4 && this.status == 200){
		document.getElementById("texhint").innerHTML=this.responseText;
		}
	};
	xmlhttp.open("GET","texthint.php?q="+str+"&user="+me,true);
	xmlhttp.send();
	}
}
</script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chitchat</title>
<link rel="icon" type="img/png" href="css/messages.png" sizes="96x96"></link>
<link rel="stylesheet" href="css1/verify1.css"></link>


</head>
<body class="background-image" style="margin: 0px;padding: 0px">
<header>
<span style="padding-left: 35em;"><img src="css/messages.png" alt="chitchat" style="width: 80px; height: 80px;" align="middle">ChitChat</span>
</header>
<hr style="color: #404040;margin-top: 0px;">
<nav>Search for the User</nav>
