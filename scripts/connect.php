<?php
$database_host = "dbhost.cs.man.ac.uk";
$database_user = "m59511md";
$database_pass = "LeqNGDvbT6VEyF";
$database_name = "m59511md";

try
{
    $conn = new PDO("mysql:host=$database_host;dbname=$database_name", $database_user, $database_pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to $database_host successfully.";

//    $conn->exec("
//    INSERT INTO forum (userID, title, description)
//    VALUES (1, 'wsadas', 'sadsadasa')
//    ");
//    echo "ADDED A VALUE";

}
catch (PDOException $pe)
{
    die("Could not connect to $database_host :" . $pe->getMessage());
}


$conn = null;