


<?php
require_once("config.php");
// $ownername="";
// $phoneno="";
// $tenantname="";
// $members="";
// $password="";

    $user_flat = $_GET['updateno'];
    echo $user_flat;

$result  = mysqli_query($conn,"select * from  residents where flatno=$user_flat");
$row=$result->fetch_assoc();
$result1  = mysqli_query($conn,"select * from  bhkcount where flat_no=$user_flat");
$row1=$result1->fetch_assoc();
// $result= mysqli_query($conn,"SELECT *
// FROM residents
// FULL OUTER JOIN bhkcount ON residents.flatno=bhkcount.flat_no where flatno=$user_flat");
// echo $result;
// $row=$result->fetch_assoc();
// echo $row;
    // $flatno = $row['flatno'];
    $ownername = $row['ownername'];
    $phoneno = $row['phoneno'];
    $tenantname = $row['tenantname'];
    $tphoneno = $row['tphoneno'];
    $members = $row['members'];
    // $bhkcount = $row['bcount'];
    // $maintainance = $row['Amount'];
    $bhkcount = $row1['bcount'];
    $maintainance = $row1['Amount'];
    $password = $row['password'];
    if(isset($_POST['submit']))
    {
        // $flatno = $_POST['flatno'];
        $ownername = $_POST['ownername'];
        $phoneno = $_POST['phoneno'];
        $tenantname = $_POST['tenantname'];
        $tphoneno = $_POST['tphoneno'];
        $members = $_POST['members'];
        $bhkcount = $_POST['bhkcount'];
        $maintainance = $_POST['maintainance'];
        
      
        $result = mysqli_query($conn, "UPDATE `residents` SET ownername='$ownername',phoneno='$phoneno',tenantname='$tenantname',tphoneno = '$tphoneno',members='$members' WHERE flatno='$user_flat'");
    
        if($result)
        {
            // header('Location:login.php');
        }
        else{
            echo "Error".$sql."<br>".$conn->error;
           
        }
        $result = mysqli_query($conn, "delete from ex where exname in (select ownername from residents) ");
    
        if($result)
        {
            // header('Location:login.php');
        }
        else{
            echo "Error".$sql."<br>".$conn->error;
        }
        $result = mysqli_query($conn, "delete from ex where exname in (select tenantname from residents) ");
    
        if($result)
        {
            // header('Location:login.php');
        }
        else{
            echo "Error".$sql."<br>".$conn->error;
        }
    $result1 = mysqli_query($conn, "UPDATE `bhkcount` SET bcount='$bhkcount',Amount='$maintainance' WHERE flat_no='$user_flat'");
    
    if($result1)
    {
        header("Location: welcome.php?flatno=$user_flat");
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
        <label>Tenant Phone Number:</label><input type="text" name="tphoneno" value=<?php echo $tphoneno; ?>><br>
        <label>Members:</label><input type="text" name="members" value=<?php echo $members;?>><br>
        <label>BHK count:</label><input type="text" name="bhkcount" value=<?php echo $bhkcount;?>><br>
        <label>Maintainance:</label><input type="text" name="maintainance" value=<?php echo $maintainance;?>><br>
        
       <button type="submit" name="submit">Submit</button>
    </form>
    </body>
</html>




