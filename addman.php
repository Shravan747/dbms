<?php
include "config.php";
if(isset($_POST['submit']))
{
    $user_flat = $_POST['flatno'];
    $month = $_POST['month'];  
  }

  $result = mysqli_query($conn, "UPDATE `main_pay` SET $month='1' where flatno=$user_flat");
     
  if($result)
  {
    //   header("Location:makemainpay.php?flatno=$user_flat");
  }
  else{
      echo "Error".$sql."<br>".$conn->error;
  }
$sql="SELECT * FROM `bhkcount` WHERE `flat_no`=$user_flat";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$val= $row['Amount'];
if($sql)
{
    // header("Location:makemainpay.php?flatno=$user_flat");
}
else{
    echo "Error".$sql."<br>".$conn->error;
}



  $result1 = mysqli_query($conn,"UPDATE `bank_details` SET Balance=Balance+$val where Account_no=462792565");
  if($result1)
  {
      header("Location:makemainpay.php?flatno=$user_flat"); 
  }
  else{
      echo "Error".$sql."<br>".$conn->error;
  }
    
 


    ?>


