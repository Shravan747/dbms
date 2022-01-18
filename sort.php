<?php
include "config.php";
if(isset($_POST['submit'])){
    
    $type = $_POST['type'];
    if($type == "service")
    {
        header('Location:sortser1.php');
    }
    elseif($type == "date")

    {
        header('Location:sortdate.php');
    }
    elseif($type == "amount")
    {
        header('Location:sorta1.php');
    }


   
}


?>