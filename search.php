<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"chatapp");
?>
<?php
include "headerverify1.php";
?>

<section>
<form>

<input type="text" placeholder="Enter Username" onkeyup="showHint(this.value)"></input>
</form>
<p id="texhint"></p>



</section>


<?php
include "footer.php";
?>
