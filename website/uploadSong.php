<?php 
session_start();
include "connect.php";

if (isset ($_POST['submit'])) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $genre = $_POST['genre'];
    $file = $_FILES['file'];

    $sql = "select arid from artist where uid =1";
    $stmt = $conn->query($sql);
    
    foreach ($stmt as $row) {
        $arid = $row['arid'];
    }

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

  
            

            } else {
                echo 'Your uploaded file is too big. The maximum allowed size is 20mb.';
            }

        } else {
            echo 'There was an unexpected error. Please try again later!';
        }
    } else {
        echo 'Files of this type are not allowed!';
    }


$song = $_FILES['song'];
$SongfileName = $_FILES['song']['name'];
$SongfileTempName = $_FILES['song']['tmp_name'];
$SongfileError = $_FILES['song']['error'];
$SongfileType = $_FILES['song']['type'];
$SongfileSize = $_FILES['song']['size'];


$SongfileExt = explode('.', $SongfileName);
$SongfileExtSplitted = strtolower(end($SongfileExt));

$allowed = array('mp3', 'wav');

if (in_array($SongfileExtSplitted, $allowed)) {
    if ($SongfileError === 0) {

        if ($SongfileSize < 20000000) {
            $newFileName = uniqid('', true) . "." . $SongfileExtSplitted;
            $SongfileDirection = 'uploads/songs/' . $newFileName;
            move_uploaded_file($SongfileTempName, $SongfileDirection);

        } else {
            echo 'Your uploaded file is too big. The maximum allowed size is 20mb.';
        }

    } else {
        echo 'There was an unexpected error. Please try again later!';
    }
} else {
    echo 'Files of this type are not allowed!';
}
$teaser = $_FILES['teaser'];
$teaserFileName = $_FILES['teaser']['name'];
$teaserFileTempName = $_FILES['teaser']['tmp_name'];
$teaserFileError = $_FILES['teaser']['error'];
$teaserFileType = $_FILES['teaser']['type'];
$teaserFileSize = $_FILES['teaser']['size'];


$teaserFileExt = explode('.', $teaserFileName);
$teaserFileExtSplitted = strtolower(end($teaserFileExt));

$allowed = array('mp3', 'wav');

if (in_array($teaserFileExtSplitted, $allowed)) {
    if ($teaserFileError === 0) {

        if ($teaserFileSize < 20000000) {
            $newTeaserFileName = uniqid('', true) . "." . $teaserFileExtSplitted;
            $teaserFileDirection = 'uploads/teaser/' . $newTeaserFileName;
            move_uploaded_file($teaserFileTempName, $teaserFileDirection);

            $sql = "INSERT INTO song (arid, title, genre, duration, price, plays, purchases, revenue, udate, cover, file , teaser) VALUES (:arid, :title, :genre, 1, :price, 0, 0, 0, CURRENT_DATE, :cover , :file, '" . $teaserFileDirection . "')";
            $prepared_sql = $conn->prepare($sql);
            $prepared_sql->bindParam( ':arid', $arid);
            $prepared_sql->bindParam( ':title', $title);
            $prepared_sql->bindParam( ':genre', $genre);
            $prepared_sql->bindParam( ':price', $price);
            $prepared_sql->bindParam( ':cover', $fileDirection);
            $prepared_sql->bindParam( ':file', $SongfileDirection);
            $prepared_sql->execute();
            header("Location: home.php");
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