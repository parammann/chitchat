<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"chatapp");
?>
<?php
session_start();
include "headersignup.php";
?>
<nav>Create Account of ChitChat</nav>
<section>
<form name="form1" method="post" action="" >
Full Name:<span style="margin-left: 35px;"><input type="text" placeholder="fullname" name="name" maxlength="20" pattern="[A-Za-z\s].{3,}"
title="Please enter name in [a-z] format" required>
</input><br><br><span>
Username:<span style="margin-left: 35px;"><input type="text" placeholder="username" name="user" maxlength="20" required pattern="[A-Za-z0-9].{3,}" 
title="Please enter name in [a-z and 0-9] format"><br><br></span>
Password:<span style="margin-left: 35px;"><input type="password" placeholder="password" name="pass" maxlength="20" required pattern="[A-Za-z0-9].{7,}" title="Please enter name in [a-z and 0-9] format and min of 7 digits"><br><br></span>
Date of Birth:<span style="margin-left: 25px;"><select name="month">
<option value="January" selected="selected">jan</option>
<option value="february">feb</option>
<option value="march">mar</option>
<option value="april">apr</option>
<option value="may">may</option>
<option value="june">jun</option>
<option value="july">jul</option>
<option value="august">aug</option>
<option value="september">sep</option>
<option value="october">oct</option>
<option value="november">nov</option>
<option value="december">dec</option>
</select>
</script>
<select name="date" id="id2" onclick="functiondate()">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12" selected="selected">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
</span>
<select name="year">
<option value="1961">1961</option>
<option value="1962">1962</option>
<option value="1963">1963</option>
<option value="1964">1964</option>
<option value="1965">1965</option>
<option value="1966">1966</option>
<option value="1967">1967</option>
<option value="1968">1968</option>
<option value="1969">1969</option>
<option value="1970">1970</option>
<option value="1971">1971</option>
<option value="1972">1972</option>
<option value="1973">1973</option>
<option value="1974">1974</option>
<option value="1975">1975</option>
<option value="1976">1976</option>
<option value="1977">1977</option>
<option value="1978">1978</option>
<option value="1979">1979</option>
<option value="1980">1980</option>
<option value="1981">1981</option>
<option value="1982">1982</option>
<option value="1983">1983</option>
<option value="1984">1984</option>
<option value="1985">1985</option>
<option value="1986">1986</option>
<option value="1987">1987</option>
<option value="1988">1988</option>
<option value="1989">1989</option>
<option value="1990">1990</option>
<option value="1991">1991</option>
<option value="1992">1992</option>
<option value="1993">1993</option>
<option value="1994">1994</option>
<option value="1995">1995</option>
<option value="1996" selected="selected">1996</option>
<option value="1997">1997</option>
<option value="1998">1998</option>
<option value="1999">1999</option>
<option value="2000">2000</option>
<option value="2001">2001</option>
<option value="2002">2002</option>
<option value="2003">2003</option>
<option value="2004">2004</option>
<option value="2005">2005</option>
<option value="2006">2006</option>
<option value="2007">2007</option>
<option value="2008">2008</option>
<option value="2009">2009</option>
<option value="2010">2010</option>
<option value="2011">2011</option>
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
<option value="2016">2016</option>
<option value="2017">2017</option>
</select><br><br>
Email Address<span style="margin-left: 6px;"><input type="text" placeholder="Email" name="mail" maxlength="40" required pattern="[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="Please enter valid email address"><br><br></span><br>
<span style="margin-left: 110px"><input type="submit" value="Submit" name="submit1" style="background-color: #39ac73;width: 18em;height: 2.5em; color: #ffffff;"></input></span>
</form>
<?php
	if(isset($_POST["submit1"]))
{
	$pswd=md5($_POST["pass"]);
	$email=$_POST["mail"];
	$random= rand(1000,9999);
	$sub="chitchat";
	$msg="Username".$_POST["user"]."\n"
	."Password".$_POST["pass"]."\n"
	."verification no.".$random;
	mail($email,$sub,$msg);
	
	$res=mysqli_query($link,"SELECT username,email FROM temp_signup");
	while($row=mysqli_fetch_array($res)){
	if($_POST['user']==$row["username"])	
	{
	?>
	<script>
	window.alert("username is already exists");
	</script>
	<?php
	break;
	}
	else if($_POST['mail']==$row["email"]){
	?>
	<script>
	window.alert("Email is already registered");
	</script>
	<?php
	break;
	}
	else{
	mysqli_query($link,"insert into temp_signup values('','$_POST[name]','$_POST[user]','$pswd','$_POST[month]','$_POST[date]','$_POST[year]','$_POST[mail]','$random')");
	$_SESSION["you"]=$random;
}}	

?>
<script type="text/javascript">
	alert("Verification code is send through email");
	setTimeout(function(){
	window.location="verify.php?id <?php echo $row['user'] ?>";
	},1000);
</script>
<?php

}
?>

</section>

<?php
include "footer.php";
?>
