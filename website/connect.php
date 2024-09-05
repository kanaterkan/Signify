<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <div class="connection">
        <?php
        $host = "db";
        $port  = "5432";
        $db = "prj1";
        $user = "prj1_user";
        $pword = "prj1_password";
        $dsn = "pgsql:host=$host;port=$port;dbname=$db;user=$user;password=$pword";
        try {    // if the connection doesn’t work do not exit but go to catch part
            $conn = new PDO($dsn);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // report error message
            echo $e->getMessage();
        }

        $uid = 1;
        ?>
    
    </div>
</body>


</html>