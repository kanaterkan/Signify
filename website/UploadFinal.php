<!DOCTYPE html>

<html lang="en">

<head>
    <title>
        Upload
    </title>

    <link rel="stylesheet" href="styles/UploadFinal.css">
    <!--Connect with css-->

</head>
<?php include "connect.php"; ?>

<body>

    <h1>
        Upload a Song
    </h1>



    <div class="Container">
        <!--Generate the input form for the information-!-->
        <form id="form" action="uploadSong.php" method="POST" enctype="multipart/form-data">

            <label id="label" for="Title">Title</label><br>
            <input type="text" name="title" id="Title" placeholder="Enter the title"> <br><br>

            <label for="Price">Price</label><br>
            <input type="number" name="price" id="Price" placeholder="Enter the price"> <br><br>


            <label for="Genre">Genre</label><br>
            <input type="text" name="genre" id="Genre" placeholder="Enter the genre(Rap, HipHop or Else)"><br><br>

            <label for="SongFile">Upload your Song file</label><br>
            <input type="file" name="song"><br>


            <label for="Trailer">Upload your Song Teaser</label><br>
            <input type="file" name="teaser"><br>

            <label for="Cover"> Upload your cover file</label><br>
            <input type="file" name="file"><br><br>

            <input type="submit" id="submit" name="submit" value="submit">
        </form>



        <aside class="right">
            <p>
                HERE <br> COULD <br> BE <br> YOUR <br> ADVERTISEMENT
            </p>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <h3>
                CONTACT US: songify@ad.de
            </h3>
        </aside>

        <table class="InfoOnSongs">

            <thead>
                <tr>
                    <th>INFOS ON UPLOADING A SONG</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>The title can have maximum 200 Strings.</td>
                </tr>
                <tr>
                    <td>The price of a song must be between 0.10€ and 3€</td>
                </tr>
                <tr>
                    <td>Please watch for the right spelling at the genre or your song won't be shown on the home. Capital letter at the beginning.</td>
                </tr>
                <tr>
                    <td>The song file must be a mp3 or mp4 file and less than 20 mb.</td>
                </tr>
                <tr>
                    <td>The cover file must be a jpg or jpeg file and less than 20 mb.</td>
                </tr>
                <tr>
                    <td>The word "terror" will be banned</td>
                </tr>
                <tr>
                    <td>You have to upload a 10 sec trailer</td>
                </tr>
            </tbody>

            </tr>
        </table>


    </div>


</body>

</html>