<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection
    include 'config.php';
    // Get form data
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Hash the password before storing
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert the new user into the database
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashed_password', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>