


<?php
require_once("config.php");
// $ownername="";
// $phoneno="";
// $tenantname="";
// $members="";
// $password="";

    $ser_no = $_GET['service_no'];

$result  = mysqli_query($conn,"select * from services where service_no=$ser_no");
$row=$result->fetch_assoc();
$service = $row['service'];
$service_contact = $row['service_contact'];
    $amount = $row['amount'];
  
    if(isset($_POST['submit']))
    {
        $service = $_POST['service'];
        $service_contact1 = $_POST['service_contact'];
        $amount = $_POST['amount'];
        
      
        $result = mysqli_query($conn, "UPDATE `services` SET service='$service',service_contact='$service_contact1',amount='$amount' WHERE service_no='$ser_no'");
    
    if($result)
    {
        header('Location:viewser.php');
    }
    else{
        echo "Error".$sql."<br>".$conn->error;
    }
  
    
    }
?>
<!DOCTYPE html>
<html>
    <body>
    <form action="" method="POST">
<!-- <label>Flat number:</label><input type="text" name="flatno"><br> -->
        <label>Service:</label><input type="text" name="service" value=<?php echo $service; ?>><br>
        <label>Service Contact Info:</label><input type="text" name="service_contact" value=<?php echo $service_contact; ?>><br>
        <label>Amount:</label><input type="text" name="amount" value=<?php echo $amount; ?>><br>

       <button type="submit" name="submit">Submit</button>
    </form>
    </body>
</html>




