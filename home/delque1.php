<?php
require_once("../connect.php");
session_start();
$queno = $_SESSION['quenoaud'];
$sql = "DELETE FROM audiovisual WHERE Question_no=$queno";

if (mysqli_query($conn, $sql)) {
    header ("location: home.php#process-section");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
$_SESSION['quenoaud']=$_SESSION['audqn']=$_SESSION['audans']="";
?>