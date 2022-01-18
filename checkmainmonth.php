<?php
require_once "config.php";
 if(isset($_POST['submit'])){
    
    $month = $_POST['month'];
    echo $month;
 
    $sql = "select r.flatno,r.ownername,r.phoneno,b.amount from residents r,bhkcount b,main_pay m where r.flatno in (select flatno from main_pay where $month=0) and r.flatno= b.flat_no and r.flatno=m.flatno";
    $result1 = $conn->query($sql);
    if($result1 == TRUE)
    {
        
        // header('Location:view.php');
    
    }
    else{
        echo "Error:" .$sql."<br>".$conn->error;
         }   
}
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
        <h2>Residents</h2>
        <table class="table">
            <head>
                <tr>
                    <th>Flat no</th>
                    <th>Owner Name</th>
                    <th>Phone no</th>
                    <th>Maintainance Amount</th>
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
                            <td><?php echo $row['flatno'];?></td>
                            <td><?php echo $row['ownername'];?></td>
                            <td><?php echo $row['phoneno'];?></td>
                            <td><?php echo $row['amount'];?></td>
                            
                        </tr>
                   <?php }
                }
                ?>
            </tbody>
        </table>
    </div>
   
</body>
</html>
