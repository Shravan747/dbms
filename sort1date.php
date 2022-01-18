
<?php
 include "config.php";

 $type = $_GET['con'];  
 $from = $_GET['dates'];    
 $to = $_GET['datee'];   
if($type == "pdate" || $type == "amount")
{
$sql = "select * from ser_pay_history where pdate between '$from' and 
'$to' order by $type ";
$result = $conn->query($sql);
}
elseif($type == "service")
{
 $sql = "select * from ser_pay_history where pdate between '$from' and '$to' order by $type";
$result = $conn->query($sql);
}
 $sql_qry = "SELECT sum(amount) as total FROM ser_pay_history where pdate between '$from' and 
 '$to' ";

 $duration = $conn->query($sql_qry);
 $record = $duration->fetch_array();
 $total = $record['total'];

 $sql_qry1 = "SELECT count(*) as total FROM ser_pay_history where pdate between '$from' and 
 '$to' ";

 $duration1 = $conn->query($sql_qry1);
 $record1 = $duration1->fetch_array();
 $total1 = $record1['total'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            View Page
        </title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
</head>
<body>
    
    <div class="conatiner">
        <h2>Services</h2>
        <table class="table">
            <head>
                <tr>
                    <th>Payment id</th>
                    <th>Service</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </head>
            <tbody>
                <?php

                if(isset($result->num_rows) && $result->num_rows >0)
                {
                    while($row= $result->fetch_assoc())
                    {
                        ?>
                        <tr><td> <?php echo $row['pay_id'];?></td>
                        <td> <?php echo $row['service'];?></td>
                            <td><?php echo $row['amount'];?></td>
                            <td><?php echo $row['pdate'];?></td>
                        </tr>
                          
                   <?php
                    }
                }
                
                ?>
                  <tr> <td>Total Expenditure between <?php echo $from;?> and <?php echo $to;?></td>
                  <td></td>
                    <td><?php echo $total;?></td></tr>
                        </tr>
                        <tr> <td>Number Expenditure between <?php echo $from;?> and <?php echo $to;?></td>
                  <td></td>
                    <td><?php echo $total1;?></td></tr>
                        </tr>

            </tbody>
        </table>
        <a href="sort1date.php?con=pdate&dates=<?php echo $from;?>&datee=<?php echo $to;?>">Sort by Date</a>
        <a href="sort1date.php?con=amount&dates=<?php echo $from;?>&datee=<?php echo $to;?>">Sort by Amount</a>
        <a href="sort1date.php?con=service&dates=<?php echo $from;?>&datee=<?php echo $to;?>">Sort by Service</a>
        <a href="tran.php">Back to Transaction Page</a>
    </div>
   
</body>
</html>
