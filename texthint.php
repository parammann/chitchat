<?php
	$q=$_REQUEST["q"];
	$me=$_REQUEST["user"];
	if ($q !== "") {
      $link=mysqli_connect("localhost","root","");
       mysqli_select_db($link,"chatapp");

	
	
	$result=mysqli_query($link,"SELECT * FROM login_table WHERE username!='".$me."'  AND  username LIKE '%$q%'");
	if(mysqli_num_rows($result) != 0){
	while($row=mysqli_fetch_array($result)){
	echo "<a href='otherprofile.php?user=".$row['username']."' style='text-decoration:none;color:#000000'>".$row['username']."</a>"."<br>";
	}
	}
}
?>
