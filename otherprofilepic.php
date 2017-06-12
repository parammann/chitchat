<?php
session_start();
if($_SESSION["me"]==""){
?>
<script>
window.location="login.php";
</script>
<?php
}
?>
<?php
  $q=$_GET["user"];
?>
<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"chatapp");
?>




<html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chitchat</title>
<link rel="icon" type="img/png" href="css/messages.png" sizes="96x96"></link>
<link rel="stylesheet" href="css1/profilepic.css"></link>
</head>

<body style="background-color: #000000;">

<header><span style="float: left">
Profile Picture</span>
</header>
<section>
<?php
	$result=mysqli_query($link,'SELECT profilepic FROM profile_pic WHERE username="'.$q.'"');
	
	while($row=mysqli_fetch_assoc($result)){
	if ($row["profilepic"] == "" ){

	echo '<img class="img-sqr" src="profilepicture/default.jpg" alt="default DP" >';
	
	}else{

	echo "<img class='img-sqr' src='profilepicture/".$row['profilepic']."' alt='DP' >";
	}
	
}
?>
</section>


</body>
</html>
