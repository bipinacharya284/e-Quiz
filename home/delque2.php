<?php
require_once("../connect.php");
session_start();
$queno = $_SESSION['quenorpd'];
$sql = "DELETE FROM rapidfire WHERE Set_no=$queno";

if (mysqli_query($conn, $sql)) {
    header ("location: home.php#testimonials-section");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

?>