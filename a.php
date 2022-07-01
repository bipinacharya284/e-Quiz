<?php
include("connect.php");
$sql=$result=$grpname=$rowcount=$gr=$sql1=$result1=$rowcount1=$sql2=$msg=$sql3=$rev=null;
$totala=$gra=$av=$rf=null;
//Retrive value from scrgeneral and store them in srcacc in General Round Section of Group A
$grpname="A";
$sql="SELECT Correct FROM scrgeneral Where Groupname='$grpname'";
if ($result=mysqli_query($conn2,$sql)){
  $rowcount=mysqli_num_rows($result);
  $gra=$rowcount;
  $sql1="SELECT Groupname FROM scracc Where Groupname='$grpname'";
if ($result1=mysqli_query($conn2,$sql1)){
  $rowcount1=mysqli_num_rows($result1);
  if($rowcount1==1){
$sql2 = "UPDATE scracc SET Gr='$gra'  WHERE Groupname='$grpname'";

if (mysqli_query($conn2, $sql2)) {
    $msg="Sucess";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}elseif($rowcount1==0){
$sql3 = "INSERT INTO scracc (Id,Groupname,Gr) VALUES ('','$grpname','$gra')";
if (mysqli_query($conn2, $sql3)) {
    $msg="Sucess";
} else {
    echo "Cannot Upload it";
}

  }

  }else{
  	echo 'Smth Went Wrong';
  }

  
  }

//Retrive value from scraudiovis and store them in srcacc in Audio Visual Round Section of Group A

$sql="SELECT Correct FROM scraudiovis Where Groupname='$grpname' AND Correct='1' ";
$rev="SELECT Incorrect FROM scraudiovis Where Groupname='$grpname' AND Incorrect='1' ";
if ($result=mysqli_query($conn2,$sql)){
	
  $rowcount=mysqli_num_rows($result);

if ($resul=mysqli_query($conn2,$rev)){
  $rowcoun=mysqli_num_rows($resul);
$ava=$rowcount*2-$rowcoun*0.5;
}
  $sql1="SELECT Groupname FROM scracc Where Groupname='$grpname'";
if ($result1=mysqli_query($conn2,$sql1)){
  $rowcount1=mysqli_num_rows($result1);
  if($rowcount1==1){
$sql2 = "UPDATE scracc SET Av='$ava' WHERE Groupname='$grpname'";

if (mysqli_query($conn2, $sql2)) {
    $msg="Sucess";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}elseif($rowcount1==0){
$sql3 = "INSERT INTO scracc (Id,Groupname,Av) VALUES ('','$grpname','$ava')";
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


//Retrive value from scrrapidfire and store them in srcacc in Rapidfire Section of Group A
$sql = "SELECT Correct,Incorrect FROM scrrapidfire WHERE Groupname='$grpname'";
$result = mysqli_query($conn2, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
$rowcounter= $row["Correct"];
$rowcouner= $row["Incorrect"];
$rfa=$rowcounter*2-$rowcouner;

$sql1="SELECT Groupname FROM scracc Where Groupname='$grpname'";
if ($result1=mysqli_query($conn2,$sql1)){
  $rowcount1=mysqli_num_rows($result1);
  if($rowcount1==1){
$sql2 = "UPDATE scracc SET Rf='$rfa'  WHERE Groupname='$grpname'";

if (mysqli_query($conn2, $sql2)) {
    $msg="Sucess";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}elseif($rowcount1==0){
$sql3 = "INSERT INTO scracc (Id,Groupname,Rf) VALUES ('','$grpname','$rfa')";
if (mysqli_query($conn2, $sql3)) {
    $msg="Sucess";
} else {
    echo "Cannot Upload it";
}

  }

    }
}
}else {
    echo "0 results";
}
$total=$gra+$ava+$rfa;
$sql1="SELECT Groupname FROM scracc Where Groupname='$grpname'";
if ($result1=mysqli_query($conn2,$sql1)){
  $rowcount1=mysqli_num_rows($result1);
  if($rowcount1==1){
$sql2 = "UPDATE scracc SET Total='$total'Where Groupname='$grpname'";
if (mysqli_query($conn2, $sql2)) {
    $msg="Sucess";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}elseif($rowcount1==0){
$sql3 = "INSERT INTO scracc (Id,Groupname,Total) VALUES ('','$grpname','$total')";
if (mysqli_query($conn2, $sql3)) {
    $msg="Sucess";
    echo 'Total Score is '.$total;
} else {
    echo "Cannot Upload it";
}

  }

    }

    if($msg="Sucess"){

      echo "Updated Sucessfully <img src='items/tick.jpg' height='3%' width='2%'>";
    }
header("location:b.php");
exit;
?>