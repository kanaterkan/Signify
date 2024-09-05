<?php 
    session_start();
    if (!($_SESSION["acctype"] == "ADMIN") or !isset($_SESSION["uid"])) {
        header ("Location: home.php");
        exit;
    }
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title> Admin Control Panel </title>
    <link rel="stylesheet" href="styles/ACP.css">
</head>

<body>
    <?php
    include "connect.php";
    ob_start(); //Output Buffering for header location
    ?>
    <div class="container">
        <div class="UserinfoTitle">
            Userinformation
            <a href="home.php">⏎</a>
        </div>
        <div class="AnalyticsTitle">Analytics</div>
        <div class="SonginfoTitle">Songinformation</div>
        <div class="Userinfo">
            <?php
            $sql = 'SELECT * FROM useracc ORDER BY uid';
            $stmt = $conn->query($sql);
            foreach ($stmt as $row) {
                $uid = $row['uid'];
                echo '<h1 class="User">' . $row['username'] . '</h1>
            <form action="updateUsername.php" method="post">
            <input type="hidden" name="uid" value='. $uid. '>
            <input type="text" name="updatedUsername" id="updatedUsername" placeholder="Enter new Username">
            <input type="submit" value="Update">
            </form>
        <button title="delete"><a href="?delete=' . $uid . '">🗑</a></button>
        <button title="verify"><a href="?verify=' . $uid . '">✓</a></button>
        <button title="unverify"><a href="?unverify=' . $uid . '">✗</a></button>' .
                    '<p> Creation Date: ' . $row["cdate"] . '<br>
            Type: ' . $row["acctype"] . '<br>
            UID: ' . $row["uid"] . ' <br>
            Artist?: ';
                $artistUidSql = "SELECT * FROM artist WHERE uid = :uid";
                // query preperation
                $ArtistStmt = $conn->prepare($artistUidSql);
                // parameter binding
                $ArtistStmt->bindParam(':uid', $uid);
                // execute
                $ArtistStmt->execute();
                // Check if any rows were returned
                if ($ArtistStmt->rowCount() > 0) {
                    echo 'true';
                } else {
                    echo 'false';
                }
                echo '<hr>';
            }
            ?>
        </div>
        <div class="Analytics">
            <?php
            $sql = 'SELECT * FROM song';
            $stmt = $conn->query($sql);
            $songCount = 0;
            foreach ($stmt as $row) {
                $songCount++;
            }
            echo "<h1> Count of songs: " . $songCount . "</h1><hr>";
            $sql = 'SELECT * FROM ownedplaylist';
            $stmt = $conn->query($sql);
            $playlistCount = 0;
            foreach ($stmt as $row) {
                $playlistCount++;
            }
            echo " <h1> Count of playlists: " . $playlistCount . "</h1><hr>";
            $sql = 'SELECT * FROM useracc';
            $stmt = $conn->query($sql);
            $userCount = 0;
            foreach ($stmt as $row) {
                $userCount++;
            }
            echo " <h1> Count of users: " . $userCount . "</h1><hr>";
            $sql = 'SELECT * FROM artist';
            $stmt = $conn->query($sql);
            $artistCount = 0;
            foreach ($stmt as $row) {
                $artistCount++;
            }
            echo " <h1> Count of artists: " . $artistCount . "</h1><hr>";
            $sql = 'SELECT * FROM song';
            $stmt = $conn->query($sql);
            $totalRevenue = 0.0;
            foreach ($stmt as $row) {
                $totalRevenue = $totalRevenue + floatval($row["revenue"]);
            }
            echo " <h1> Total Revenue: " . $totalRevenue . "€</h1><hr>";
            ?>
        </div>
        <div class="Songinfo">
            <?php
            $sql = 'SELECT * FROM song ORDER BY sid';
            $stmt = $conn->query($sql);
            foreach ($stmt as $row) {
                $sid = $row['sid'];
                echo '<h1 class="User">' . $row["title"] . '</h1>
                <form action="updateSongtitle.php" method="post">
                <input type="hidden" name="sid" value='.$sid. '>
                <input type="text" name="updatedSongtitle" id="updatedSongtitle" placeholder="Enter new Songtitle">
                <input type="submit" value="Update">
                </form>
            <button title="delete"><a href="?deleteSong=' . $sid . '">🗑</a></button>
            <p>Upload date: ' . $row["udate"] . '<br>
            Price: ' . $row["price"] . '€<br>
            Plays: ' . $row["plays"] . '<br>
            Purchases: ' . $row["purchases"] . '<br>
            Revenue: ' . $row["revenue"] . '€
            </p><hr>';
            }

            if (isset($_GET['edit'])) {
                $edit = $_GET['edit'];
            } else if (isset($_GET['delete'])) {
                $delete = $_GET['delete'];
                $sql = 'DELETE FROM useracc WHERE uid =' . $delete;
                $stmt = $conn->query($sql);
                header("Location: ../acp.php");
                ob_end_flush();
            } else if (isset($_GET['verify'])) {
                $verify = $_GET['verify'];
                $sql = 'INSERT INTO artist (uid, revenue)
                VALUES (' . $verify . ', 0);';
                $stmt = $conn->query($sql);
                header("Location: ../acp.php");
                ob_end_flush();
            } else if (isset($_GET['unverify'])) {
                $unverify = $_GET['unverify'];
                $sql = 'DELETE FROM artist WHERE uid =' . $unverify;
                $stmt = $conn->query($sql);
                header("Location: ../acp.php");
                ob_end_flush();
            } else if (isset($_GET['deleteSong'])) {
                $deleteSong = $_GET['deleteSong'];
                $sql = 'DELETE FROM song WHERE sid ='.$deleteSong;
                $stmt = $conn->query($sql);
                header("Location: ../acp.php");
                ob_end_flush();
            }
            ?>
        </div>
    </div>
</body>

</html>