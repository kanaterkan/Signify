<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();

	}
	
	if (!isset($_GET['play'])) {
		$play = "";
	} else {
		$play = $_GET['play'];
	}

	$logoType = "images/logo.png";
	include "connect.php";
?>
	
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="styles/home.css">
	<link rel="icon" type="image/png" href="images/favicon.png">
	<title>Songify | Home</title>
</head>

<body>

	<header>
		<nav>
			<?php
				if (!isset($_SESSION["uid"])) {
					echo '
					<class id="loginButton"><a href="login.php">Login</a></class>
					<class id="signUpBottn"><a href="signUp.php">Sign Up</a></class>';

					
				} else {
					echo '<a>' . $_SESSION["username"] . '</a>';
					echo '<class id="logOutButton"><a href="logOut.php">Log Out</a></class>';

					if ($_SESSION["acctype"] == "PREMIUM") {
						$logoType = "images/logopremium.png";
					} else if ($_SESSION["acctype"] == "BASIC") {
						$logoType = "images/logobasic.png"; 
					}
				}
			?>
		</nav>
	</header>

	<div class="app">


		<aside class="sidebar">
		<?php
			echo '<img class="sidelogo" src="' . $logoType . '" alt="Songify Logo">';
		?>
			<nav class="menu">
				<a href="?search" name="link1" class="menu-item">Search..</a>
				<a href="?mysongs" class="menu-item">My Songs</a>
				<a href="?myplaylists" class="menu-item">My Playlists</a>
				<a href="?contact" class="menu-item">Contact</a>

				<?php 
				// Checking whether the user is an artist

				if (isset($_SESSION['uid'])) {
					$sql = 'SELECT * FROM artist WHERE uid=' . $_SESSION['uid'];
					$stmt = $conn->query($sql);
					$rows = 0;
	
					foreach ($stmt as $row) {
						$rows = $rows + 1;
					}
	
					if ($rows > 0) {
						echo '<a href="?upload" class="menu-item">Upload</a>';
					}
				}
				if (isset($_SESSION['uid'])) {
				if ($_SESSION["acctype"] == "ADMIN") {
					echo '<a href="acp.php" class="menu-item">ACP</a>';
				}
			}
				?>
			</nav>
			<?php
			echo
			'<audio controls>
				<source src="' . $play . '" type="audio/mpeg">
			</audio>';
			?>
		</aside>

		<main class="content">

			<?php
			$playlist = array();

			if (isset($_GET['myplaylists'])) {
				include "myplaylists.php";
			} else if (isset($_GET['mysongs'])) {
				include "mysongs.php";
			} else if (isset($_GET['playlist'])) {
				$playlistid = $_GET['playlist'];
				include "playlist.php";
			} else if (isset($_GET['create'])) {
				include "create.php";
			} else if (isset($_GET['contact'])) {
				include "contact.php";
			} else if (isset($_GET['upload'])) {
				include "uploadFinal.php";
			} else if (isset($_GET['search'])) {
				include "search.php";
			} else if(isset($_GET['searchResult'])) {
				include "results.php";
			} else {
				include "search.php";
			}
			
			// Playlist deletion, only works if the User owns the playlist (so you can't just insert a random number.)

			if (isset($_GET['pldelete'])) {

				if(!isset($_SESSION['uid'])) {
					header("Location: login.php");
				}

				$sql = 'SELECT * FROM ownedplaylist WHERE uid = ' . $_SESSION['uid'];
				$stmt = $conn->query($sql);

				foreach ($stmt as $row) {
					if ($row['plid'] = $_GET['pldelete']) {
						$sql = 'DELETE FROM ownedplaylist WHERE plid = :playlistid';
						$prepared_sql = $conn->prepare($sql);
						$prepared_sql->bindParam( ':playlistid', $_GET['pldelete']);
						$prepared_sql->execute();
					}
				}
				header("Location: home.php?myplaylists");
			}

			?>

		</main>
	</div>




</body>

</html>
</body>

</html>