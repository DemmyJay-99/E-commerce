<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "new_web_class_db";

$conn = new mysqli($host,$user,$password,$dbname);

if ($conn->connect_error) {
    die("Connection_failed: " . $conn->connect_error);
}
?>