<?php
 include "config.php";
$sql = "select * from services";
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
        <h2>Services</h2>
        <table class="table">
            <head>
                <tr>
                    <th>Service no</th>
                    <th>Service</th>
                    <th>Service Contact Info</th>
                    <th>Amount</th>
                    <th>Actions</th>
                    <th>Service Payment</th>
                    
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
                            <td><?php echo $row['service_no'];?></td>
                            <td><?php echo $row['service'];?></td>
                            <td><?php echo $row['service_contact'];?></td>
                            <td><?php echo $row['amount'];?></td>
                            <td><a class="btn btn-info" href="updateser.php?service_no=<?php echo $row['service_no'];?>">
                        Edit</a>&nbsp;<a class="btn btn-danger" href="deleteser.php?service_no=<?php echo $row['service_no'];?>">Delete</a>
                       </td>
                       <td> 
                          
           <form action="servicepay.php?service_no=<?php echo $row['service_no'];?>" method="POST">
<input type="date" name="date">
          
          <button type="submit" name="submit">Pay</button>
          </form>
                   <?php }
                }
                ?>
            </tbody>
        </table>
    </div>
    <h1>Create</h1>
    <a href="createserform.php">Create</a>
    <h1>Taranscation History</h1>
    <a href="tran.php">Click</a>
</body>
</html>
