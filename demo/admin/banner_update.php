<?php
   include('../admin/conn.php');
   if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql= "SELECT * FROM `banner` WHERE id='$id'";
    $result=mysqli_query($conn,$sql);
   }
                              
 ?>


<!DOCTYPE html>
<html lang="en">

<!-- head -start -->
<?php include('links.php')?>
<!-- head -end-- -->

<body class="sb-nav-fixed">
  <!-- header-start -->
  <?php include('header.php')?>
  <!-- header-end -->
  <div id="layoutSidenav">
    <!-- slide_nav_start -->
    <?php include('slide_nav.php');?>
    <!-- slide_nav_end -->
    <div id="layoutSidenav_content">
      <main>
      <div class="container-fluid px-4">
                        <h1 class="mt-4">BANNER</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="panel.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Banner</li>
                        </ol>
                        
                        <div class="row">
                            <div class="col-lg-12">
                            <form action="banner_update.php" method="post" enctype="multipart/form-data">
                              <?php
                               
                                 $sql= "SELECT * FROM `banner` WHERE id='$id'";
                                 $result=mysqli_query($conn,$sql);
                                 while($row=mysqli_fetch_array($result)){
                              
                              ?>
                            <input type="hidden" name="id" id="" value="<?php echo $row['id']; ?>">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Banner Image</label>
            <input type="file" class="form-control p-2" id="exampleInputEmail1" aria-describedby="emailHelp" name="image">
            <img src="../admin/<?php echo $row['image'];?>" alt="" width="50px" height="30px">

          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Sub Title</label>
            <input type="text" class="form-control p-2" id="exampleInputPassword1" name="subtitle" value="<?php echo $row['subtitle'];?>">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Title</label>
            <input type="text" class="form-control p-2" id="exampleInputPassword1" name="title" value="<?php echo $row['title'];?>">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Title description</label>
            <input type="text" class="form-control p-4" id="exampleInputPassword1"   name="titledesc" value="<?php echo $row['titledesc'];?>">
          </div>

          <button type="submit" class="btn btn-primary p-2" name="submit">Submit</button>
                   <?php
                                 }
                                 ?> 
        </form>
                            </div>
                        </div>
                       
                        
                    </div>
      
      </main>
       <!-- footer-start -->
       <?php include('footer.php');?>
       <!-- footer-end -->
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
<?php
if(isset($_POST['submit'])){
    $id = $_POST['id']; // Retrieve the ID from the URL parameter
    $image = $_FILES['image'];
    $subtitle = mysqli_real_escape_string($conn, $_POST['subtitle']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $titledesc = mysqli_real_escape_string($conn, $_POST['titledesc']);

    if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=""){
        // Image is uploaded, handle image update
        $image = $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];
        $bannerupdatefolder = "bannerupdatefolder/".$image;
        move_uploaded_file($temp_name,$bannerupdatefolder);

        $sql = "UPDATE `banner` SET `image`='$bannerupdatefolder', `subtitle`='$subtitle', `title`='$title', `titledesc`='$titledesc' WHERE id= '$id'";
    } else {
        // Image is not uploaded, only update other fields
        $sql = "UPDATE `banner` SET `subtitle`='$subtitle', `title`='$title', `titledesc`='$titledesc' WHERE id= '$id'";
    }

    $query = mysqli_query($conn, $sql);
    if($query) {
   
     echo '<meta http-equiv="refresh" content="0; url=banner_details.php"/>';
     }
     else{
      header("location:banner_update.php");
     }

 
 
}
?>