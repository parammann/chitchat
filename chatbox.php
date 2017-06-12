<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"chatapp");
?>
<?php
include "headerchatbox.php";
?>
<nav>
<section style="background-image: url('css/concrete_seamless.pneg')">
<?php
	$result=mysqli_query($link,'SELECT * FROM profile_pic WHERE id="'.$id.'"');
	while($row=mysqli_fetch_assoc($result)){
	if ($row["profilepic"] == ""){
	echo '<a href="profilepic.php?user='.$row["id"].'" class="img-blur"><img class="img-circle" src="profilepicture/default.jpg" alt="default DP" style="float: left"></a>';
	echo "<br>";
	echo "<a href='userprofile.php?user=".$row['id']."' class='name-blur' style='text-decoration: none;'><h1 class='name'>".$row['username']."</h1></a>";
	}else{

	
	echo "<a href='profilepic.php?user=".$row['id']."' class='img-blur'><img class='img-circle' src='profilepicture/".$row['profilepic']."' alt='DP'style='float: left'></a>";
	
	echo "<br>";
	echo "<a href='userprofile.php?user=".$row['id']."' class='name-blur' style='text-decoration: none;'><h1 class='name'>".$row['username']."</h1></a>";
	}
}
?>

</section>
<article>
</article>
<aside>
<div class="textbox" id="chatlog" style="background-image: url('css/confectionary.jpg');">
<script>
	var myVar = setInterval(function(){ myTimer() }, 500);

  function myTimer()
   	{
	  var user='<?php echo $me; ?>';
   	  var xmlhttp=new XMLHttpRequest();
      	xmlhttp.onreadystatechange=function(){
      	  if (xmlhttp.readyState==4 && xmlhttp.status==200){
           document.getElementById("chatlog").innerHTML=this.responseText;
          }
        };
      xmlhttp.open("GET","chatbox1.php?user="+user,true);
      xmlhttp.send();
}
	</script>
	
	

</div>

</aside>
</nav>
</body>
</html>
