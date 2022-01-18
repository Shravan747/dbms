
       <?php
include "config.php";

if(isset($_POST['submit']))
{
    $flatno = $_POST['flatno'];
    $ownername = $_POST['ownername'];
    $phoneno = $_POST['phoneno'];
    $tenantname = $_POST['tenantname'];
    $tphoneno = $_POST['tphoneno'];
    $members = $_POST['members'];
    $bhkcount = $_POST['bhkcount'];
    $maintainance = $_POST['maintainance'];

    $result = mysqli_query($conn, "UPDATE `residents` SET ownername='$ownername',phoneno='$phoneno',tenantname='$tenantname',tphoneno = '$tphoneno',members='$members' WHERE flatno='$flatno'");
    
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


$res = $conn->prepare("INSERT INTO `bhkcount` (`flat_no`, `bcount`, `Amount`) VALUES (?,?,?)");
$res->bind_param("iii",$flatno,$bhkcount,$maintainance);
$res->execute();
$res->close();
$conn->close();
header('Location:login.php');

// $result = $mysqli_query($conn,$sql) or die(mysqli_error());
// if($result)
// {
//     echo "Row insert";
// }
// else{
//     echo "not";
// }
}
?>