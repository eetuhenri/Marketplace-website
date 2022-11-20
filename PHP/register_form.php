<?php

@include 'config.php';

if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $password = sha1($_POST['password']);
   $confirm_password = sha1($_POST['confirm_password']);
   $user_type = 'user';


   $select = " SELECT * FROM user_form WHERE username = '$username' && name = '$name' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
        $error[] = 'user already exist!';
   }
   else{

      if($password != $confirm_password){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, username, password, user_type) VALUES('$name','$username','$password', '$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};
?>


<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <script src="store.js"></script>
    <title>M-Market Sign up</title>
</head>
<body>
<div class="topnav">
        <a href="Index.php">Back to homepage</a>
</div>
 <div class="form-container">
    <form action="" method="post">
        <h5>Sign up now</h5>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
      };
      ?>
        <input type="text" name="name" required placeholder="enter your  full name">
        <input type="text" name="username" required placeholder="enter your username">
        <input type="password" name="password" required placeholder="enter your password">
        <input type="password" name="confirm_password" required placeholder="confirm your password">
        <input type="submit" name="submit" value="Register" class="form-btn">
        <p>Already have an account? <a href="login_form.php">Login now</a></p> 
    </form>
 </div>
</body>
</html>
