<?php
session_start();  
include 'config.php';
// Fetch users, calculating online status dynamically
$query = "SELECT first_name, email,last_name,
                 IF(online_status = 1 AND TIMESTAMPDIFF(MINUTE, last_activity, NOW()) <= ?, 1, 0) AS online_status 
          FROM users 
          ORDER BY online_status DESC, first_name ASC";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $onlineThreshold);
$onlineThreshold = 5; // e.g., 5 minutes
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Registered Users</h2>
    <table border="1">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
        <?php while ($user = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['first_name']) . " " . htmlspecialchars($user['last_name']); ?></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
            <td><?php echo $user['online_status'] ? 'Online' : 'Offline'; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>

<?php
// Free result and close the connection
$result->free();
$conn->close();
?>