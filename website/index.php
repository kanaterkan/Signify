<!DOCTYPE html>
<html lang="en">
<head>
    <title>Project 1 - Test Page</title>
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>

<div>
    <span>Shortcut links:<span>
        <?php
            include "connect.php";
        ?>
    </div>

    <a href="home.php">Home</a>
    <a href="ACP.php">ACP</a>
    <a href="index2.php">Index2</a>
    <a href="uploadAlbum.php">Upload album</a>
    <div>
    <span>Apache</span><span class="success">Working &#128526</span>
        <span>PHP</span><span class="success">Working &#128526</span>
        <span>Database</span>
        <?php
            try{
                $username = "prj1_user";
                $password = "prj1_password";
                $db = new PDO("pgsql:host=db;port=5432;dbname=prj1", $username, $password);
                print('<span class="success">Working &#128526</span>');
                header("Location: home.php");
            }catch(PDOException $e){
                print("<h1>Couldn't connect to database.</h1>");
                print('<span>Error message</span>');
                print('<pre class="error">' . $e->getMessage() . '</pre>');
            }

            
        ?>
        </div>
</body>
</html>