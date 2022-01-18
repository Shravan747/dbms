<?php
include "config.php";
if(isset($_POST['submit']))
{
    $service = $_POST['service'];
    $service_contact = $_POST['service_contact'];
    $amount = $_POST['amount'];
     

$stmt = $conn->prepare(" INSERT INTO `services`(`service`,`service_contact`, `amount`) VALUES (?,?,?)");
$stmt->bind_param("sii",$service,$service_contact,$amount);
$stmt->execute();
$stmt->close();
$conn->close();
header('Location:viewser.php');
}
?>