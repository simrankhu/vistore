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
                       <div class="div d-flex justify-content-between  align-items-center">
                       <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="panel.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">credentials</li>
                        </ol>
                        <a href="credentials.php" class="btn btn-secondary mb-2"> <i class="fa fa-plus"></i> add credentials</a>
                       </div>
                        

                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Details
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table">
                                    <thead>
                                        <tr>
                                           
                                            <th class="col">Email</th>
                                            <th class="col">Address</th>
                                            <th class="col">Phone Number</th>
                                            <th class="col">Action</th>
                                          
                                            
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        <?php
                                        include('../admin/conn.php');
                                        $sql='SELECT * FROM `credentials`';
                                        $result=mysqli_query($conn,$sql);
                                        while($row=mysqli_fetch_array($result)){
                                        ?>
                                        <tr>
                                            
                                            <td scope="row"><?php echo $row['email']?></td>
                                            <td><?php echo $row['address']?></td>
                                            <td><?php echo $row['number']?></td>
                                            <td><a href="credentials_update.php?id=<?php echo $row['id'];?>" class="btn btn-primary"><i class="bi bi-pen-fill"></i></a><a href="credentialsdelete.php?deleteid=<?php echo $row['id'];?>" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a></td>
                                          


                                         
                                         
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
