



<!DOCTYPE html>
<html>

<head>
<title>
	Sign up
</title>
<style>
		<?php include 'styles/signup.css'; ?>
</style>

</head>

<body>
<div class="grid-container">
<div class="Überschrift"> <h1>Sign up</h1> 
<a href="home.php">

	<form class="Sign" action="signUp2.php" method="POST" enctype="multipart/form-data">
	</a>
		
		 <label for="Email">Email:</label>
		  <input type="text" name="Email" id="Email" placeholder="Enter email"><br><br>
		 <label for="firstname">First name: </label>
			<input type="text" name="firstname" placeholder="Enter first name"><br><br>

		<label for="lastname" >Last name:</label>
		<input type="text" name="lastname" placeholder="Enter lastname"><br><br>

		<label for="username"> Username: </label>
		<input type="text" name="username"><br> <br>

		<label for="password">Password : </label>
		<input type="password" name="password" placeholder="Create your password"> <br><br>

		<label for="gender">Your gender:</label> <br><br>
		 male:<input type="radio" values="m" name="gender"> 
		female: <input type="radio" values="w" name="gender"> <br>

		<label for="birthdate">Birthdate: </label>
		<input type="date" name="birthdate"> <br><br>

		<label for="abo">Choose your abo:</label> <br>
		BASIC: <input type="radio" value="BASIC" name="abo"> 
		PREMIUM: <input type="radio" value="PREMIUM" name="abo"><br> 

		<label for="payment">Enter payment:</label><br>
			Paypal:<input type="checkbox" name="payment">
			<button name="signup" >Sign Up</button>
		</form>
		<div class="link"> <a href="login.php"> You already have an account? Login</a>
		
</div>




</body>
</html>