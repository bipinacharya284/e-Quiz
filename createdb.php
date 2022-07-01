<?php
echo "Creating Database.....";
$servername="localhost";
$username="root";
$password="";
$dbname="equiz";

// creating connection
$conn = mysqli_connect($servername,$username,$password);

// check connection
if (!$conn){

	die ("Connection Failed");
}

//creating dastabase
$db="CREATE DATABASE $dbname";
if(mysqli_query($conn,$db)){
	echo "<br>Database Created Sucessfully <img src='items/tick.jpg' height='3%' width='2%'>";
}else{	
	echo ("<br>Cannot create database, database already exist or any other problems may arise <img src='items/cross.png' height='3%' width='2%'>");
}
// creating tables
$conn1 = mysqli_connect($servername,$username,$password,$dbname);

$table1 = "CREATE TABLE general(
Question_no INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Question TEXT(500) NOT NULL,
Answer Text(200) NOT NULL ,
Admin VARCHAR(50) NOT NULL,
Reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$table2 = "CREATE TABLE audiovisual(
Question_no INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Question TEXT(500) NOT NULL,
Question_target TEXT(500) NOT NULL,
Answer Text(200) NOT NULL ,
Admin VARCHAR(50) NOT NULL,
Reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$table3 = "CREATE TABLE rapidfire(
Question_no INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Set_no INT(6) NOT NULL,
Question TEXT(500) NOT NULL,
Answer Text(200) NOT NULL ,
Admin VARCHAR(50) NOT NULL,
Reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$table4 = "CREATE TABLE final(
Question_no INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Question TEXT(500) NOT NULL,
Answer Text(200) NOT NULL ,
Admin VARCHAR(50) NOT NULL,
Reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if(mysqli_query($conn1,$table1)){
echo "<br>Table: general Has been created <img src='items/tick.jpg' height='3%' width='2%'>";
 }else{
echo "<br>Error in creating the table: general <img src='items/cross.png' height='3%' width='2%'>";
 }
 if(mysqli_query($conn1,$table2)){
echo "<br>Table: audiovisual Has been created <img src='items/tick.jpg' height='3%' width='2%'>";
 }else{
echo "<br>Error in creating the table: audiovisual <img src='items/cross.png' height='3%' width='2%'>";
 }
 if(mysqli_query($conn1,$table3)){
echo "<br>Table: rapidfire Has been created <img src='items/tick.jpg' height='3%' width='2%'>";
 }else{
echo "<br>Error in creating the table: rapidfire <img src='items/cross.png' height='3%' width='2%'>";
 }
 if(mysqli_query($conn1,$table4)){
echo "<br>Table: final Has been created <img src='items/tick.jpg' height='3%' width='2%'>";
 }else{
echo "<br>Error in creating the table: final <img src='items/cross.png' height='3%' width='2%'>";
 }


 $db1="CREATE DATABASE logger";
 $dbase="logger";
if(mysqli_query($conn,$db1)){
	echo "<br>Database Created Sucessfully <img src='items/tick.jpg' height='3%' width='2%'>";
}else{	
	echo ("<br>Cannot create database, database already exist or any other problems may arise <img src='items/cross.png' height='3%' width='2%'>");
}
$conn10 = mysqli_connect($servername,$username,$password,$dbase);

