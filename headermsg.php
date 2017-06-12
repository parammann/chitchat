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

$other=$_GET["user"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chitchat</title>
<link rel="icon" type="img/png" href="css/messages.png" sizes="96x96"></link>
<link rel="stylesheet" href="css1/msg.css"></link>

<script type="text/javascript">

  
 function submitchat(){
	if(form1.msg.value == ""){
	alert("Please write msg and then press send button");
	return;
	}
	
	var user='<?php echo $me; ?>';
	var other='<?php echo $other; ?>';
	var msg=form1.msg.value;
	
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if(this.readyState==4&&this.status==200){
		document.getElementById("chatlogs").innerHTML=this.responseText;
		}
	};
	
	xmlhttp.open("GET","insert.php?mesg="+msg+"&othr="+other+"&usr="+user,true);
	xmlhttp.send();

}
</script>
</head>
<body onload="start()" class="background-image" style="margin: 0px;padding: 0px">
<header>
<span style="padding-left: 35em;"><img src="css/messages.png" alt="chitchat" style="width: 80px; height: 80px;" align="middle">ChitChat</span>
</header>
<hr style="color: #404040;margin-top: 0px;margin-bottom: 0px;">
