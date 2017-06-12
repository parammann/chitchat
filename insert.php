<?php

	$link=mysqli_connect("localhost","root","");
       mysqli_select_db($link,"chatapp");
?>
<?php
	$user=$_REQUEST["usr"];
	$othr=$_REQUEST["othr"];
	$msg=$_REQUEST["mesg"];
	$count=0;
	function makeRandomString($max=6) {
    $i = 0;
    $possible_keys = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $keys_length = strlen($possible_keys);
    $str = "";
    while($i<$max) {
        $rand = mt_rand(1,$keys_length-1);
        $str.= $possible_keys[$rand];
        $i++;
    }
    return $str;
}
	$nme=makeRandomString();
	
	
	$result=mysqli_query($link,"SELECT * FROM msg_grp WHERE me LIKE '$user' OR me LIKE '$othr' ");
	if(mysqli_num_rows($result) == 0){
	
	$sql="CREATE TABLE $nme (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	sender VARCHAR(30) NOT NULL,
	receiver VARCHAR(30) NOT NULL,
	msg VARCHAR(500),
	reg_date TIMESTAMP
	)";
	mysqli_query($link,$sql);
	mysqli_query($link,"INSERT INTO $nme VALUES ('','$user','$othr','$msg','') ");
	mysqli_query($link,"INSERT INTO msg_grp VALUES ('','$user','$othr','$nme') ");
	$count++;
	}

	else{	
	while($row=mysqli_fetch_array($result)){
		if(($user == $row['me'] && $othr == $row['username']) || ($othr == $row['me'] && $user == $row['username'])){
		$count++;
		mysqli_query($link,"INSERT INTO ".$row['tablename']." VALUES ('','$user','$othr','$msg','') ");
		}
		}}
	 if($count==0){

	$sql="CREATE TABLE $nme (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	sender VARCHAR(30) NOT NULL,
	receiver VARCHAR(30) NOT NULL,
	msg VARCHAR(500),
	reg_date TIMESTAMP
	)";
	if (mysqli_query($link, $sql)){
   	 echo "Table MyGuests created successfully";
	} else {
  	  echo "Error creating table: " .  mysqli_error($link);
	}
	mysqli_query($link,"INSERT INTO $nme VALUES ('','$user','$othr','$msg','') ");
	mysqli_query($link,"INSERT INTO msg_grp VALUES ('','$user','$othr','$nme') ");
	}
	
	
	/*$resu=mysqli_query($link,"SELECT * FROM msg_grp WHERE me LIKE '$user' OR me LIKE '$othr' ");
	if(mysqli_num_rows($resu) != 0){
	while($rowes=mysqli_fetch_array($resu)){
	if(($user == $rowes['me'] && $othr == $rowes['username']) || ($othr == $rowes['me'] && $user == $rowes['username'])){
		$tablnm=$rowes['tablename'];
		$res=mysqli_query($link,"SELECT * FROM $tablnm");
		while($rows=mysqli_fetch_array($res)){
		if($user==$rows['sender']){
		echo "<div class='me'>".$rows['msg']."</div>";
		}
		else if($user==$rows['receiver']){
		echo "<div class='other'>".$rows['msg']."</div>";
		}}
	}
	}
}*/
?>
