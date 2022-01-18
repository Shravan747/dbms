<?php
 include "config.php";

 $type = $_GET['con'];

$s = $_GET['ser'];

$sql = "SELECT * FROM ser_pay_history where service_no=$s order by $type";
$result = $conn->query($sql);

$sql_qry = "SELECT sum(amount) as total FROM ser_pay_history where service_no=$s order by $type";

$duration = $conn->query($sql_qry);
$record = $duration->fetch_array();
$total = $record['total'];
$sql_1 = "SELECT count(*) as total FROM ser_pay_history where service_no=$s order by $type";

$duration1 = $conn->query($sql_1);
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
                    <th>payment Id</th>
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
                        <tr>
                        <td> <?php echo $row['pay_id'];?></td>
                            <td><?php echo $row['amount'];?></td>
                            <td><?php echo $row['pdate'];?></td>
                        </tr>
                          
                   <?php
                    }
                }
                ?>
                <tr> <td>Total Amount</td>
                    <td><?php echo $total;?></td></tr>
                        </tr>
                        <tr><td>Number og Transactions on this service</td>
                    <td><?php echo $total1;?></td></tr>
                        </tr>
            </tbody>
        </table>
        <a href="sortser1date.php?con=pdate&ser=<?php echo $s;?>">Sort by Date</a>
        <a href="sortser1date.php?con=amount&ser=<?php echo $s;?>">Sort by Amount</a>
        <a href="tran.php">Back to Transaction Page</a>
    </div>
   
</body>
</html>
