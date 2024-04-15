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
                        <h1 class="mt-4">DETAILS</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="panel.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Clients</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Client Details
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Phone No</th>
                                            <th>Message</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        <?php
                                        include('../admin/conn.php');
                                        $sql='SELECT * FROM `client`';
                                        $result=mysqli_query($conn,$sql);
                                        while($row=mysqli_fetch_array($result)){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['fname']?></td>
                                            <td><?php echo $row['lname']?></td>
                                            <td><?php echo $row['email']?></td>
                                            <td><?php echo $row['number']?></td>
                                            <td><?php echo $row['message']?></td>
                                            <td><a href="details_delete.php?deleteid=<?php echo $row['id'];?>" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a></td>
                                         
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
