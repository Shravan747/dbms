<?php
include "config.php";
if(isset($_GET['service_no'])){
    $ser_no = $_GET['service_no'];
    $sql1 = "delete from services where service_no='$ser_no'";
$result = $conn->query($sql1);
if($result == TRUE)
{
    
    header('Location:viewser.php');

}
else{
    echo "Error:" .$sql."<br>".$conn->error;
     }
    }
     

              ?>
