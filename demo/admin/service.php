<?php
include('../admin/conn.php');
if(isset($_POST['submit'])){
    $image=$_FILES['image']['name'];
    $temp_name=$_FILES['image']['tmp_name'];
    $servicefolder="servicefolder/".$image;
    $image2=$_FILES['image2']['name'];
    $temp_name2=$_FILES['image2']['tmp_name'];
    $service2folder="service2folder/".$image2;

    $servicename=mysqli_real_escape_string($conn,$_POST['servicename']); 
    $servicedesc=mysqli_real_escape_string($conn,$_POST['servicedesc']);
    $sadvantage=mysqli_real_escape_string($conn,$_POST['sadvantage']);
 
  move_uploaded_file($temp_name,$servicefolder);
  move_uploaded_file($temp_name2,$service2folder);

 
$insert="INSERT INTO `service`(`image`, `servicename`, `servicedesc`, `sadvantage`,`image2`) VALUES ('$servicefolder','$servicename','$servicedesc','$sadvantage','$service2folder')";
$result=mysqli_query($conn,$insert);
if($result){
    echo '<meta http-equiv="refresh" content="0; url= service_details.php"/>';
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
                    <h1 class="mt-4 ">SERVICE</h1>
                    <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="panel.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Service</li>
                        </ol>

                    <div class="row">
                        <div class="col-lg-12">
                            <form action="service.php" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Service Image</label>
                                    <input type="file" class="form-control p-2" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="image">

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Service2 Image</label>
                                    <input type="file" class="form-control p-2" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="image2">

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Service Title</label>
                                    <input type="text" class="form-control p-2" id="exampleInputPassword1"
                                        name="servicename">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Service description</label>
                                    <textarea class="p-4 editor" id="exampleInputPassword1"
                                        name="servicedesc"></textarea>

                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Service Advantages</label>
                                    <textarea class="p-4 editor2" id="exampleInputPassword1"
                                        name="sadvantage"></textarea>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector(".editor"), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(err => {
                console.error(err.stack);
            });
        ClassicEditor
            .create(document.querySelector(".editor2"), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(err => {
                console.error(err.stack);
            });
    </script>
</body>

</html>