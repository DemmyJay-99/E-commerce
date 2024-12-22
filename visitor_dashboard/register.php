<?php
include 'config.php';

function validatePassword($password) {
    return preg_match('@[A-Z]@', $password) && preg_match('@[a-z]@', $password) && 
           preg_match('@[0-9]@', $password) && preg_match('@[^\w]@', $password) && 
           strlen($password) >= 12;
}
function sendEmailNotification($adminEmail, $firstName, $email) {
    $subject = "New User Registration";
    $message = "A new user has registered:\n\nUsername: $firstName\nEmail: $email";
    $headers = "From: noreply@example.com";
    mail($adminEmail, $subject, $message, $headers);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
    $lastName = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $delivery_address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    if (!validatePassword($password)) {
        echo "Password does not meet the required strength.";
    } else {
        $passwordHashed = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password,delivery_address) VALUES (?, ?, ?, ?,?)");
        $stmt->bind_param('sssss', $firstName, $lastName, $email, $passwordHashed,$delivery_address);

        if ($stmt->execute()) {
            sendEmailNotification("demmyjyd@gmail.com", $firstName, $email);
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }
        if (!stmt) {
          die("Error preparing statement:" . $conn->error);
        }
        $stmt->close();
    }
    $conn->close();
}
?>