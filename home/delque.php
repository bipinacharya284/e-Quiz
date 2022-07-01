<?php
require_once("../connect.php");
session_start();
$queno = $_SESSION['quenogen'];
$sql = "DELETE FROM general WHERE Question_no=$queno";

if (mysqli_query($conn, $sql)) {
    header ("location: home.php#work-section");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
$_SESSION['quenogen']=$_SESSION['genqn']=$_SESSION['genans']="";
?>