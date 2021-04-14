<?php
/**
 * Created by PhpStorm.
 * User: Nayana Madhuwantha
 * Date: 4/8/2021
 * Time: 11:28 PM
 */
session_start();
include 'Database.include.php';
date_default_timezone_set("Asia/Colombo");

$name=$_POST['vendorName'];
$password=$_POST['password'];
$email=$_POST['email'];
$department=$_POST['department'];
$supervisor=$_POST['supervisor'];
$location=$_POST['location'];

$sql="INSERT INTO vendor(`Name`,Password,Email,Department,Location,Supervisor) 
      VALUES('".$name."','".$password."','".$email."','".$department."','".$location."','".$supervisor."')";

$result=$conn->query($sql);

if($result){
    header("Location: ../index.php?error=EmployeeNotAdded");
}else{
    header("Location: ../index.php");
}