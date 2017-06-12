<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"chatapp");
?>
<?php
include "headerotherprofile.php";
?>
<nav>
<?php
	$result=mysqli_query($link,'SELECT profilepic FROM profile_pic WHERE username="'.$q.'"');
	while($row=mysqli_fetch_assoc($result)){
	if ($row["profilepic"] == ""){
	echo '<a href="otherprofilepic.php?user='.$q.'" class="img-blur"><img class="img-circle" src="profilepicture/default.jpg" alt="default DP" style="float: left"></a>';
	
	}else{

	
	echo "<a href='otherprofilepic.php?user=".$q."' class='img-blur'><img class='img-circle' src='profilepicture/".$row['profilepic']."' alt='DP'style='float: left'></a>";
	
	}
}

?>
<?php
	$res=mysqli_query($link,'SELECT * FROM login_table WHERE username="'.$q.'"');
	while($row=mysqli_fetch_array($res))
	{
?>
<form method="post" style="float: right; padding-right: 500px;"  action="">
<h1><?php echo $row["username"] ?></h1><br>

Full Name:<span style="padding-left: 20px;">
<input type="text" name="name" value="<?php echo $row["fullname"]; ?>" readonly></input><br></span><br><br>
D/O/B:<span style="padding-left: 53px;">

<input type="text" name="d/o/b" value="<?php echo $row["day"]."/".$row["month"]."/".$row["year"]; ?>" readonly></input><br></span><br><br>
Email:<span style="padding-left: 53px;">
<input type="text" name="mail" value="<?php echo $row["email"]; ?>" readonly></input><br></span><br><br>
City:<span style="padding-left: 64px;">
<input type="text" name="city" value="<?php echo $row["city"]; ?>" readonly></input><br></span><br><br>
</form><br>
<?php
	}
?>
</nav>

<?php
include "footer.php";
?>

