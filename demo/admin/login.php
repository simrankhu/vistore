<?php
include('conn.php');
session_start();
if(isset($_POST['login'])){
    $email=mysqli_real_escape_string($conn,$_POST['email']);  //escaping special character
    $password=trim($_POST["password"]);
    
    $sql="SELECT * FROM `register` WHERE email='$email'"; 
    $res=mysqli_query($conn,$sql);

    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);
        $hash=$row['password'];

        // verify hashing
        if(password_verify($password, $hash)) {
            $_SESSION['userid']=$row['id'];
            $_SESSION['login']=true;
            header("location: panel.php");
            exit;

        }
        else{
            echo '<div class="alert alert-danger" role="alert">
                    invalid password use correct password..!
                  </div>';
        }
        

    }
    else{
        echo '<div class="alert alert-warning" role="alert">
                user not found..!
              </div>';
    }
      //query to
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
          <h1>Login</h1>
          <form action='login.php' method="post">
          
              <div class="form-control">
                  <input type="email" required name="email">
                  <label>Email</label>
              </div>
          
              <div class="form-control">
                  <input type="password" required name="password">
                  <label>Password</label>
              </div>
              
              <button class="btn" type="submit" name="login">Login</button>
             
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
