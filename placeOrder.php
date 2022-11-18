<?php

if(isset($_GET["content"]) && isset($_GET["name"]) && isset($_GET["email"]) && isset($_GET["number"]) && isset($_GET["address"])){
   $db_host="localhost";
   $db_user="root";
   $db_password="";
   $db_name="online_shop";

   $lnk=mysqli_connect($db_host,$db_user,$db_password);
   if(!$lnk){
      die("Database connection failed");
   }

   mysqli_select_db($lnk,$db_name) or die("Failed to select DB");

   $query="INSERT INTO `order` (`Content`, `Name`,`Email`,`Number`,`Address`)".
      "VALUES ('".$_GET["content"]."', '".$_GET["name"]."','".$_GET["email"]."','".$_GET["number"]."','".$_GET["address"]."');";

   //$rs=mysqli_query($lnk,$query);
   $rs=mysqli_multi_query($lnk,$query);

}else{
   die("Improper use of this script");
}

?>