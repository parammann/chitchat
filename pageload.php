<?php
	$user=$_REQUEST["usr"];
	$othr=$_REQUEST["othr"];
	

	$link=mysqli_connect("localhost","root","");
         mysqli_select_db($link,"chatapp");

	$resu=mysqli_query($link,"SELECT * FROM msg_grp WHERE me LIKE '$user' OR me LIKE '$othr' ");
	if(mysqli_num_rows($resu) != 0){
	while($rowes=mysqli_fetch_array($resu)){
	if(($user == $rowes['me'] && $othr == $rowes['username']) || ($othr == $rowes['me'] && $user == $rowes['username'])){
		$tablnm=$rowes['tablename'];
		
		$res=mysqli_query($link,"SELECT * FROM $tablnm");
		while($rows=mysqli_fetch_array($res)){
		if($user==$rows['receiver']){
		echo "<div class='other'>".$rows['msg']."</div>";
		}
		else if($user==$rows['sender']){
		echo "<div class='me'>".$rows['msg']."</div>";
		}}
	}
	}
}
?>
