<?php
session_start();
include 'Database.include.php';
date_default_timezone_set("Asia/Colombo");

$name=$_POST['name'];
$password=$_POST['password'];
$email=$_POST['email'];
$department=$_POST['department'];
$supervisor=$_POST['supervisor'];
$location=$_POST['location'];

$sql="INSERT INTO employee(`Name`,Password,Email,Department,Location,Supervisor) 
      VALUES('".$name."','".$password."','".$email."','".$department."','".$location."','".$supervisor."')";

$Database = new Database();
$conn = $Database->getConnection();

$result=$conn->query($sql);

if($result){
    header("Location: ../addemployee.php?error=EmployeeNotAdded");
}else{
    header("Location: ../addemployee.php");
}