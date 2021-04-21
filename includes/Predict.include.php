<?php
session_start();
include 'Database.include.php';
date_default_timezone_set("Asia/Colombo");

if (isset($_GET["range"])){
    $range=$_GET["range"];
}
$tmp = shell_exec("python predict.py ".$_SESSION['userInfo']['ID']." ".$range."");

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