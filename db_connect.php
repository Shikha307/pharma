<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "pharma";
    $connect = new mysqli($hostname,$username,$password, $databaseName) or die("Unable to connect");
?>