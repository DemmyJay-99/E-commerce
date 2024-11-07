<?php
session_start();
include 'config.php'; // Include the database connection file

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Determine if the input is an email or username
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // It's an email
        $query = "SELECT * FROM users WHERE email = ?";}
    // } else {
    //     // It's a username
    //     $query = "SELECT * FROM users WHERE username = ?";
    // }

    // Prepare the statement
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind the parameter and execute
    $stmt->bind_param('s', $email);
    $stmt->execute();
    
    // Get the result and fetch the user
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Check if the user exists and the password matches
    if ($user && password_verify($password, $user['password'])) {
        // Login successful, set session variables
        $_SESSION['user_logged_in'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['first_name']= $user['First_name'];
        $_SESSION['last_name']= $user['last_name'];

        // Update online status to 1 (online)
        $updateStatus = $conn->prepare("UPDATE users SET online_status = 1 WHERE id = ?");
        $updateStatus->bind_param("i", $user['id']);
        $updateStatus->execute();

        header("Location: my_profile.php"); // Redirect to user dashboard
        exit();
    } else {
        // Login failed
        echo "Invalid username/email or password.";
    }

    // Close the statement
    $stmt->close();
    if (isset($updateStatus)) {
        $updateStatus->close();
    }
}

// Close the database connection
$conn->close();
?>