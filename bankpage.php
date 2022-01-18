
<?php
 include "config.php";

 $sql = "select * from bank_details";
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

                <?php
                if(isset($result->num_rows) && $result->num_rows >0)
                {
                    while($row= $result->fetch_assoc())
                    {
                        ?>
                                                <h1><?php echo $row['Account_no'];?></h1>
                        <h1><?php echo $row['Name'];?></h1>
                        <h1><?php echo $row['IFSCcode'];?></h1>
                        <h1><?php echo $row['Balance'];?></h1>
                   <?php }
                }
                ?>
        
  
</body>
</html>
