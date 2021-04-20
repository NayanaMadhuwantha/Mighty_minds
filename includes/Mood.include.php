<?php
session_start();
include 'Database.include.php';
date_default_timezone_set("Asia/Colombo");
$mood=$_POST['mood'];
$employeeID=$_POST['employeeID'];
$date = date("Y/m/d");
$time = date("H:i:s");

$Database = new Database();
$conn = $Database->getConnection();

$sql="INSERT INTO mood(EmployeeID,Mood,DatePosted,TimePosted) VALUES('".$employeeID."','".$mood."','".$date."','".$time."')";
$result=$conn->query($sql);

if($result){
    header("Location: ../index.php?error=MoodNotAdded");
}else{
    header("Location: ../index.php");
}