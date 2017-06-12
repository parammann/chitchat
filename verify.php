<?php
session_start();
if($_SESSION["you"]==""){
?>
<script>
window.location="login.php";
</script>

<?php
}
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"chatapp");
?>
<?php
include "headerverify.php";
?>

<section>
<form method="post" action="">
<span style="margin-left: 120px;"><input type="password" placeholder="verification code" name="verify" maxlength="4" required pattern="[A-Za-z0-9].{2, }"><br><br></span>
<span style="margin-left: 110px"><input type="submit" value="Submit" name="submit1" style="background-color: #39ac73;width: 18em;height: 2.5em; color: #ffffff;"></input></span>
</form>
<?php
if(isset($_POST["submit1"]))
{
if($_POST['verify']==$_SESSION["you"]){
$res=$_SESSION["you"];
mysqli_query($link,"INSERT login_table (id,fullname,username,password,month,day,year,email,random) SELECT id,fullname,username,password,month,day,year,email,random FROM temp_signup WHERE random=$res");
mysqli_query($link,"INSERT profile_pic (username,id) SELECT username,id FROM temp_signup WHERE random=$res");
mysqli_query($link,"DELETE FROM temp_signup WHERE random=$res");
/*$result=mysqli_query($link,"SELECT * FROM temp_signup WHERE random=$res");
while($row=mysqli_fetch_array($result)){
  $id=$row["id"];
  $full_name=$row["fullname"];
  $usr_name=$row["username"];
  $pass=$row["password"];
  $mnth=$row["month"];
  $day=$row["day"];
  $yr=$row["year"];
  $mail=$row["email"];
  $rndm=$row["random"];

 mysqli_query($link,"insert into login_table values('$id','$full_name','$usr_name','$pass',' $mnth','$day','$yr','$mail','$rndm','')");*/
/* mysqli_query($link,"insert into profile_pic values('$usr_name','','$id')");
 mysqli_query($link,"DELETE FROM temp_signup WHERE random=$res");
}*/
?>
<script>
window.alert("Your account has been created");
setTimeout(function(){
	window.location="login.php";
	},6000);
</script>
<?php
}
else{
?>
<script>
window.alert("verification code is incorrect");
</script>
<?php
}
}
?>
</section>


<?php
include "footer.php";
?>
