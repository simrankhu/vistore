<?php
include("../admin/conn.php");
if(isset($_GET["deleteid"])){
  $id=$_GET['deleteid'];
  $sql= "DELETE FROM `blog` WHERE id= '$id'";
  $result=mysqli_query($conn,$sql);

}


?>
<meta http-equiv="refresh" content="0; url=blog_details.php"/>  