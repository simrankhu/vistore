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
                        <h1 class="mt-4">Blog</h1>
                       <div class="div d-flex justify-content-between  align-items-center">
                       <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="panel.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Blog</li>
                        </ol>
                        <a href="blog.php" class="btn btn-secondary mb-2"> <i class="fa fa-plus"></i> add blog</a>
                       </div>
                        

                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Blog Details
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="col">Blog Name</th>
                                            <th class="col">Blog description</th>
                                            <th class="col">Blog Advantages</th>
                                            <th class="col">Image</th>
                                            <th class="col">Image2</th>
                                            <th class="col">Action</th>
                                          
                                            
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        <?php
                                        include('../admin/conn.php');
                                        $sql='SELECT * FROM `blog`';
                                        $result=mysqli_query($conn,$sql);
                                        while($row=mysqli_fetch_assoc($result)){
                                        ?>
                                        <tr>
                                           
                                           
                                            <td><?php echo $row['blogname'];?></td>
                                            <td><?php echo substr($row['blogdesc'],0,150);?></td>
                                            <td><?php echo substr($row['badvantage'],0,150);?></td>
                                            <td><img src="../admin/<?php echo $row['image']?>" alt="" width="60px" height="30px"></td>
                                            <td><img src="../admin/<?php echo $row['image2']?>" alt="" width="60px" height="30px"></td>

                                            <td><a href="blog_update.php?editid=<?php echo $row['id'];?>" class="btn btn-primary"><i class="bi bi-pen-fill"></i></a>
                                            <a href="blogdelete.php?deleteid=<?php echo $row['id'];?>" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a></td>


                                         
                                         
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                       
                       
                                        
                                    </tbody>
                                </table>
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
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
