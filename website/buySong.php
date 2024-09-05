<?php
// starts session
session_start();
// connects to database
include "connect.php";

// gets song id from url
$sid = $_POST['sid'];
// gets user id from session
$uid = $_SESSION['uid'];

// adds user id and song id to ownedsong
$sql = "INSERT INTO ownedsong (uid, sid) VALUES ($uid, $sid)";
$stmt = $conn->query($sql);

// HTTP REFERER puts you back on original site
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>

