<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user = $conn->query("SELECT * FROM users WHERE user_id='$user_id'")->fetch_assoc();

if ($user['has_voted']) {
    echo "You have already voted!";
    exit();
}

$candidates = $conn->query("SELECT * FROM candidates");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vote</title>
</head>
<body>
    <h1>Cast Your Vote</h1>
    <form action="submit_vote.php" method="POST">
        <?php while($candidate = $candidates->fetch_assoc()) { ?>
            <input type="radio" name="candidate_id" value="<?= $candidate['candidate_id']; ?>" required> 
            <?= $candidate['candidate_name']; ?> (<?= $candidate['party']; ?>) <br>
        <?php } ?>
        <button type="submit">Vote</button>
    </form>
</body>
</html>
