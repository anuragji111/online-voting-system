<?php
include 'db.php';

$results = $conn->query("SELECT candidate_name, party, COUNT(votes.candidate_id) as vote_count 
                         FROM votes 
                         JOIN candidates ON votes.candidate_id = candidates.candidate_id 
                         GROUP BY candidate_id");

while ($row = $results->fetch_assoc()) {
    echo $row['candidate_name'] . " (" . $row['party'] . ") - Votes: " . $row['vote_count'] . "<br>";
}
$conn->close();
?>
