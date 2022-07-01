<?php
require_once("../connect.php");
session_start();
$queno = $_SESSION['quenofnl'];
$sql = "DELETE FROM final WHERE Question_no=$queno";
if (mysqli_query($conn, $sql)) {
    header ("location: home.php#services-section");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

?>