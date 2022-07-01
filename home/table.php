<?php
include_once('../connect.php');
$sql = "SELECT * FROM general ORDER BY rand()";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $ques_no=$row["Question_no"];
        $ques=$row["Question"];
        $sql2 = "UPDATE general SET Q_no='$ques_no' WHERE Question='$ques'";
    
    }
} else {
    echo "0 results";
}



?>