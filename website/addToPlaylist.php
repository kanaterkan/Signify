<?php 
    include "connect.php";

    $IDS = $_POST['playlist'];
    $IDS = explode('.', $IDS);

    $playlistID = $IDS[0];
    $songID = $IDS[1];

    $pposition = 0;

    $sql = 'SELECT * FROM playlistcontent WHERE plid = ' . $playlistID;
    $stmt = $conn->query($sql);
    foreach ($stmt as $row) {
        $pposition = intval($row['pposition']);
    }
    $pposition = $pposition + 1;
    
    $sql = 'INSERT INTO playlistcontent (plid, pposition, sid) VALUES ( :plid, :pposition, :sid)';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam( ':plid', $playlistID);
    $stmt->bindParam( ':pposition', $pposition);
    $stmt->bindParam( ':sid', $songID);
    $stmt->execute();


    header("Location: home.php?playlist=" . $playlistID);
?>