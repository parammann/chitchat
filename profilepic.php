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
<?php
       if(isset($_POST["submit"])){
	move_uploaded_file($_FILES["file"]["tmp_name"],'profilepicture/'.$_FILES["file"]["name"]);
	$res=mysqli_query($link,'UPDATE profile_pic SET profilepic="'.$_FILES["file"]["name"].'" WHERE id="'. $q.'"');

}

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
<span style="padding-left: 680px;float: right;">
<form method="post" action="" enctype="multipart/form-data" >
<input type="file" name="file" ></input>
<input type="submit" value="Change DP" name="submit"></input>
</form>
</span>
</form>
</header>
<section>
<?php
	$result=mysqli_query($link,'SELECT profilepic FROM profile_pic WHERE id="'. $q.'"');
	
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
