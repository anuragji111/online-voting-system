<?php
$servername = "localhost";
$username = "root"; // Use your MySQL username
$password = "";     // Use your MySQL password (leave empty if there isn't one)
$dbname = "online_voting_system"; // Make sure the database name matches the one you created

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
