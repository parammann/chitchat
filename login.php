<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"chatapp");
?>
<?php
include "header.php";
?>
<nav>Log in to Chat</nav>
<section>
<form method="post" action="">
Username<span style="margin-left: 20px;"><input type="text" placeholder="username" name="user" maxlength="20" required>
</input><br><br><span>
Password<span style="margin-left: 20px;"><input type="password" placeholder="password" name="pswd" maxlength="20" required>
</input></span><br><br>
<span style="margin-left: 80px;"><input type="submit" value="submit" name="submit" style="background-color: #39ac73;width: 18em;height: 2.5em; color: #ffffff;"></input></span>
</form>
<?php
	if(isset($_POST["submit"])){
$psd=md5($_POST["pswd"]);
$count=0;
$result=mysqli_query($link,"SELECT * FROM login_table WHERE username='$_POST[user]' && password='$psd'");
$count=mysqli_num_rows($result);
if($count>0) {
while($res=mysqli_fetch_array($result)){
session_start();
$_SESSION["me"]=$res["username"];
$_SESSION["id"]=$res["id"];
?>
<script>
window.location="chatbox.php";
</script>
<?php
}
}
else{
?>
<script>
window.alert("Your Username or Password is incorrect");
</script>
<?php

}
}
mysqli_close($link);
?>
</section>
<article>
<br><br>
<span style="margin-left: 100px;">or</span>
<br><br>
<a href="#"><img src="css/Screenshot from 2017-05-18 22-41-56.png" style="box-shadow: 5px 5px 5px #888888;"></a><br><br>
<a href="#"><img src="css/Screenshot from 2017-05-18 22-53-52.png" style="box-shadow: 5px 5px 5px #888888;"></a>
</article>
<?php
include "footer.php";
?>
</body>
</html>

