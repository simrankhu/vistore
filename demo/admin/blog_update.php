<?php
include('../admin/conn.php');
if(isset($_GET['editid'])){
    $id=$_GET['editid'];
    $sql= "SELECT * FROM `blog` WHERE id='$id'";
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
                    <h1 class="mt-4">Blogs</h1>
                    <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="panel.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Blogs</li>
                        </ol>

                    <div class="row">
                        <div class="col-lg-12">
                            <form action="blog_update.php" method="post" enctype="multipart/form-data">
                                <?php
                                $id=$_GET['editid'];
                                $sql="SELECT * FROM `blog` WHERE id='$id'";
                                $result=mysqli_query($conn,$sql);
                                while($row=mysqli_fetch_assoc($result)){
                                
                                ?>
                                <div class="mb-3">
                                    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                    <label for="exampleInputEmail1" class="form-label">Blog Image</label>
                                    <input type="file" class="form-control p-2" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="image">
                                        <img src="../admin/<?php echo $row['image'];?>" alt="" width="30px" height="50px">

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Blog2 Image</label>
                                    <input type="file" class="form-control p-2" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="image2">
                                        <img src="../admin/<?php echo $row['image2'];?>" alt="" width="30px" height="50px">


                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Blog Title</label>
                                    <input type="text" class="form-control p-2" id="exampleInputPassword1"
                                        name="blogname" value="<?php echo $row['blogname'];?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Blog description</label>
                                    <textarea class="p-4 editor" id="exampleInputPassword1"
                                        name="blogdesc"><?php echo $row['blogdesc'];?></textarea>

                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Blog Advantages</label>
                                    <textarea class="p-4 editor2" id="exampleInputPassword1"
                                        name="badvantage"><?php echo $row['badvantage'];?></textarea>
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

<?php
if(isset($_POST['submit'])){
 $id = $_POST['id']; 
 $blogname=mysqli_real_escape_string($conn,$_POST['blogname']); 
 $blogdesc=mysqli_real_escape_string($conn,$_POST['blogdesc']);
 $badvantage=mysqli_real_escape_string($conn,$_POST['badvantage']);

 // Check if a new image has been uploaded for 'image'
 if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
     $image = $_FILES['image']['name'];
     $temp_name = $_FILES['image']['tmp_name'];
     $blogupdatefolder = "blogupdatefolder/".$image;
     move_uploaded_file($temp_name, $blogupdatefolder);
 } else {
     // If no new image is uploaded, fetch the existing image path from the database
     $sql_fetch_image = "SELECT `image` FROM `blog` WHERE id='$id'";
     $result_fetch_image = mysqli_query($conn, $sql_fetch_image);
     $row_fetch_image = mysqli_fetch_assoc($result_fetch_image);
     $blogupdatefolder = $row_fetch_image['image'];
 }

 // Check if a new image has been uploaded for 'image2'
 if(isset($_FILES['image2']['name']) && $_FILES['image2']['name'] != "") {
     $image2 = $_FILES['image2']['name'];
     $temp_name2 = $_FILES['image2']['tmp_name'];
     $blogupdatefolder2 = "blogupdatefolder2/".$image2;
     move_uploaded_file($temp_name2, $blogupdatefolder2);
 } else {
     // If no new image is uploaded, fetch the existing image path from the database
     $sql_fetch_image2 = "SELECT `image2` FROM `blog` WHERE id='$id'";
     $result_fetch_image2 = mysqli_query($conn, $sql_fetch_image2);
     $row_fetch_image2 = mysqli_fetch_assoc($result_fetch_image2);
     $blogupdatefolder2 = $row_fetch_image2['image2'];
 }

 // Update the database with the new or existing image paths
 $sql = "UPDATE `blog` SET `image`='$blogupdatefolder',`image2`='$blogupdatefolder2',`blogname`='$blogname',`blogdesc`='$blogdesc',`badvantage`='$badvantage' WHERE id='$id'";
 $query = mysqli_query($conn, $sql);

 if($query) {
     echo '<meta http-equiv="refresh" content="0; url=blog_details.php"/>';
 }
}
?>