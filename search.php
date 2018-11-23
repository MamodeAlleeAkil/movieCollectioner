<?php

$USER= "root";
$PASSWORD ="1234";
$DSN ="mysql:host=localhost;dbname=movie_collectioner_db";
try {
   $pdo = new PDO($DSN, $USER, $PASSWORD);
} catch (PDOException $e) {
   die("Error ! : " . $e->getMessage());
}


$resultMovie = $pdo->query("SELECT * FROM movie");
$movies = $resultMovie->fetchAll(PDO::FETCH_ASSOC);

$resultCast = $pdo->query("SELECT * FROM cast");
$casts = $resultCast->fetchAll(PDO::FETCH_ASSOC);
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
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


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
						<li class="menu-item"><a href="index.php">Home</a></li>
						<li class="menu-item current-menu-item"><a href="search.php">Search</a></li>
						<li class="menu-item"><a href="add-movie.php">Add Movie</a></li>
					</ul> <!-- .menu -->
				</div> <!-- .main-navigation -->
				<div class="mobile-navigation"></div>
			</div>
		</header>
		<main class="main-content">
			<div class="container">
				<form class="form-wrapper cf" method="post">
					<input type="text" name="search" placeholder="Search Movie here..." required>
					<button type="submit">Search</button>
				</form>

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
							<th>View </th>
						</tr>
					</thead>
					<!--Table head-->
					<!--Table body-->
					<tbody>
						<?php 
							//check if user has searched
							if(isset($_POST['search']) || $_POST['search'] != ""): 
								//get the input of user
								$searchedWord = $_POST['search'];
						?>

							<?php foreach($movies as $movie): 
								//checks if movie title contains searchedWord
								if(stripos($movie["title"], $searchedWord) !== false):
								
								?>
								<tr>
							<th scope="row"><?php echo $movie["movie_id"]; ?></th>
							<td><img alt="Image not availabe" title=<?php echo $movie["title"]; ?> src=<?php echo $movie["cover"]; ?>></td>
							<td><?php echo $movie["title"]; ?></td>
							<td><?php 
								foreach($casts as $cast){
									if ( $movie["movie_id"]== $cast["movie_id"]){
										echo $cast["cast_name"];
									}
								}
								 ?></td>
							
							<td><?php echo $movie["year"]; ?></td>
							<td><?php echo $movie["category_id"]; ?></td>
							<td><a href="#">Modify</a></td>
							<td><a href="#">Delete</a></td>
							<td><a href="#"><?php echo "<a href='single.php?movie_id=".$movie["movie_id"]."'>View</a>"?></a></td>
						</tr>

								
							<?php endif; endforeach; ?>

						<?php endif; ?>

					</tbody>
					<!--Table body-->
				</table>
				<!--Table-->
			</div>

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
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>


</body>

</html>