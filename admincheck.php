
<?php
include "config.php";
if(isset($_POST['submit']))
{
    $password = $_POST['password'];
  
}

$result  = mysqli_query($conn,"select * from bank_details where Account_no=462792565");
$row=$result->fetch_assoc();
$password1 = $row['admin_password'];
if($password==$password1)
{
header('Location: adminmain.php');
}
else{
header('Location:adminlogin.php');
}


?>




   


