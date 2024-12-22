<?php
include_once 'config.php';

if (isset($_POST['email'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<span>Email already registered</span>";
    } else {
        echo "<span >Email available</span>";
    }
}
$conn->close();
?>