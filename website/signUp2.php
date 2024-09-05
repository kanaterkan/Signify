<?php

include "connect.php";

$email=$_POST['Email'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$username=$_POST['username'];
$password=$_POST['password'];
$acctype = $_POST['abo'];
$gender = 'm';
$birthdate = $_POST['birthdate'];
$uage = 0;
$ppicture = "uploads/images/test.png";


$sql='INSERT INTO useracc(username, cdate, email, pw, fname, lname, gender, acctype, birthdate, uage, ppicture)
VALUES (:username, CURRENT_DATE, :email, :pw, :fname, :lname, :gender, :acctype, :birthdate, :uage, :ppicture)';

$stmt=$conn-> prepare($sql);

$pw = password_hash($password, PASSWORD_BCRYPT);

$stmt->bindParam(':username', $username);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':pw', $pw);
$stmt->bindParam(':fname', $firstname);
$stmt->bindParam(':lname', $lastname);
$stmt->bindParam(':gender', $gender);
$stmt->bindParam(':acctype', $acctype);
$stmt->bindParam(':birthdate', $birthdate);
$stmt->bindParam(':uage', $uage);
$stmt->bindParam(':ppicture', $ppicture);
$stmt->execute();
header("location: home.php");
?>