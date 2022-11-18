<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "online_shop";
$target_dir = "images/";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$message = "";

// Check if image file is of an accepted type
if (isset($_POST["submit"]))
{
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false)
    {
        $uploadOk = 1;
    }
    else
    {
        $message = "Sorry, file is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file))
{
    $message = "Sorry, file already exists.";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
{
    $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

$imageName = time() . "." . $imageFileType;
if ($uploadOk == 0)
{
    echo $message;
}
else
{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $imageName))
    {
        header( "Location: index.php" );
    }
    else
    {
        echo "Sorry, there was an error uploading your file.";
    }
}

$lnk = mysqli_connect($db_host, $db_user, $db_password);
if (!$lnk) die("Database connection failed");

mysqli_select_db($lnk, $db_name) or die("Failed to select DB");

$query = "INSERT INTO product (Name, Price, Image) Values " . "('" . $_POST["name"] . "','" . $_POST["price"] . "','$imageName')";
$rs = mysqli_query($lnk, $query);

?>
