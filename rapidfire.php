<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
// Include config file
require_once "connect.php";

// Define variables and initialize with empty values
$username = $question = "";
$username_err = "";
$_SESSION['tblname']="rapidfire";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter Set Number.";
    } else{
        $_SESSION['queno']=$username = trim($_POST["username"]);
    }

    // Validate credentials
    if(empty($username_err)){
        // Prepare a select statement
        $sql = "SELECT * FROM rapidfire WHERE Set_no = $username";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) >0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo '<table border=2 width="30%">';
       $question= $row["Question"];
       $set_no= $row["Set_no"];
echo '<tr><td></td><td>'.$question.'</td></tr>';
echo '</table>';
header("Refresh: 120 ;url='delque3.php'");
    }
} else {
    echo "No result Found";
}


    // Close connection
    mysqli_close($conn2);
}
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rapid Fire</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
            body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
        .form-control{
          width:60px;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
    <div class="wrapper">
        <h2>Rapid Fire Question Pannel</h2>
        <p>Please fill in the credentials to get question.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Enter Set Number</label>
                <input type="text" name="username" class="form-control" min="1" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Verify Question">
            </div>
        </form>
        <a href="home.php"><input type="submit" class="btn btn-primary" value="Back"></a>
    </div>   
      </div>
    </div>
  </div>
</div>
</body>
</html>