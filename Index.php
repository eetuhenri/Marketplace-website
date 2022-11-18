<?php
@include 'config.php';

$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="online_shop";

$lnk=mysqli_connect($db_host,$db_user,$db_password);
if(!$lnk){
   die("Database connection failed");
}

mysqli_select_db($lnk,$db_name) or die("Failed to select DB");

$query="SELECT * FROM `product`";
$rs=mysqli_query($lnk,$query);



?>



<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <script src="store.js"></script>
    <title>M-Market</title>
</head>
<body>
    <h1>M-Market</h1>
    <div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="#product_area">Store</a>
  <a</a>
  <div class="search-container">
  <input placeholder="Search.." type="text" id="search">
<button onClick="search(document.getElementById('search').value)">Submit</button>
   </div>
</div>
<?php
session_start();

if(!isset($_SESSION['user_name']) && !isset($_SESSION['admin_name'])){
   echo'<button onClick= "location.href=\'login_form.php\'"id=log_in_button>Log in</button>';
   echo'<button onClick= "location.href=\'register_form.php\'"id=sign_up_button>Sign up</button>';
}

if(isset($_SESSION['user_name'])){
   echo "Welcome ", $_SESSION['user_name']; 
   echo '<button onclick= "location.href=\'logout.php\'"id=logout_button>Log out</button>';
}
elseif(isset($_SESSION['admin_name'])){
   echo "Welcome to admin mode ", $_SESSION['admin_name'];
   echo '<button onclick= "location.href=\'logout.php\'"id=logout_button>Log out</button>';
   echo "<div id='adminPanel'>
   <form action='upload.php' method='post' enctype='multipart/form-data'>
      Image:
      <input type='file' name='fileToUpload' id='fileToUpload'>
      <br>
      <input type='text' placeholder='name' name='name' id='name'>
      <br>
      <input type='number' placeholder='price' name='price' id='price'>
      <br>
      <input type='submit' value='Add Item' name='submit'>
   </form>
</div>";

}
?>
<p1 id="user_text"></p>
       
<div class="slider-frame">
    <div class="slide-images">
        <div class="img-container">
            <img src="images/newsletter.png" alt="Remember to check our newsletter every monday">
        </div>
        <div class="img-container">
            <img src="images/coming_soon.png" alt="Products that are coming soon">
        </div>
    </div>
</div>
<h2>Now in stock:</h2>
<div class="product_area", id="product_area">
         
    <?php
    if(mysqli_num_rows($rs)>0){ // if I have results
    while($row = mysqli_fetch_assoc($rs)){ // looping through them
    ?>

    <div class="card"> 
       <img class="center-cropped" src="images/<?php echo $row["Image"]; ?>"/>
       <p><?php echo $row["Name"]; ?><br>Price: <?php echo $row["Price"]; ?> euro<br></p>
       <button onClick="addToCart(<?php echo $row["ID"]; ?>,'<?php echo $row["Name"]; ?>','<?php echo $row["Price"]; ?>')">Add to Cart</button>
       <?php if(isset($_SESSION['admin_name'])){
         ?>
         <button onClick="deleteItem(<?php echo $row["ID"]; ?>)">Delete Item</button>
         <?php
       }
       ?>
    </div>

    <?php
       }
    } 
    ?>
    
 </div>

 <div id="shoppingCartContainer">
    <img src="images/cart_icon.png">
   </div>


<div class="footer">
    <p>Contact us on:</p></div>
</body>
</html>
