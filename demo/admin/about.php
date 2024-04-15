<?php
include('../admin/conn.php');
if(isset($_POST['submit'])){
  
  $aboutdesc=mysqli_real_escape_string($conn,$_POST['aboutdesc']);
  $drname=mysqli_real_escape_string($conn,$_POST['drname']); 
  $drdesc=mysqli_real_escape_string($conn,$_POST['drdesc']);
  $image=$_FILES['image']['name'];
  $temp_name=$_FILES['image']['tmp_name'];
  $aboutfolder="aboutfolder/".$image;
  move_uploaded_file($temp_name,$aboutfolder);
 
$insert="INSERT INTO `aboutus`(`aboutdesc`, `doctorname`, `aboutdoctor`, `image`) VALUES ('$aboutdesc','$drname','$drdesc','$aboutfolder')";
$result=mysqli_query($conn,$insert);
if($result){
  header("location:about_details.php");
}
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
        
                        <h1 class="mt-4 ">ABOUT US</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="panel.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">about</li>
                        </ol>
                        <div class="row">
                            <div class="col-lg-12">
                            <form action="about.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">About description</label>
            <input type="text" class="form-control p-4" id="exampleInputPassword1"   name="aboutdesc">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Dr Name</label>
            <input type="text" class="form-control p-2" id="exampleInputPassword1" name="drname">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Doctor description</label>
            <input type="text" class="form-control p-4" id="exampleInputPassword1"   name="drdesc">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Doctor Image</label>
            <input type="file" class="form-control p-2" id="exampleInputEmail1" aria-describedby="emailHelp" name="image">

          </div>
          
          <button type="submit" class="btn btn-primary p-2" name="submit">Submit</button>
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