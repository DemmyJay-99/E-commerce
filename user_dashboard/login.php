<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection
   include_once 'config.php';
    
    // Get form data
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    // Fetch user from database
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            echo "Login successful!";
            // Start session and redirect or set login state
            session_start();
            $_SESSION['username'] = $username;
            header("Location: about_page.php"); // Redirect to a logged-in page
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }

    $conn->close();
}
?>