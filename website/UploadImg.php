<?php 

include("connect.php");
$sql="Create table uploads (id serial primary key, name varchar(100), location varchar)";
$createStatement = $conn-> query($sql);

if (isset ($_POST['submit'])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTempName = $_FILES['file']['tmp_name'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileExtSplitted = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileExtSplitted, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 20000) {
                $newFileName = uniqid('', true) . "." . $fileExtSplitted;
                $fileDirection = 'uploads/images/' . $newFileName;
                move_uploaded_file($fileTempName, $fileDirection);
                header("Location: home.php?creationsuccess");
            } else {
                echo 'Your uploaded file is too big. The maximum allowed size is 20mb.';
            }

        } else {
            echo 'There was an unexpected error. Plewase try again later!';
        }
    } else {
        echo 'Files of this type are not allowed!';
    }
}

?>