<?php
error_reporting();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection
    include 'config.php';
    $admin_email = "demmyjyd@gmail.com";
    // Get form data
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $last_name = $conn->real_escape_string($_POST['last_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
// Check if the password meets the strength requirements
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 12) {
    echo "Password should be at least 12 characters in length, include at least one uppercase letter, one lowercase letter, one number, and one special character.";
} else {
    // Password is strong, now hash and store it
    $password_hashed = password_hash($password, PASSWORD_BCRYPT);

    // Insert user into database if username is unique
   
    // Prepare SQL and bind parameters
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?,?,?,?)");
    $stmt->bind_param('ssss', $first_name, $last_name, $email, $password_hashed);

    
    if ($stmt->execute()) {
        
        // Send email notification to the admin
        $subject = "New User Registration";
        $message = "A new user has registered:\n\nUsername: $first_name\nEmail: $email";
        $headers = "From: noreply@example.com";
        mail($admin_email, $subject, $message, $headers);
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt . "<br>" . $conn->error;
    }
}

$conn->close();
}
?>