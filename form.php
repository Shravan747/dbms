<?php
require_once("config.php");
$user_flat = $_GET['flat_no'];
    echo $user_flat;
    ?>


<!DOCTYPE html>
<html><body>
<h2>ADD form</h2>
<form action="create.php" method="POST">
<label>Flat number:</label><input type="text" name="flatno" value="<?php echo $user_flat;?>"><br>
        <label>Owner Name:</label><input type="text" name="ownername"><br>
        <label>Phone Number:</label><input type="text" name="phoneno"><br>
        <label>Tenant Name:</label><input type="text" name="tenantname"><br>
        <label>Tenant Phone Number:</label><input type="text" name="tphoneno"><br>
        <label>Members:</label><input type="text" name="members"><br>
        <label>Bhk count:</label><input type="text" name="bhkcount"><br>
        <label>Maintainance:</label><input type="text" name="maintainance"><br>
       <button type="submit" name="submit">Submit</button>
    </form>
</body></html>
