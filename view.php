<?php
 include "config.php";
$sql = "select * from residents";
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
    <h1>Group by Blocks</h1>
    <form action="blockview.php" method="POST">
        
        <select name="block" class="form-select" >
      <option selected>Open this select menu</option>
      <option value="1">Block 1</option>
      <option value="2">Block 2</option>
      <option value="3">Block 3</option>
      <option value="4">Block 4</option>
     
    </select>
   
    <button type="submit" name="submit">submit</button>
        </form>
  
</body>
</html>
