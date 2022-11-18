<?php
@include 'config.php';
session_start();
if(isset($_POST['submit'])){


   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $password = sha1($_POST['password']);



   $select = " SELECT * FROM user_form WHERE username = '$username' && password = '$password' ";
   
   $result = mysqli_query($conn, $select);
   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:index.php');


      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:index.php');

      }
     
   }else{
      $error[] = 'incorrect username or password!';
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
    <title>M-Market Log in</title>
</head>
<body>
<div class="topnav">
        <a href="Index.php">Back to homepage</a>
</div>
 <div class="form-container">
    <form action="" method="post">
        <h5>Log in</h5>
        <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
        <input type="text" name="username" required placeholder="enter your username">
        <input type="password" name="password" required placeholder="enter your password">
        <input type="submit" name="submit" value="Log in" class="form-btn">
        <p>Don't have an account? <a href="register_form.php">Sign up now</a></p> 
    </form>
 </div>
</body>
</html>
