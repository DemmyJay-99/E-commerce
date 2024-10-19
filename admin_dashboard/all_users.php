<?php
session_start();
include 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Query to get all logged-in users
$sql = "SELECT username, login_time FROM sessions";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Logged-in Users</title>
</head>
<body>
    <h1>Currently Logged-in Users</h1>
    <table border="1">
        <tr>
            <th>Email_id</th>
            <th>Login Time</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row['username'] . "</td><td>" . $row['login_time'] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No users are currently logged in.</td></tr>";
        }
        ?>
    </table>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
