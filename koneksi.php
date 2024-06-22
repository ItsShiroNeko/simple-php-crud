<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "manage_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("conn Error: " . $conn->connect_error);
}
?>
