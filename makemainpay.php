
<?php
include "config.php";
if(isset($_GET['flatno']))
    $user_flat = $_GET['flatno'];
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1>Select Month</h1>
    <form action="addman.php" method="POST">
        
    <select name="month" class="form-select" >
  <option selected>Open this select menu</option>
  <option value="jan">Jan</option>
  <option value="feb">Feb</option>
  <option value="mar">March</option>
  <option value="apr">April</option>
  <option value="may">May</option>
  <option value="jun">June</option>
  <option value="july">July</option>
  <option value="aug">August</option>
  <option value="sep">September</option>
  <option value="oct">October</option>
  <option value="nov">November</option>
  <option value="decm">December</option>
</select>
<label>Flat number:</label><input type="text" name="flatno"  value=<?php echo $user_flat;?>><br>
<button type="submit" name="submit">submit</button>
    </form>
 
</body>
</html>
