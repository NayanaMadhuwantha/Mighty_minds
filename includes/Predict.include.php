<?php
/**
 * Created by PhpStorm.
 * User: Nayana Madhuwantha
 * Date: 4/13/2021
 * Time: 10:24 PM
 */
session_start();
include 'Database.include.php';
date_default_timezone_set("Asia/Colombo");


if (isset($_GET["range"])){
 $range=$_GET["range"];
}

$tmp = shell_exec("C:\\Users\\Ashan\\AppData\\Local\\Programs\\Python\\Python39\\python.exe D:\\Xamp\\htdocs\\MightyMinds\\Mighty_minds\\includes\\predict.py ".$_SESSION['userInfo']['ID']." ".$range."");



$res=str_replace( array( '[', ']','\''), '', $tmp);



$pieces = explode(",", $res);


$date = date("Y-m-d");

 $data = array();
 foreach ($pieces as $row) {
    $date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
    $data[] = array("Mood"=>$row,"DatePosted"=>$date);
   
}


$json= json_encode($data);
$json=str_replace( array( '\n'), '', $json);

print $json;