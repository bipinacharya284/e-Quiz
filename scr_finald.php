<?php
include("connect.php");

$sql=$result=$grpname=$rowcount=$gr=$sql1=$result1=$rowcount1=$sql2=$msg=$sql3=$rev=null;
$totala=$gra=$av=$rf=null;
//Retrive value from scrgeneral and store them in srcacc in General Round Section of Group A
$grpname="D";
$sql="SELECT Correct FROM scrfinal Where Groupname='$grpname' AND Correct='1' ";
$rev="SELECT Incorrect FROM scrfinal Where Groupname='$grpname' AND Incorrect='1' ";
if ($result=mysqli_query($conn2,$sql)){
    
  $rowcount=mysqli_num_rows($result);

if ($resul=mysqli_query($conn2,$rev)){
  $rowcoun=mysqli_num_rows($resul);
$total=$rowcount*2-$rowcoun*0.75;
}
  $sql1="SELECT Groupname FROM scraccfinal Where Groupname='$grpname'";
if ($result1=mysqli_query($conn2,$sql1)){
  $rowcount1=mysqli_num_rows($result1);
  if($rowcount1==1){
$sql2 = "UPDATE scraccfinal SET Total='$total' WHERE Groupname='$grpname'";

if (mysqli_query($conn2, $sql2)) {
    $msg="Sucess";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}elseif($rowcount1==0){
$sql3 = "INSERT INTO scraccfinal (Id,Groupname,Total) VALUES ('','$grpname','$total')";
if (mysqli_query($conn2, $sql3)) {
    $msg="Sucess";
} else {
    echo "Cannot Upload it";
}

  }//

  }else{
    echo 'Smth Went Wrong';
  }

  
  }
  header("location: scr_finale.php");
  exit;
?>
