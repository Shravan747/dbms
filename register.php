<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$flatno = $password = $confirm_password = "";
$flatno_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate flatno
    if(empty(trim($_POST["flatno"]))){
        $flatno_err = "Please enter a flatno.";
    } elseif(!preg_match('/^[1-4][1-6]0[1-6]$/', trim($_POST["flatno"]))){
        $flatno_err = "***Please follow the number sequence***
        Block number should be your flar number's first digit,
        Flat number should be your flat number's next three digits
        *****************************************************************
        Example:1101,2104
        ";
    } else{
        // Prepare a select statement
        $sql = "SELECT * from residents  WHERE flatno = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_flatno);
            
            // Set parameters
            $param_flatno = trim($_POST["flatno"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $flatno_err = "This flatno is Registered.";
                } else{
                    $flatno = trim($_POST["flatno"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($flatno_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO residents (flatno, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_flatno, $param_password);
            
            // Set parameters
            $param_flatno = $flatno;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: form.php?flat_no=$flatno");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
       
        }
      
    }
    
 
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="stylesres.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
</head>
<body>  
    

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <!-- Icon -->
    <div class="fadeIn first">
      <img src="data:image/png;base64,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" id="icon" alt="User Icon" />
    </div>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Flatno</label>
                <input type="text" name="flatno" placeholder="Block no. Flat no." class="form-control <?php echo (!empty($flatno_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $flatno; ?>">
                <span class="invalid-feedback"><?php echo $flatno_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
            <a href="adminmain.php">Admin login</a>
        </form>
    </div> 
   

   

  </div>
</div>
</body>
</html>

