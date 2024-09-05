<?php
include "connect.php";

// Get the updated value from the form submission
$updatedSongtitle = $_POST['updatedSongtitle'];
$sid = $_POST['sid'];

// Prepare the SQL UPDATE statement
$stmt = $conn->prepare('UPDATE song SET title = :value WHERE sid = :sid');

// Bind the updated value and the ID of the row to update
$stmt->bindValue(':value', $updatedSongtitle);
$stmt->bindValue(':sid', $sid);

// Execute the UPDATE statement
$stmt->execute();

// Redirect the user back to the previous page
header('Location: acp.php');
?>