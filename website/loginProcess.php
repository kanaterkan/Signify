<?php
	session_start();
?>

<!DOCTYPE html>
<html>
    <?php

    include 'connect.php';

    if (isset($_POST['submitLogin'])) {
        $email = $_POST['Email'];
    
        $stmt = $conn->prepare('SELECT * FROM useracc WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $hashedPw = "";

        foreach ($stmt as $row) {
            $hashedPw = $row['pw'];
            $pw = $_POST['Password'];
            if(password_verify($pw, $hashedPw)) {
                $_SESSION["uid"] = $row['uid'];
                $_SESSION["username"] = $row['username'];
                $_SESSION["acctype"] = $row['acctype'];
                header("Location: home.php?myplaylists");
                exit();
            } else {
                header("Location: login.php?incorrect");
            }
        }

        header("Location: login.php?incorrect");
        

    }


    ?>

</html>
