<?php
include "config.php";
if(isset($_POST['submit']))
{
    $block = $_POST['block'];
   
    switch ($block) {
        case 1:
            
    $sql = "select * from residents where flatno regexp '^1'";
    $result = $conn->query($sql);
            break;
        case 2 :
             
    $sql = "select * from residents where flatno regexp '^2'";
    $result = $conn->query($sql);
            break;
        case 3:
            
    $sql = "select * from residents where flatno regexp '^3'";
    $result = $conn->query($sql);
            break;
        case 4:
                
    $sql = "select * from residents where flatno regexp '^4'";
    $result = $conn->query($sql);
                break;
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
                    <th>Tenant Name</th>
                    <th>Members</th>
                    
                    <th>Actions</th>
                    
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
                            <td><?php echo $row['flatno'];?></td>
                            <td><?php echo $row['ownername'];?></td>
                            <td><?php echo $row['phoneno'];?></td>
                            <td><?php echo $row['tenantname'];?></td>
                            <td><?php echo $row['tphoneno'];?></td>
                           

                            <td><?php echo $row['members'];?></td>
                            <td><a class="btn btn-info" href="update.php?updateno=<?php echo $row['flatno'];?>">
                        Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?flatno=<?php echo $row['flatno'];?>">Delete</a>
                        &nbsp;<a class="btn btn-danger" href="maintaincheck.php?flatno=<?php echo $row['flatno'];?>">Maintainance</a></td>
                        </tr>
                   <?php }
                }
                ?>
            </tbody>
        </table>
    </div>
 
  
</body>
</html>
