<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"chatapp");
?>
<?php
include "headermsg.php";
?>
<nav>
<section style="background-image: url('css/concrete_seamless.pneg')">
<?php
	$result=mysqli_query($link,'SELECT * FROM profile_pic WHERE username="'.$other.'"');
	while($row=mysqli_fetch_assoc($result)){
	if ($row["profilepic"] == ""){
	echo '<a href="otherprofilepic.php?user='.$row["username"].'" class="img-blur"><img class="img-circle" src="profilepicture/default.jpg" alt="default DP" style="float: left"></a>';
	echo "<br>";
	echo "<a href='otherprofile.php?user=".$row['username']."' class='name-blur' style='text-decoration: none;'><h1 class='name'>".$row['username']."</h1></a>";
	}else{

	
	echo "<a href='otherprofilepic.php?user=".$row['username']."' class='img-blur'><img class='img-circle' src='profilepicture/".$row['profilepic']."' alt='DP'style='float: left'></a>";
	
	echo "<br>";
	echo "<a href='otherprofile.php?user=".$row['username']."' class='name-blur' style='text-decoration: none;'><h1 class='name'>".$row['username']."</h1></a>";
	}
}
?>

</section>
<article>
</article>
<aside>
<div class="textbox" id="chatlogs" style="background-image: url('css/confectionary.jpg');">
	
	<script>
	var myVar = setInterval(function(){ myTimer() }, 100);

  function myTimer()
   	{
	var user='<?php echo $me; ?>';
	var other='<?php echo $other; ?>';
   	  var xmlhttp=new XMLHttpRequest();
    	 
      	xmlhttp.onreadystatechange=function(){
      	  if (xmlhttp.readyState==4 && xmlhttp.status==200){
           document.getElementById("chatlogs").innerHTML=this.responseText;
          }
        };
      xmlhttp.open("GET","pageload.php?othr="+other+"&usr="+user,true);
      xmlhttp.send();
}



	</script>

</div>
<div class="msgbox">
<form name="form1" action="" onsubmit="submitchat();">
<input type="text" name="msg" size="95" onkeydown="if (event.keyCode == 13) {return false;}"></input>
<a href="msg.php?user=<?php echo $other ?>" onclick="submitchat()" style="width: 70px; text-decoration: none; background-color: #39ac73; color: #ffffff; align: right;">send</a>
</form>

</div>
</aside>
</nav>
</body>
</html>
