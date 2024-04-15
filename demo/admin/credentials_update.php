<?php
include('../admin/conn.php');
if(isset( $_GET['id'])){
    $id= $_GET['id'];
    $sql="SELECT * FROM `credentials` WHERE id='$id'";
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
                        <h1 class="mt-4">CREDENTIALS</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="panel.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Credentials</li>
                        </ol>
                        <div class="row">
                            <div class="col-lg-12">
                            <form action="credentials_update.php" method="post">
                                <?php
                                $id=$_GET['id'];
                                $sql= "SELECT * FROM `credentials` WHERE id ='$id'";
                                $result=mysqli_query($conn,$sql);
                                while($row=mysqli_fetch_assoc($result)){
                                
                                ?>
          <div class="mb-3">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control p-2" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="xyz@gmail.com" value="<?php  echo $row['email'];?>">

          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Address</label>
            <input type="text" class="form-control p-4" id="exampleInputPassword1" name="address" value="<?php  echo $row['address'];?>">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Phone No</label>
            <input type="number" class="form-control p-2" id="exampleInputPassword1"  placeholder="+91-000-000-0000" name="number" value="<?php  echo $row['number'];?>">
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
    $id=$_POST['id'];
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $address=mysqli_real_escape_string($conn,$_POST['address']);
    $num=mysqli_real_escape_string($conn,$_POST['number']);
    
    $update="UPDATE `credentials` SET `email`='$email',`address`='$address',`number`='$num' WHERE id='$id'";
    $result=mysqli_query($conn,$update);
    if($result){
        echo '<meta http-equiv="refresh" content="0; url=credentials_details.php"/>';
    
}
}
?>