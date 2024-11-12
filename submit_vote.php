<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Check if candidate_id is submitted
if (!empty($_POST['candidate_id'])) {
    $user_id = $_SESSION['user_id'];
    $candidate_id = $_POST['candidate_id'];

    // Insert vote and update user's voting status
    $stmt = $conn->prepare("INSERT INTO votes (user_id, candidate_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $candidate_id);

    if ($stmt->execute()) {
        $conn->query("UPDATE users SET has_voted=1 WHERE user_id='$user_id'");
        echo "Your vote has been recorded successfully!";
    } else {
        echo "Error: Could not record your vote. Please try again.";
    }

    $stmt->close();
} else {
    echo "Please select a candidate before submitting your vote.";
}

$conn->close();
?>
