<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <form action="register.php" method="POST">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>
        
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        
        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>
<?php
session_start();
include 'config.php'; // Include the database connection file

// Admin email for notification
$admin_email = "demmyjyd@gmail.com";
if (isset($_POST['register'])) {
    $username = htmlspecialchars($_POST['username']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Prepare SQL and bind parameters
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        // Send email notification to the admin
        $subject = "New User Registration";
        $message = "A new user has registered:\n\nUsername: $username\nEmail: $email";
        $headers = "From: noreply@example.com";
        mail($admin_email, $subject, $message, $headers);

        echo "Registration successful. An email has been sent to the admin.";
    } else {
        echo "Error: Could not register user.";
    }
}
?>