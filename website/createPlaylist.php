<?php 
session_start();
include "connect.php";

if (isset ($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTempName = $_FILES['file']['tmp_name'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileSize = $_FILES['file']['size'];

    $fileExt = explode('.', $fileName);
    $fileExtSplitted = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileExtSplitted, $allowed)) {
        if ($fileError === 0) {

            if ($fileSize < 20000000) {
                $newFileName = uniqid('', true) . "." . $fileExtSplitted;
                $fileDirection = 'uploads/images/' . $newFileName;
                move_uploaded_file($fileTempName, $fileDirection);

                $sql = 'INSERT INTO ownedplaylist (uid) VALUES (' . $_SESSION["uid"] . ')';
                $stmt = $conn->query($sql);

                $sql = 'SELECT * FROM ownedplaylist WHERE plid = (SELECT MAX (plid) FROM ownedplaylist WHERE uid = ' . $_SESSION["uid"] . ')';
                $stmt = $conn->query($sql);

                foreach ($stmt as $row) {
                    $plid = $row['plid'];
                }

                $sql = "INSERT INTO playlist (plid, title, description, cdate, cover) VALUES (" . $plid . ", :title, :description, CURRENT_DATE, '" . $fileDirection . "')";
                $prepared_sql = $conn->prepare($sql);
                $prepared_sql->bindParam( ':title', $title);
                $prepared_sql->bindParam( ':description', $description);
                $prepared_sql->execute();

                header("Location: home.php?myplaylists");

            } else {
                echo 'Your uploaded file is too big. The maximum allowed size is 20mb.';
            }

        } else {
            echo 'There was an unexpected error. Please try again later!';
        }
    } else {
        echo 'Files of this type are not allowed!';
    }

}

?>