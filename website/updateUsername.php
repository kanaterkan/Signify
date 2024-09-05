<?php
include "connect.php";

// Get the updated value from the form submission
$updatedUsername = $_POST['updatedUsername'];
$uid = $_POST['uid'];

// Prepare the SQL UPDATE statement
$stmt = $conn->prepare('UPDATE useracc SET username = :value WHERE uid = :uid');

// Bind the updated value and the ID of the row to update
$stmt->bindValue(':value', $updatedUsername);
$stmt->bindValue(':uid', $uid);

// Execute the UPDATE statement
$stmt->execute();

// Redirect the user back to the previous page
header('Location: acp.php');
?>