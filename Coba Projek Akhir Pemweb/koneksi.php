<?php 
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbName = "nwind";

    $connect = new mysqli($hostname, $username, $password, $dbName);
    if($connect -> connect_error) {
        die("Connection Failed: ". $connect->connect_error);
    }
?>