<?php
    if (!isset($_SESSION["uid"])) {
        header ("Location: login.php");
    }

    include "connect.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles/playlist.css">
</head>

<!-- Cover, Title, Description -->

    <h1 id="heading">My Songs</h1>

    <div id="songs">
        <div id="listing">
            <div class="listposition"><h2>#</h2></div>
            <div id="listcover"></div>
            <div class="listtitle"><h2>Title</h2></div>
            <div class="listartist"><h2>Artist</h2></div>
            <div class="listdate"><h2>Release Date</h2></div>
            <div class="listlength"><h2>Duration</h2></div>
        </div>
        <br>

        <?php

        // Selecting Playlist Data
        $sql = 'SELECT * FROM ownedsong WHERE uid=' . $_SESSION["uid"]; 
        $stmt = $conn->query($sql);
        $i = 1;

        foreach ($stmt as $row) {

            
            // Selecting Song Data
            $sql = 'SELECT * FROM song WHERE sid=' . $row['sid'];
            $stmt = $conn->query($sql);
            
            foreach ($stmt as $row) {
                echo '<div id="listing"> <div class="listposition"> <h2><a href="' . $_SERVER['REQUEST_URI'] . '&play=' . $row['file'] . '">⏵</a></h2> </div>
                <div id="listcover"><img src="' . $row['cover'] . '" alt=""></div>
                <div class="listtitle"><h2>' . $row['title'] . '</h2></div>';

                // Selecting Artist Data
                $artistsql = 'SELECT * FROM useracc INNER JOIN artist ON useracc.uid=artist.uid WHERE arid=' . $row['arid'];
                $artiststmt = $conn->query($artistsql);

                foreach ($artiststmt as $artistrow) {
                    echo '<div class="listartist"><h2>' . $artistrow['username'] . '</h2></div>';
                }

                echo '
                <div class="listdate"><h2>' . $row['udate'] . '</h2></div>
                <div class="listlength"><h2>' . $row['duration'] . ' s</h2></div>
                <br>';
            }

            echo '</div>';
            $i = $i + 1;
        }

        ?>

    </div>

</html>