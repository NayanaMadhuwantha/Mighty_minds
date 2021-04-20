<?php
session_start();
include 'Database.include.php';
date_default_timezone_set("Asia/Colombo");
$username=$_POST['username'];
$password=$_POST['password'];
//$encriptedPassword=md5($password);

$Database = new Database();
$conn = $Database->getConnection();


$sql="SELECT * FROM employee WHERE `Name`='".$username."' AND Password='".$password."'";
$result=$conn->query($sql);

if(!$row=$result->fetch_assoc()){
    header("Location: ../index.php?error=incorrectUsernameOrPassword");
}else{
    $_SESSION['username']=$row['Name'];
    $_SESSION['userInfo']=$row;
    header("Location: ../setmood.php");
}
