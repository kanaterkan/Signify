<?php
session_start();
?>

<!DOCTYPE html>
<html>


<head>
    <link rel="stylesheet" href="styles/login.css">
    <title>
        Contact
    </title>

    <?php include "connect.php" ?>
</head>

<body>
<div class="image">
	<a href="home.php">
		<img src="images/logo.png" alt="logo">
	</a>
</div>
    <div id="Text">
        <div class="center">
            <div class="txt_field">
                <div class="center">
                    <div id="Header">
                        <h1>Login</h1>
                        <?php if(isset($_GET['incorrect'])) {
                            echo '<p>Your entered data does not match any account from our system. Please try again.</p><br>';
                        } 
                        ?>
                    </div>

                    <form id="form" action="loginProcess.php" method="POST">
                        <label for="Email"></label>
                        <input type="email" name="Email" id="Email" placeholder="Enter your e-mail:">

                        <label for="Password"></label>
                        <input type="password" name="Password" id="Password" placeholder="Enter your password:">

                        <input type="submit" name="submitLogin">
                    </form>

                    <div class="signup_link">
                        <div id="SignUp">
                            <a href="signup.php">You don't have an account? Sign up now</a>
                        </div>
                    </div>




                </div>
            </div>
</body>

</html>