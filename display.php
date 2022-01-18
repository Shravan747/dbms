
  
    <?php
require_once("config.php");
if(isset($_POST['submit']))
{
     $flatno = $_POST['flatno'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
<h1>Information Updatation</h1>
<a  href="updatebyres.php?updateno=<?php echo $flatno ?>">Edit</a>
<h1>Make Maintainance Payment</h1>
<a href="makemainpay.php?flatno=<?php echo $flatno ?>">Here</a>
<a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
</body>
</html>