$table10 = "CREATE TABLE permalogin(
Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Username VARCHAR(50) NOT NULL,
Password VARCHAR(50) NOT NULL,
Reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if(mysqli_query($conn10,$table10)){
echo "<br>Table: perlogin Has been created <img src='items/tick.jpg' height='3%' width='2%'>";
 }else{
echo "<br>Error in creating the table: perlogin <img src='items/cross.png' height='3%' width='2%'>";
 }

 $table11 = "CREATE TABLE scrgeneral(
Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Groupname VARCHAR(50) NOT NULL,
Correct INT(50) NOT NULL,
Reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if(mysqli_query($conn10,$table11)){
echo "<br>Table: scrgeneral Has been created <img src='items/tick.jpg' height='3%' width='2%'>";
 }else{
echo "<br>Error in creating the table: scrgeneral <img src='items/cross.png' height='3%' width='2%'>";
 }
 $table12 = "CREATE TABLE scraudiovis(
Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Groupname VARCHAR(50) NOT NULL,
Correct INT(50) NOT NULL,
Incorrect INT(50) NOT NULL,
Reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if(mysqli_query($conn10,$table12)){
echo "<br>Table: scraudiovis Has been created <img src='items/tick.jpg' height='3%' width='2%'>";
 }else{
echo "<br>Error in creating the table: scraudiovis <img src='items/cross.png' height='3%' width='2%'>";
 }

 $table13 = "CREATE TABLE scrrapidfire(
Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Groupname VARCHAR(50) NOT NULL,
Correct INT(50) NOT NULL,
Incorrect INT(50) NOT NULL,
Reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if(mysqli_query($conn10,$table13)){
echo "<br>Table: scrrapidfire Has been created <img src='items/tick.jpg' height='3%' width='2%'>";
 }else{
echo "<br>Error in creating the table: scrrapidfire <img src='items/cross.png' height='3%' width='2%'>";
 }
 $table14 = "CREATE TABLE scrfinal(
Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Groupname VARCHAR(50) NOT NULL,
Correct INT(50) NOT NULL,
Incorrect INT(50) NOT NULL,
Reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if(mysqli_query($conn10,$table14)){
echo "<br>Table: scrfinal Has been created <img src='items/tick.jpg' height='3%' width='2%'>";
 }else{
echo "<br>Error in creating the table: scrfinal <img src='items/cross.png' height='3%' width='2%'>";
 }
 $table15 = "CREATE TABLE scracc(
Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Groupname VARCHAR(50) NOT NULL,
Gr INT(50) NOT NULL,
Av DECIMAL(50) NOT NULL,
Rf DECIMAL(50) NOT NULL,
Total DECIMAL (50) NOT NULL,
Reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if(mysqli_query($conn10,$table15)){
echo "<br>Table: scracc Has been created <img src='items/tick.jpg' height='3%' width='2%'>";
 }else{
echo "<br>Error in creating the table: scracc <img src='items/cross.png' height='3%' width='2%'>";
 }

 $table16 = "CREATE TABLE scraccfinal(
Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Groupname VARCHAR(50) NOT NULL,
Total DECIMAL (50) NOT NULL,
Reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if(mysqli_query($conn10,$table16)){
echo "<br>Table: scraccfinal Has been created <img src='items/tick.jpg' height='3%' width='2%'>";
 }else{
echo "<br>Error in creating the table: scraccfinal <img src='items/cross.png' height='3%' width='2%'>";
 }
 $table17 = "CREATE TABLE tempologin(
Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Username VARCHAR(50) NOT NULL,
Password VARCHAR(50) NOT NULL,
Reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if(mysqli_query($conn10,$table17)){
echo "<br>Table: templogin Has been created <img src='items/tick.jpg' height='3%' width='2%'>";
 }else{
echo "<br>Error in creating the table: templogin <img src='items/cross.png' height='3%' width='2%'>";
 }
  $table18 = "CREATE TABLE mssg(
Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Firstname VARCHAR(50) NOT NULL,
Lastname VARCHAR(50) NOT NULL,
Subject VARCHAR(50) NOT NULL,
Email VARCHAR(50) NOT NULL,
Msg Text(5000) NOT NULL,
Rply Text(5000) NOT NULL,
Reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if(mysqli_query($conn10,$table18)){
echo "<br>Table: mssg Has been created <img src='items/tick.jpg' height='3%' width='2%'>";
 }else{
echo "<br>Error in creating the table: mssg <img src='items/cross.png' height='3%' width='2%'>";
 }
mysqli_close($conn10);
mysqli_close($conn1);
mysqli_close($conn);
?>