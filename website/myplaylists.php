<?php
    if (!isset($_SESSION["uid"])) {
        header ("Location: login.php");
    }
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles/myplaylists.css">
</head>

<body>
    <main>
        <h1>My Playlists</h1>

        <div id="playlists">
            <?php 
            $sql = 'SELECT * FROM ownedplaylist WHERE uid=' . $_SESSION["uid"];
            $stmt = $conn->query($sql);
            $i = 0;


            foreach ($stmt as $row) {
                $playlist[$i] = $row['plid'];
                $plid = $row['plid'];
                $sql = 'SELECT * FROM playlist WHERE plid=' . $plid;
                $stmt = $conn->query($sql);

                

                echo '
                <div id="item">';

                foreach ($stmt as $row) {
                    echo '
                    <p><a href="?playlist=' . $playlist[$i] . '">' . $row['title'] . '</a></p>
                    <a href="?playlist=' . $playlist[$i] . '"><img src="' . $row['cover'] . '" alt=""></a>
                    <p id="pldelete"><a href="?pldelete=' . $playlist[$i] . '">DELETE X</a></p>';
                }

                echo '</div>';
                $i = $i + 1;

            }

            ?>

            <div id="item">
                <p><a href="">Create a new playlist</a></p>
                <a href="?create"><img src="images/newplaylist.png" alt=""></a>
            </div>

        </div>


    </main>
</body>



</html>