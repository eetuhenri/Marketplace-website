<?php

if(isset($_GET["id"])){
   $db_host="localhost";
   $db_user="root";
   $db_password="";
   $db_name="online_shop";

   $lnk=mysqli_connect($db_host,$db_user,$db_password);
   if(!$lnk){
      die("Database connection failed");
   }

   mysqli_select_db($lnk,$db_name) or die("Failed to select DB");

   $query="DELETE FROM `product` WHERE ID=".$_GET["id"].";";

   $rs=mysqli_query($lnk,$query);
   //$rs=mysqli_multi_query($lnk,$query);

}else{
   die("Improper use of this script");
}

?>