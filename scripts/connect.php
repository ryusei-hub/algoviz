<?php

function Connect()
{
    $database_host = "localhost";
    $database_user = "root";
    $database_pass = "LeqNGDvbT6VEyF";
    $database_name = "m59511md";

    try {
        $conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<script>console.log('working!')</script>";

        return $conn;

    } catch (PDOException $pe) {
        die("Could not connect to $database_host :" . $pe->getMessage());
    }
}