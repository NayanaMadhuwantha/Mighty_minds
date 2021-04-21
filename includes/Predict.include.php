<?php
session_start();
include 'Database.include.php';
date_default_timezone_set("Asia/Colombo");

if (isset($_GET["range"]) && isset($_GET["empId"])){
    $range=$_GET["range"];

    $empId=$_GET["empId"];
    $_SESSION['empId']=$empId;
   }else{
    $range=3;
    $empId=1;
    $_SESSION['empId']=$empId;
   }

$tmp = shell_exec("python predict.py ".$_SESSION['empId']." ".$range."");

//$tmp = shell_exec("C:\\Users\\Nayana\\AppData\\Local\\Programs\\Python\\Python39\\python.exe C:\\xampp2\\htdocs\\Mighty_minds\\includes\\predict.py 1 8");
$res=str_replace( array( '[',']','\'',' '), '', $tmp);
$pieces = explode(",", $res);
$date = date("Y-m-d");

$data = array();
foreach ($pieces as $row) {
    $date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
    $data[] = array("Mood"=>$row,"DatePosted"=>$date);
}
$json= json_encode($data);
$json=str_replace( array( '\n',' '), '', $json);
print $json;