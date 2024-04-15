<?php
include('conn.php');

if(isset($_POST['submit'])){
  $email=mysqli_real_escape_string($conn,$_POST['email']);
  $address=mysqli_real_escape_string($conn,$_POST['address']);
  $number=$_POST['number'];
  $sql="INSERT INTO `credentials`( `email`, `address`, `number`) VALUES ('$email','$address','$number')";
  $res=mysqli_query($conn,$sql);
   if($res){
   echo'<meta http-equiv="refresh" content="0; url=credentials_details.php"/>';
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
                        <h1 class="mt-4">CREDENTIALS</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="panel.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Credentials</li>
                        </ol>
                        <div class="row">
                            <div class="col-lg-12">
                            <form action="credentials.php" method="post">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control p-2" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="xyz@gmail.com">

          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Address</label>
            <input type="text" class="form-control p-4" id="exampleInputPassword1" name="address">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Phone No</label>
            <input type="number" class="form-control p-2" id="exampleInputPassword1"  placeholder="+91-000-000-0000" name="number">
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