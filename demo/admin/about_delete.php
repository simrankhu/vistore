<?php
include("../admin/conn.php");
if(isset($_GET["deleteid"])){
  $id=$_GET['deleteid'];
  $sql= "DELETE FROM `aboutus` WHERE id= '$id'";
  $result=mysqli_query($conn,$sql);

}


?>
<meta http-equiv="refresh" content="0; url=about_details.php"/>  