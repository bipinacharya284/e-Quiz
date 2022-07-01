<?php
require_once('../connect.php');
session_start();
if(isset($_POST['send'])){
$fname=$_POST['fst'];
$lname=$_POST['lst'];
$sub=$_POST['sub'];
$eml=$_POST['eml'];
$msg=$_POST['msg'];
$sql = "INSERT INTO mssg (Firstname, Lastname,Subject,Email,Msg)
VALUES ('$fname','$lname','$sub','$eml','$msg')";

if (mysqli_query($conn2, $sql)) {
    $_SESSION['msg'] = "Message send successfully";
    header("location: home.php#contact-section");
} else {
    $_SESSION['$msg1']= "Error in sending message";
    header("location: home.php#contact-section");
}

}else{
	header('location:../index.php');
}

?>