<?php
 include "config.php";

$sql = "select * from ser_pay_history";
$result = $conn->query($sql);


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
        <h2>Payments</h2>
        <table class="table">
            <head>
                <tr>
                    <th>Payment Id</th>
                    <th>Service Number</th>
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
                        <td><?php echo $row['pay_id'];?></td>
                            <td><?php echo $row['service_no'];?></td>
                            <td><?php echo $row['service'];?></td>
                            <td><?php echo $row['amount'];?></td>
                            <td><?php echo $row['pdate'];?></td>
                        </tr>
                   <?php }
                }
                ?>
            </tbody>
        </table>
       
        <h1>Group by </h1>
        <form action="sort.php" method="POST">
        <select name="type" class="form-select" >
        <option selected>Open this select menu</option>
<option value="date">Date</option>
<option value="service">Service</option>
<option value="amount">Amount</option>

</select>
<button type="submit" name="submit">submit</button>
        </form>
    </div>
 
</body>
</html>
