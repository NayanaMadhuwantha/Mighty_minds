<?php 

session_start();
include 'Database.include.php';
date_default_timezone_set("Asia/Colombo");


if (isset($_GET["range"])){
 $range=$_GET["range"];
}


$Database = new Database();
$conn = $Database->getConnection();

$sql="SELECT Mood, DatePosted FROM mood WHERE EmployeeID =".$_SESSION['userInfo']['ID']." ORDER BY DatePosted DESC LIMIT ".$range."";



$result=$conn->query($sql);

$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

print json_encode($data);

//header("Location: ../showmood.php");

