<?php
$t=$_REQUEST["user"];
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"chatapp");


$resu=mysqli_query($link,"SELECT * FROM msg_grp WHERE me LIKE '".$t."' OR username LIKE '".$t."' ORDER BY id DESC");
if(mysqli_num_rows($resu) != 0){
while($rowes=mysqli_fetch_array($resu)){
if($t == $rowes["me"]){
echo "<a href='msg.php?user=".$rowes["username"]."' style='text-decoration: none;'><div class='other'>".$rowes['username'];

$tablnm=$rowes['tablename'];
 $res=mysqli_query($link,"SELECT * FROM $tablnm ORDER BY id DESC LIMIT 1");
while($rows=mysqli_fetch_array($res)){
echo "<div class='msg'>".$rows['msg']."</div></div></a>";

}
}
else{
echo "<a href='msg.php?user=".$rowes["me"]."' style='text-decoration: none;'><div class='other'>".$rowes['me'];

$tablnm=$rowes['tablename'];
 $res=mysqli_query($link,"SELECT * FROM $tablnm ORDER BY id DESC LIMIT 1");
while($rows=mysqli_fetch_array($res)){
echo "<div class='msg'>".$rows['msg']."</div></div></a>";
}
}

}
}

?>	
