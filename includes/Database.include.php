<?php

class Database{
    public function getConnection(){

        return $connection = mysqli_connect('localhost','root','','mighty_minds');

        if (!$connection) {
            die("Connection Failed : " . mysqli_connect_error());
        }

        return $connection;
    }
}