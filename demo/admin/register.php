<?php
        include('conn.php');
    if(isset($_POST['register'])){
        $fname=mysqli_real_escape_string($conn, $_POST["fname"]);
        $lname=mysqli_real_escape_string($conn, $_POST["lname"]);
        $email=mysqli_real_escape_string($conn, $_POST["email"]);
        $password=trim($_POST["pass"]);
        $cpass=trim($_POST["cpass"]);
         if($password===$cpass){
            // hashed pass
            $hashedPwd = password_hash($password,PASSWORD_DEFAULT); 
            $sql = "INSERT INTO `register`(`name`, `lname`, `email`, `password`) VALUES ('$fname','$lname','$email','$hashedPwd')";
            $res=mysqli_query($conn,$sql);
                if($res){
                    header('location:login.php');
                }else{
                    echo '<div class="alert alert-warning" role="alert">
                    register failed try again..!
                  </div>';
                }
         }
         else{
            echo '<div class="alert alert-danger" role="alert">
                    Password does not match..!
                  </div>';
         }

    }
 ?>
       <!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include necessary links -->
    <?php include('links.php');?>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <main>
        <div class="container">
          <h1>Create Account</h1>
          <form action='register.php' method="post">
            <div class="input_con">
              <div class="form-control">
                  <input type="text" required name="fname">
                  <label>First Name</label>
              </div>
              <div class="form-control">
                  <input type="text" required name="lname">
                  <label>Last Name</label>
              </div>
            </div>
              <div class="form-control">
                  <input type="email" required name="email">
                  <label>Email</label>
              </div>
              <div class="input_con">
              <div class="form-control">
                  <input type="password" required name="pass">
                  <label>Password</label>
              </div>
              <div class="form-control">
                  <input type="password" required name="cpass">
                  <label>Confirm Password</label>
              </div>
              </div>
              <button class="btn" type="submit" name="register">Create</button>
              <p class="text"> have an account? <a href="login.php">Login</a></p>
          </form>
      </div>
    </main>
    <script>
        const labels = document.querySelectorAll('.form-control label')

labels.forEach(label => {
    label.innerHTML = label.innerText
        .split('')
        .map((letter, index) => `<span style="transition-delay:${index * 40}ms">${letter}</span>`)
        .join('')
})
    </script> 
</body>
</html>
