<?php
// Include config file
require_once "../connect.php";
error_reporting(0);
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$code=$code_err="";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT * FROM permalogin WHERE Username = ?";
        
        if($stmt = mysqli_prepare($conn2, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            $code = trim($_POST["code"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
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
    //e-Qui2ZoZo
    
 // Check input errors before inserting in database
if(empty($username_err) && empty($password_err) && $_POST['a']=="tempo" && empty($confirm_password_err) && $code=="e-Qui2ZoZo"){
        // Prepare an insert statement
        $sql = "INSERT INTO tempologin (Username, Password) VALUES (?, ?)";

        if($stmt = mysqli_prepare($conn2, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = $password; // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: ../index.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
    }elseif(empty($username_err) && $_POST['a']=="perma" && empty($password_err) && empty($confirm_password_err) && $code=="Sc!EncE&tEchN0fEstZoZo"){ //Sc!EncE&tEchN0fEstZ0Z0
        // Prepare an insert statement
        $sql = "INSERT INTO permalogin (Username, Password) VALUES (?, ?)";

        if($stmt = mysqli_prepare($conn2, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = $password; // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: ../index.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }


    
    // Close connection
    mysqli_close($conn2);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" id="name" placeholder="Username" required onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false" autocomplete=off />
                                <span>
                                    <p style="color:Tomato;"><?php echo $username_err; ?></p>
                        </span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="password" id="password" placeholder="Password" required onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false" autocomplete=off />
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                                <span>
                                    <p style="color:Tomato;"><?php echo $password_err; ?></p>
                        </span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="confirm_password" id="re_password" placeholder="Repeat your password" required onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false" autocomplete=off />
                            <span>
                            <p style="color:Tomato;"><?php echo $confirm_password_err; ?></p>
                        </span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="code" id="re_code" placeholder="Code" required/>
                        </div>
                        <div class="form-group" >
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="customRadio" name="a" value="perma">
                                <label class="custom-control-label" for="customRadio">Permanent User</label>
                                <input type="radio" class="custom-control-input" id="customRadio" name="a" value="tempo">
                                <label class="custom-control-label" for="customRadio1">Temporarory User</label>
                            </div> 
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required/>
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="../login/login.php" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>