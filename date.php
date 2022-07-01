<?php
require_once("connect.php");
$sql = "SELECT Reg_date FROM tempologin";
$result = mysqli_query($conn2, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $date2= $row["Reg_date"];

        $date= date("Y-m-d");

        if($date2==$date){
        	echo 'You can login';
        }else{

$sql = "DELETE FROM tempologin WHERE Reg_date='$date2'";

if (mysqli_query($conn2, $sql)) {
  
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

        }
    }
} else {
}


        ?>