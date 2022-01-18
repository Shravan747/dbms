<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <h1>Residents Info</h1>
   
    <h1>View</h1>
    <a href="view.php">view</a>
    <h1>Services Info</h1>
    <h4> Create View Update Delete</h4>
    <a href="viewser.php">view</a>
    <h4>Check Maintainance Payment for a particular month</h4>
    
    <form action="checkmainmonth.php" method="POST">
        
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
   
    <button type="submit" name="submit">submit</button>
        </form>
        <h1>Bank Details</h1>
        <a href="bankpage.php">Bank</a>
</body>
</html>