<?php
/**
 * Created by PhpStorm.
 * User: Nayana Madhuwantha
 * Date: 1/12/2019
 * Time: 9:45 PM
 */

class Database{
    public function getConnection(){

        return $connection = mysqli_connect('localhost','root','','mighty_minds');

        if (!$connection) {
            die("Connection Failed : " . mysqli_connect_error());
        }

        return $connection;
    }
}