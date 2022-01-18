<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$flatno = $password = "";
$flatno_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if flatno is empty
    if(empty(trim($_POST["flatno"]))){
        $flatno_err = "Please enter flat number.";
    } else{
        $flatno = trim($_POST["flatno"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($flatno_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT flatno, password FROM residents WHERE flatno = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_flatno);
            
            // Set parameters
            $param_flatno = $flatno;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if flatno exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $flatno, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["flatno"] = $flatno;                            
                            
                            // Redirect user to welcome page
                            header("Location: welcome.php?flatno=$flatno");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid flatno or password.";
                        }
                    }
                } else{
                    // flatno doesn't exist, display a generic error message
                    $login_err = "Invalid flatno or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
        



<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://i0.wp.com/scenetherapy.com/wp-content/uploads/2019/01/Monica%E2%80%99s-Apartment-from-Friends-Kitchen-design.jpg?w=1200&ssl=1" class="img-fluid"
          alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                     </div>

          <div class="divider d-flex align-items-center my-4">
            
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" name="flatno" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid Flat Number" <?php echo (!empty($flatno_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $flatno; ?>">
            <label class="form-label" for="form3Example3">Flat Number</label>
            <span class="invalid-feedback"><?php echo $flatno_err; ?></span>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" >
            <label class="form-label" for="form3Example4">Password</label>
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
          </div>

    

          <div class="text-center text-lg-start mt-4 pt-2">
            <input type="submit" value="login" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register.php"
                class="link-danger">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>

</section>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
</body>
</html>
    
