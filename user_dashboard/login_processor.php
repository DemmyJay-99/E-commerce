<?php
session_start();
include 'config.php'; // Adjust the path as necessary

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email_id = $_POST['email_id'];
    $password = md5($_POST['password_1']); // Assuming passwords are stored as MD5 hashes

    $sql = "SELECT id FROM register_table WHERE email_id='$email_id' AND password_1='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['email_id'] = $email_id;

        // Store the session in the database
        $session_id = session_id();
        $stmt = $conn->prepare("INSERT INTO sessions (email_id, session_id) VALUES (?, ?)");
        $stmt->bind_param("ss", $email_id, $session_id);
        $stmt->execute();

        // Redirect to user dashboard or any other page
        header("Location: my_profile.php");
    } else {
        echo "Invalid username or password!";
    }
}
?>
