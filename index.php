<?php
require "/classes/movie.php";
$USER= "root";
$PASSWORD ="1234";
$DSN ="mysql:host=localhost;dbname=movie_collectioner_db";
try {
   $pdo = new PDO($DSN, $USER, $PASSWORD);
} catch (PDOException $e) {
   die("Error ! : " . $e->getMessage());
}
//$pdo->exec("INSERT INTO sample (col) VALUES('val')");
$result = $pdo->query("SELECT * FROM movie");
$movies = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

	<title>Movie Collection</title>

	<!-- Loading third party fonts -->
	<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
	<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
	 crossorigin="anonymous">

	<!-- Loading main css file -->
	<link rel="stylesheet" href="style.css">

	<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

</head>


<body>


	<div id="site-content">
		<header class="site-header">
			<div class="container">
				<a href="index.php" id="branding">
					<img src="images/logo.png" alt="" class="logo">
					<div class="logo-copy">
						<h1 class="site-title">Super Movies</h1>
						<small class="site-description">One stop Movie collection!</small>
					</div>
				</a> <!-- #branding -->

				<div class="main-navigation">
					<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
					<ul class="menu">
						<li class="menu-item current-menu-item"><a href="index.php">Home</a></li>
						<li class="menu-item"><a href="search.php">Search</a></li>
						<li class="menu-item"><a href="add-movie.php">Add Movie</a></li>
					</ul> <!-- .menu -->
				</div> <!-- .main-navigation -->

				<div class="mobile-navigation"></div>
			</div>
		</header>
		<main class="main-content">

			<div class="container">
			<?php var_dump($movies) ?>
				<!--Table-->
				<table id="tablePreview" class="table table-striped table-hover table-bordered">
					<!--Table head-->
					<thead>
						<tr>
							<th>#</th>
							<th>Poster</th>
							<th>Title</th>
							<th>Casts</th>
							<th>Year</th>
							<th>Category</th>
							<th>Edit</th>
							<th>Modify </th>
						</tr>
					</thead>
					<!--Table head-->
					<!--Table body-->
					<tbody>
						<?php foreach($movies as $movie): ?>
						<tr>
							<th scope="row"><?php echo $movie["movie_id"]; ?></th>
							<td><img alt="Image not availabe" title=<?php echo $movie["title"]; ?> src=<?php echo $movie["cover"]; ?>></td>
							<td><?php echo $movie["title"]; ?></td>
							<td>Dr. Kennebrew Beauregard, Ron Stallworth, Mr. Turrentine, Chief Bridges</td>
							<td>2018</td>
							<td>Comedy</td>
							<td><a href="#">Modify</a></td>
							<td><a href="#">Delete</a></td>
						</tr>
						<?php endforeach; ?>
						<!--<tr>
							<th scope="row">2</th>
							<td><img alt="The Grinch Poster" title="The Grinch Poster" src="https://m.media-amazon.com/images/M/MV5BYmE5Yjg0MzktYzgzMi00YTFiLWJjYTItY2M5MmI1ODI4MDY3XkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_UX182_CR0,0,182,268_AL_.jpg"></td>
							<td>The Grinch</td>
							<td>The Grinch, Cindy-Lou Who, Donna Who</td>
							<td>2018</td>
							<td>Comedy</td>
							<td><a href="#">Modify</a></td>
							<td><a href="#">Delete</a></td>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td><img alt="Jurassic World: Fallen Kingdom Poster" title="Jurassic World: Fallen Kingdom Poster" src="https://m.media-amazon.com/images/M/MV5BNzIxMjYwNDEwN15BMl5BanBnXkFtZTgwMzk5MDI3NTM@._V1_UX182_CR0,0,182,268_AL_.jpg"></td>
							<td>Jurassic World: Fallen Kingdom</td>
							<td>Owen Grady, Claire Dearing, Eli Mills</td>
							<td>2018</td>
							<td>Science Fiction</td>
							<td><a href="#">Modify</a></td>
							<td><a href="#">Delete</a></td>
						</tr>
						<tr>
							<th scope="row">4</th>
							<td><img alt="A-X-L Poster" title="A-X-L Poster" src="https://m.media-amazon.com/images/M/MV5BMzhmMWY5YzYtNGU0OS00OWExLWE4MTEtZjdmZTczNGEwNjhmXkEyXkFqcGdeQXVyMjM4NTM5NDY@._V1_UX182_CR0,0,182,268_AL_.jpg"></td>
							<td>A-X-L</td>
							<td>Sara, Chuck Hill, Mr. Fontaine</td>
							<td>2018</td>
							<td>Science Fiction</td>
							<td><a href="#">Modify</a></td>
							<td><a href="#">Delete</a></td>
						</tr>
						<tr>
							<th scope="row">5</th>
							<td><img alt="The Nun Poster" title="The Nun Poster" src="https://m.media-amazon.com/images/M/MV5BMjEwMDE1NzI3M15BMl5BanBnXkFtZTgwNjg2NjExNjM@._V1_UX182_CR0,0,182,268_AL_.jpg"></td>
							<td>The Nun</td>
							<td>Father Burke, Sister Irene, Frenchie, The Nun</td>
							<td>2018</td>
							<td>Horror</td>
							<td><a href="#">Modify</a></td>
							<td><a href="#">Delete</a></td>
						</tr>
						<tr>
							<th scope="row">6</th>
							<td><img alt="The Conjuring Poster" title="The Conjuring Poster" src="https://m.media-amazon.com/images/M/MV5BMTM3NjA1NDMyMV5BMl5BanBnXkFtZTcwMDQzNDMzOQ@@._V1_UX182_CR0,0,182,268_AL_.jpg"></td>
							<td>The Conjuring</td>
							<td>Lorraine Warren, Ed Warren, Carolyn Perron</td>
							<td>2013</td>
							<td>Horror</td>
							<td><a href="#">Modify</a></td>
							<td><a href="#">Delete</a></td>
						</tr>
						<tr>
							<th scope="row">7</th>
							<td><img alt="Fifty Shades of Grey Poster" title="Fifty Shades of Grey Poster" src="https://m.media-amazon.com/images/M/MV5BMjE1MTM4NDAzOF5BMl5BanBnXkFtZTgwNTMwNjI0MzE@._V1_UX182_CR0,0,182,268_AL_.jpg"></td>
							<td>Fifty Shades of Grey</td>
							<td>Anastasia Steele, Christian Grey</td>
							<td>2015</td>
							<td>Romance</td>
							<td><a href="#">Modify</a></td>
							<td><a href="#">Delete</a></td>
						</tr>
						-->
					</tbody>
					<!--Table body-->
				</table>
				<!--Table-->
			</div><!-- .container -->
		</main>
		<footer class="site-footer">
			<div class="container">

				<div class="colophon">Copyright 2018 All rights reserved.</div>
			</div> <!-- .container -->
		</footer>
	</div>
	<!-- Default snippet for navigation -->



	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/app.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
	 crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl"
	 crossorigin="anonymous"></script>

</body>

</html>