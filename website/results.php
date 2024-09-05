<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/playlist.css">
    
</head>

<body>
    <?php include "connect.php";
      $result = $_GET['searchResult'];
      $sql = "SELECT * FROM song WHERE LOWER(title) LIKE LOWER('%{$result}%')";

      $stmt = $conn->query($sql);
    ?>
<h1 id= "heading">Your Results: </h1>
<div id="songs">
        <div id= "listing">
        <div class="listposition"> </h2> </div>
        <div id="listcover">  
        </div>
        <div class="listlength"><h2>Purchase </h2>
        </div>
        <div class="listtitle"> <h2>Title</h2>
        </div>
        <div class="listartist"> <h2> Artist </h2>
        </div>
        <div class="listdate"> <h2>Add to Playlist</h2>
        </div>
</div>
        
   <?php
   $i=1;
   foreach ($stmt as $row) {
    echo '<div id="listing"> <div class="listposition"> <h2><a href="' . $_SERVER['REQUEST_URI'] . '&play=' . $row['file'] . '">⏵</a></h2> </div>';
    $sql='SELECT * FROM song where sid='. $row ['sid'];
    $sid = $row['sid'];
    $stmt=$conn->query($sql);



    foreach ($stmt as $row) {
        echo'
        <div id="listcover"> <img src="'.$row['cover'].'"alt=""> </div>
        <div class ="listtitle"> <h2>' .$row ['title'].'</h2> </div>';

        $sqlforartist='SELECT * FROM useracc INNER JOIN artist ON useracc.uid=artist.uid WHERE arid='.$row ['arid'];
        $tmtforartist= $conn->query($sqlforartist);

        foreach ($tmtforartist as $artistrow) {
            echo' <div class ="listartist"> <h2>'.$artistrow['username'].'</h2> </div>';
        }

        echo'
        <div class="listdate"> 
        <form action="addToPlaylist.php" method="post">
        <select name="playlist" id="">';
                    
        $sql = 'SELECT * FROM ownedplaylist WHERE uid = ' . $_SESSION['uid'];
        $stmt = $conn->query($sql);
        foreach ($stmt as $row) {
            $sql = 'SELECT * FROM playlist WHERE plid = ' . $row['plid'];
            $stmt = $conn->query($sql);
            $plToAdd = $row['plid'];
            foreach ($stmt as $row) {
                echo '<option value="' . $plToAdd . '.' . $sid . '">' . $row['title'] . '</option>';
            }
        }

        echo '
        </select>
        <input type="submit" value="Add">
        </form>
        </div>';
           if (!($_SESSION["acctype"] == "PREMIUM")) {
            $sql = 'SELECT * FROM ownedsong WHERE uid = ' . $_SESSION['uid'];
            $stmt = $conn->query($sql);
            $ownedSongs = array();

            foreach ($stmt as $row) {
                array_push($ownedSongs, $row['sid']);
            }

            if (in_array($sid, $ownedSongs)) {
                echo '<div class="listlength"><h2>✔</h2></div>';
            } else {
                echo '<div class="listlength">
                    <form action="buySong.php" method="post">
                    <input type="hidden" name="sid" value=' . $sid . '>
                    <input type="submit" value="Buy Now">
                    </div>';
            }
            }
        echo '<br>';
    }
    echo'</div>';
    $i=$i+1;
   }
   
   ?>



</form>
</body>

</html>