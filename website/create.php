<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="styles/playlistCreation.css">
    </head>

    <?php include "connect.php"; ?>

    <body>
        <main id="form">
            <h1>Create a new Playlist</h1>

            <form action="createPlaylist.php" method="POST" enctype="multipart/form-data">
                <label for="title">Title</label><br>
                <input type="text" name="title"><br><br>
                <label for="description">Description</label><br>
                <input type="text" name="description"><br><br>
                <label for="file">Cover</label><br>
                <input type="file" name="file"><br><br>
                <input type="submit" name="submit">
            </form>

            <br>
            <p>You will be redirected to the "My Playlists" page if the playlist creation was successful.</p>
        </main>
        </html>
    </body>