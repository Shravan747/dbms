


<?php
require_once("config.php");
// $ownername="";
// $phoneno="";
// $tenantname="";
// $members="";
// $password="";

    $user_flat = $_GET['updateno'];

$result  = mysqli_query($conn,"select * from  residents where flatno=$user_flat");
$row=$result->fetch_assoc();
    // $flatno = $row['flatno'];
    $ownername = $row['ownername'];
    $phoneno = $row['phoneno'];
    $tenantname = $row['tenantname'];
    $members = $row['members'];
  
    if(isset($_POST['submit']))
    {
        // $flatno = $_POST['flatno'];
        $ownername = $_POST['ownername'];
        $phoneno = $_POST['phoneno'];
        $tenantname = $_POST['tenantname'];
        $members = $_POST['members'];
        
      
        $result = mysqli_query($conn, "UPDATE `residents` SET ownername='$ownername',phoneno='$phoneno',tenantname='$tenantname',members='$members' WHERE flatno='$user_flat'");
    
    if($result)
    {
        header('Location:view.php');
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
        <label>Owner Name:</label><input type="text" name="ownername" value=<?php echo $ownername; ?>><br>
        <label>Phone Number:</label><input type="text" name="phoneno" value=<?php echo $phoneno; ?>><br>
        <label>Tenant Name:</label><input type="text" name="tenantname" value=<?php echo $tenantname; ?>><br>
        <label>Members:</label><input type="text" name="members" value=<?php echo $members;?>><br>
    
       <button type="submit" name="submit">Submit</button>
    </form>
    </body>
</html>




