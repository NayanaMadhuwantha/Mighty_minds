<?php
/**
 * Created by PhpStorm.
 * User: Nayana Madhuwantha
 * Date: 4/13/2021
 * Time: 10:24 PM
 */

$tmp = shell_exec("C:\\Users\\Ashan\\AppData\\Local\\Programs\\Python\\Python39\\python.exe D:\\Xamp\\htdocs\\MightyMinds\\Mighty_minds\\includes\\predict.py 2 7");



$res=str_replace( array( '[', ']','\''), '', $tmp);



$pieces = explode(",", $res);


$date = date("Y-m-d");

 $data = array();
 foreach ($pieces as $row) {
    $data[] = array("Mood"=>$row,"DatePosted"=>$date);
    $date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
}
print json_encode($data);
