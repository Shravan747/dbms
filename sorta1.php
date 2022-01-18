<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
</head>
<body>
    <h1>Enter a Amount</h1>
    <form  method="POST">
        <input type="number"  name="amount">
        <button type="submit" name="submit">submit</button>
    </form>
    <?php  
     include "config.php";
     $am =1000;
 if(isset($_POST['submit'])){
    
    $am = $_POST['amount'];
    
}
$sql = "SELECT * FROM ser_pay_history where amount>$am";
$result = $conn->query($sql);
$sql1 = "SELECT * FROM ser_pay_history where amount<=$am";
$result1 = $conn->query($sql1);
$sql1 = "SELECT count(*) as total FROM ser_pay_history where amount>$am";

$duration = $conn->query($sql1);
$record = $duration->fetch_array();
$total = $record['total'];
$sql_1 = "SELECT count(*) as totals FROM ser_pay_history where amount<=$am";

$duration1 = $conn->query($sql_1);
$record1 = $duration1->fetch_array();
$total1 = $record1['totals'];
?>
<div class="conatiner">
        <h2>Payments with amount greater than <?php echo $am;?></h2>
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
                        <tr>
                        <td> <?php echo $row['pay_id'];?></td>
                        <td> <?php echo $row['service'];?></td>
                            <td><?php echo $row['amount'];?></td>
                            <td><?php echo $row['pdate'];?></td>
                        </tr>
                          
                   <?php
                    }
                }
                ?>
                <tr><td>Number of Transactions with amount greater than <?php echo $am;?></td>
                    <td><?php echo $total;?></td></tr>
                        </tr>
            </tbody>
        </table>
    </div>
    
    <div class="conatiner">
        <h2>Payments with amount Lesser than <?php echo $am;?></h2>
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
                
                if(isset($result1->num_rows) && $result1->num_rows >0)
                {
                    while($row= $result1->fetch_assoc())
                    {
                        ?>
                        <tr>
                        <td> <?php echo $row['pay_id'];?></td>
                        <td> <?php echo $row['service'];?></td>
                            <td><?php echo $row['amount'];?></td>
                            <td><?php echo $row['pdate'];?></td>
                        </tr>
                          
                   <?php
                    }
                }
                ?>
                <tr><td>Number of Transactions with amount greater than <?php echo $am;?></td>
                    <td><?php echo $total1;?></td></tr>
                        </tr>
            </tbody>
        </table>
    </div>
    <a href="sorta2.php?con=pdate&amount=<?php echo $am;?>">Sort by Date</a>
        <a href="sorta2.php?con=amount&amount=<?php echo $am;?>">Sort by Amount</a>
        <a href="sorta2.php?con=service&amount=<?php echo $am;?>">Sort by Service</a>
        <a href="tran.php">Back to Transaction Page</a>
</body>
</html>
