<?php
/**
 * Created by PhpStorm.
 * User: Nayana Madhuwantha
 * Date: 4/18/2021
 * Time: 12:35 AM
 */
session_start();
include 'Database.include.php';
date_default_timezone_set("Asia/Colombo");

$Database = new Database();
$conn = $Database->getConnection();

$id = $_GET['file_id'];

$sql = "SELECT * FROM articles WHERE ID=$id";
$result=$conn->query($sql);

if ($row=$result->fetch_assoc()) {
    $filepath = '../uploads/' . $row['Name'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $row['Name']));
        readfile('uploads/' . $row['Name']);
        exit;
    }
    else{
        header("Location: ../team.php?error=filenotfound");
    }

}
