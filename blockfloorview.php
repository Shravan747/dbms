<?php
 include "config.php";
 $block =1;
 $sql = "select * from residents
 where flatno REGXEP '1[0-9][0-9][0-9]";
$result = $conn->query($sql);
if(isset($result->num_rows) && $result->num_rows >0)
{
    while($row= $result->fetch_assoc())
    {
        
             echo $row['flatno'];
             echo $row['ownername'];
             echo $row['phoneno'];
             echo $row['tenantname'];
           

             echo $row['members'];
    }
}
?>