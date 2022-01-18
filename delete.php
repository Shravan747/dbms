<?php
include "config.php";
if(isset($_GET['flatno'])){
    $user_flat = $_GET['flatno'];
    $sql1 = "delete from main_pay where flatno='$user_flat'";
$result = $conn->query($sql1);
if($result == TRUE)
{
    
    header('Location:view.php');

}
else{
    echo "Error:" .$sql."<br>".$conn->error;
     }
     
     
  

     $sql2 = "delete from bhkcount where flat_no='$user_flat'";
$result1 = $conn->query($sql2);
if($result1 == TRUE)
{
    
    header('Location:view.php');

}
else{
    echo "Error:" .$sql."<br>".$conn->error;
     }
$sql = "delete from residents  where flatno='$user_flat'";
$result2 = $conn->query($sql);
if($result2 == TRUE)
{
    echo "Record delete Successfully";
    header('Location:view.php');

}
else{
    echo "Error:" .$sql."<br>".$conn->error;
     }

         }
              ?>
