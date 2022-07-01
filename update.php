<?php
require_once("connect.php");
session_start();
$tablename='general';
// sql to delete a record
$sql = "DELETE FROM $tablename WHERE Question_no=$quesno";

if (mysqli_query($conn, $sql)) {
    header("location: home1.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Update Pannel</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Enter Question Number</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Get Question">
            </div>
        </form>
    </div>    
</body>
</html>