<?php
include "config.php";
if(isset($_GET['service_no'])){
    $ser_no = $_GET['service_no'];
//     $sql1 = "delete from services where service_no='$ser_no'";
// $result = $conn->query($sql1);
// if($result == TRUE)
// {
    
//     header('Location:viewser.php');

// }
// else{
//     echo "Error:" .$sql."<br>".$conn->error;
//      }
    }
    if(isset($_POST['submit'])){
    
        $date = $_POST['date'];
        
    }
    $sql = "SELECT * FROM services where service_no=$ser_no";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $amount = $row["amount"];  
    $service = $row["service"];  }
  }
  $stmt = $conn->prepare("INSERT INTO `ser_pay_history`(`service_no`,`service`, `amount`, `pdate`) VALUES (?,?,?,?)");
  $stmt->bind_param("isis",$ser_no,$service,$amount,$date);
  $stmt->execute();
  $stmt->close();



  $result1 = mysqli_query($conn,"UPDATE `bank_details` SET Balance=Balance-$amount where Account_no=462792565");
  if($result1)
  {
      header("Location: tran.php"); 
  }
  else{
      echo "Error".$sql."<br>".$conn->error;
  }
  $conn->close();

        ?>
     

            