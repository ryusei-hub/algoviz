<?php
    $database_host = "dbhost.cs.man.ac.uk";
    $database_user = "m59511md";
    $database_pass = "LeqNGDvbT6VEyF";
    $database_name = "m59511md";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$conn->close();
?>