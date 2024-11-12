<?php
// Example of handling a "logged-in" session
session_start();

// Fetch the username from POST request (you can use sessions for persistent data)
$username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : 'Guest';

echo "<h1>Welcome, $username!</h1>";
echo "<p>This is your profile page.</p>";
echo "<a href='index.php'>Back to Login</a>";
?>
