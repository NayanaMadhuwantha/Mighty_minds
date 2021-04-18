<?php
/**
 * Created by PhpStorm.
 * User: Nayana Madhuwantha
 * Date: 4/16/2021
 * Time: 12:05 AM
 */

session_start();
include 'Database.include.php';
date_default_timezone_set("Asia/Colombo");

$Database = new Database();
$conn = $Database->getConnection();

$filename = $_FILES['file']['name'];
$articleName = $_POST['articleName'];

$destination = '../uploads/' . $filename;
$extension = pathinfo($filename, PATHINFO_EXTENSION);

$file = $_FILES['file']['tmp_name'];
$size = $_FILES['file']['size'];

if ($_FILES['myfile']['size'] > 1000000) {
    header("Location: ../team.php?error=largefile");
} else {
    if (move_uploaded_file($file, $destination)) {
        $sql = "INSERT INTO articles (`Name`,ArticleName, `Size`) VALUES ('$filename','$articleName', $size)";
        var_dump($sql);
        if ($conn->query($sql)) {
            header("Location: ../team.php?s=success");
        }
    } else {
        header("Location: ../team.php?error=faild");
    }
}