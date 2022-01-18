<?php
require_once("config.php");

$user_flat = $_GET['flatno'];
$result  = mysqli_query($conn,"select * from main_pay where flatno=$user_flat");
$row=$result->fetch_assoc();
$flatno = $row['flatno'];
$jan = $row['jan'];
$feb = $row['feb'];
$mar = $row['mar'];
$apr = $row['apr'];
$may = $row['may'];
$jun = $row['jun'];
$july = $row['july'];
$aug= $row['aug'];
$sep = $row['sep'];
$oct = $row['oct'];
$nov = $row['nov'];
$decm = $row['decm'];




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
        <h2>Resident <?php echo $user_flat?> Maintainance Payment  </h2>
        <table class="table">
            <head>
                <tr>
                    <th>Month</th>
                    <th>Paid/Not</th>
                    
                </tr>
            </head>
                        <tr>
                            <td><?php echo 'JANUARY'?></td>
                            <td><?php if($jan == '1') echo 'Paid';
                                      else
                                      echo 'Not';?></td>
                        </tr>
                        <tr>
                            <td><?php echo 'FEBRUARY'?></td>
                            <td><?php if($feb == '1') echo 'Paid';
                                      else
                                      echo 'Not';?></td>
                        </tr>
                        <tr>
                            <td><?php echo 'MARCH'?></td>
                            <td><?php if($mar == '1') echo 'Paid';
                                      else
                                      echo 'Not';?></td>
                        </tr>
                        <tr>
                            <td><?php echo 'APRIL'?></td>
                            <td><?php if($apr == '1') echo 'Paid';
                                      else
                                      echo 'Not';?></td>
                        </tr>
                        <tr>
                            <td><?php echo 'MAY'?></td>
                            <td><?php if($may == '1') echo 'Paid';
                                      else
                                      echo 'Not';?></td>
                        </tr>
                        <tr>
                            <td><?php echo 'JUNE'?></td>
                            <td><?php if($jun == '1') echo 'Paid';
                                      else
                                      echo 'Not';?></td>
                        </tr>
                        <tr>
                            <td><?php echo 'JULY'?></td>
                            <td><?php if($july == '1') echo 'Paid';
                                      else
                                      echo 'Not';?></td>
                        </tr>
                        <tr>
                            <td><?php echo 'AUGUST'?></td>
                            <td><?php if($aug == '1') echo 'Paid';
                                      else
                                      echo 'Not';?></td>
                        </tr>
                        <tr>
                            <td><?php echo 'SEPTEMBER'?></td>
                            <td><?php if($sep == '1') echo 'Paid';
                                      else
                                      echo 'Not';?></td>
                        </tr>
                        <tr>
                            <td><?php echo 'OCTOBER'?></td>
                            <td><?php if($oct == '1') echo 'Paid';
                                      else
                                      echo 'Not';?></td>
                        </tr>
                        <tr>
                            <td><?php echo 'NOVEMBER'?></td>
                            <td><?php if($nov == '1') echo 'Paid';
                                      else
                                      echo 'Not';?></td>
                        </tr>
                        <tr>
                            <td><?php echo 'DECEMBER'?></td>
                            <td><?php if($decm == '1') echo 'Paid';
                                      else
                                      echo 'Not';?></td>
                        </tr>
        </table>
    </div>
  
</body>
</html>
