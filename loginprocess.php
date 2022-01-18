<?php
  include 'config.php';
session_start();
if(isset($_POST['save']))
{
    extract($_POST);
    if(password_verify($pass, $hashed_password)) {
    
    $sql=mysqli_query($conn,"SELECT * FROM residents where flatno='$flatno' and password='$pass'");
    $row = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["flatno"] = $row['flatno'];
        $_SESSION["ownername"]=$row['ownername'];
        $_SESSION["tenantname"]=$row['tenantname'];
        $_SESSION["phoneno"]=$row['phoneno']; 
        header("Location: display.php?flatno=$flatno"); 
    }
    else
    {
        echo "Invalid Email ID/Password";
    }
}
}
?>