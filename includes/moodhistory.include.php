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
   
   $Database = new Database();
   $conn = $Database->getConnection();
   
   $sql="SELECT Mood, DatePosted FROM mood WHERE EmployeeID =". $_SESSION['empId']." ORDER BY DatePosted DESC LIMIT ".$range."";
   
   


$Database = new Database();
$conn = $Database->getConnection();





$result=$conn->query($sql);

$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

print json_encode($data);

//header("Location: ../showmood.php");

