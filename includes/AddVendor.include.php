<?php
/**
 * Created by PhpStorm.
 * User: Nayana Madhuwantha
 * Date: 4/8/2021
 * Time: 11:17 PM
 */
session_start();
include 'Database.include.php';
date_default_timezone_set("Asia/Colombo");

$name=$_POST['vendorName'];
$email=$_POST['email'];
$service=$_POST['service'];
$website=$_POST['website'];
$contact=$_POST['contact'];
$location=$_POST['location'];


$temp = explode(".", $_FILES["attachment"]["name"]);
$Attach = 'attachment'.round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["attachment"]["tmp_name"],"../uploads/" . $Attach);

$attachments='uploads/' . $Attach;


$Database = new Database();
$conn = $Database->getConnection();

$sql="INSERT INTO vendor(`Name`,Email,Service,WebsiteOrSocialMedia,ContactNumber,Location,Attachment) 
      VALUES('".$name."','".$email."','".$service."','".$website."','".$contact."','".$location."','".$attachments."')";



$result=$conn->query($sql);

if($result){
    header("Location: ../addvendors.php?error=VendorNotAdded");
}else{
    header("Location: ../addvendors.php");
}