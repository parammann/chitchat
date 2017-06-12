<?php
  $q=$_GET["user"];
?>
<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"chatapp");
?>
<?php

if(isset($_POST["submit"])){
$prvpass=md5($_POST["pass"]);
$new=md5($_POST["newpass"]);
	$res=mysqli_query($link,'SELECT * FROM login_table WHERE id="'.$q.'"');
	while($row=mysqli_fetch_array($res))
	{	
		if($prvpass==$row["password"]){
		$result=mysqli_query($link,'UPDATE login_table SET password="'.$new.'" WHERE id="'.$q.'"');
		}
		else{
		?>
		<script>
		window.alert("Password is incorrect");
		</script>
		<?php
		}
	}
}
?>
<?php
include "headerchngpass.php";
?>
<nav>
<?php
	$result=mysqli_query($link,'SELECT profilepic FROM profile_pic WHERE id="'.$q.'"');
	while($row=mysqli_fetch_assoc($result)){
	if ($row["profilepic"] == ""){
	echo '<a href="profilepic.php?user='.$q.'" class="img-blur"><img class="img-circle" src="profilepicture/default.jpg" alt="default DP" style="float: left"></a>';
	
	}else{

	
	echo "<a href='profilepic.php?user=".$q."' class='img-blur'><img class='img-circle' src='profilepicture/".$row['profilepic']."' alt='DP'style='float: left'></a>";
	
	}
}

?>
<?php
	$res=mysqli_query($link,'SELECT * FROM login_table WHERE id="'.$q.'"');
	while($row=mysqli_fetch_array($res)){
?>
<form method="post" style="float: right; padding-right: 400px;"  action="">
<h1><?php echo $row["username"] ?></h1><br>

Previous Password:<span style="padding-left: 20px;">
<input type="password" name="pass" value="" required></input><br></span><br><br>
New Password:<span style="padding-left: 54px;">
<input type="password" name="newpass" value="" pattern="[A-Za-z0-9].{7,}" title="Please enter password in [a-z and 0-9] format and min of 7 digits" required></input><br></span><br><br>
<span style="padding-left: 184px;">
<input type="submit" value="Change password" name="submit"></input></span>
<a href="userprofile.php?user=<?php echo $row["id"] ?>" style="text-decoration: none;">
<input type="button" value="Previous Page" name="change"></input></span></a>
</nav>
<?php
}
?>
<?php
include "footer.php";
?>

