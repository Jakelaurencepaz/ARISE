<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
    
   $email = mysqli_real_escape_string($conn, $_POST['usermail']);
   $pass = md5($_POST['password']);

   $select = "SELECT * FROM ariseuserform WHERE email = '$email' && password = '$pass'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 1){
      $_SESSION['usermail'] = $email;
      header("Location: localhost/project/homepage2.php");
   }else{
      $error[] = 'Incorrect email or password';
   }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    
<div class="form-container">

    <form action="" method="post">
        <h3 class="title">login now</h3>
        <?php
            if(isset($error)){
               foreach($error as $error){
                  echo '<span class="error-msg">'.$error.'</span>';
               }
            }
         ?>
        <input type="email" name="usermail" placeholder="enter your email" class="box" required>
        <input type="password" name="password" placeholder="enter your password" class="box" required>
        <input type="submit" value="Login now" class="form-btn" name="submit">
        <p>Don't have an account? <a href="register.php">Register now!</a></p>
    </form>

</div>

</body>
</html>