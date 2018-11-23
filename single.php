<?php

$USER= "root";
$PASSWORD ="1234";
$DSN ="mysql:host=localhost;dbname=movie_collectioner_db";
try {
   $pdo = new PDO($DSN, $USER, $PASSWORD);
} catch (PDOException $e) {
   die("Error ! : " . $e->getMessage());
}
$movie_id=1;
if (isset($_GET['movie_id'])) { $movie_id = (int)$_GET['movie_id']; }
$resultMovie = $pdo->query("SELECT * FROM movie WHERE movie_id=".$movie_id);
$movies = $resultMovie->fetchAll(PDO::FETCH_ASSOC);
$movie=$movies[0];

$resultCast = $pdo->query("SELECT * FROM cast");
$casts = $resultCast->fetchAll(PDO::FETCH_ASSOC);

$resultCategory = $pdo->query("SELECT * FROM category");
$categories = $resultCategory->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Movie Review | Single</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

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
					<div class="page">
						

						<div class="content">
							<div class="row">
								<div class="col-md-6">
									<figure class="movie-poster"><img src=<?php echo $movie["cover"]; ?> alt="#"></figure>
								</div>
								<div class="col-md-6">
									<h2 class="movie-title"><?php echo $movie["title"]; ?></h2>
									
									<ul class="movie-meta">
																			
										
										<li><strong>Category:</strong> <?php 
								foreach($categories as $category){
									if ( $movie["category_id"]== $category["category_id"]){
										echo $category["category_name"];
									}
								}
								 ?></li>
									</ul>

									<ul class="starring">
										<li><strong>Cast Name:</strong> <?php 
								foreach($casts as $cast){
									if ( $movie["movie_id"]== $cast["movie_id"]){
										echo $cast["cast_name"];
									}
								}
								 ?></li>
										<li><strong>Actor Name:</strong> <?php 
								foreach($casts as $cast){
									if ( $movie["movie_id"]== $cast["movie_id"]){
										echo $cast["actor_name"];
									}
								}
								 ?></li>
										<li><strong>Year:</strong> <?php echo $movie["year"]; ?></li>
										
									</li>
										<li><strong>IMBD LINK:</strong> <?php echo $movie["imdb_link"]; ?></li>	
									</ul>
								</div>
							</div> <!-- .row -->
							<div class="entry-content">
							<?php
							echo "<iframe width='560' height='315' src='".$movie['trailer_link']."' frameborder='0' allowfullscreen></iframe>";
							?>
							</div>
						</div>
					</div>
				</div> <!-- .container -->
			</main>
			<footer class="site-footer">
				<div class="container">
					<div class="row">
					<div class="colophon">Copyright 2018  All rights reserved.</div>
				</div> <!-- .container -->

			</footer>
		</div>
		<!-- Default snippet for navigation -->
		


		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>