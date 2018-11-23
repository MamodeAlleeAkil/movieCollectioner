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

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Modify'])) { Modify(); }
function Modify(){
	global $pdo;
	global $movie;
	$category=$_POST["category"]; 
	$title=$_POST["title"];
	$year=$_POST["year"];
	$casts=$_POST["casts"];
	$cover=$_POST["cover"];
	$tags=$_POST["tags"];
	$url=$_POST["url"];
	$trailer=$_POST["trailer"];
	
	$pdo->beginTransaction();
	try {
	   $sql1 = "UPDATE  movie SET title='".$title."', year='".$year."', imdb_link='".$url."', trailer_link='".$trailer."', cover='".$cover."', category_id=".$category." 
	  WHERE movie_id=".$movie['movie_id']." ";
	
	   $pdo->exec($sql1);
	 
	   
	 $sql2 = "UPDATE  cast SET cast_name='".$casts."'
	 WHERE movie_id=".$movie['movie_id']." ";
	 
	   $pdo->exec($sql2);
	   $pdo->commit();
	  
	 
	} catch (Exception $e) {
	   $pdo->rollBack();
	   echo "Error: ".$e->getMessage();
	}
}


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
						<li class="menu-item"><a href="index.php">Home</a></li>
						<li class="menu-item"><a href="search.php">Search</a></li>
						<li class="menu-item current-menu-item"><a href="add-movie.php">Add Movie</a></li>
					</ul> <!-- .menu -->
				</div> <!-- .main-navigation -->
				<div class="mobile-navigation"></div>
			</div>
		</header>
		<main class="main-content">
			<div class="container">
				<h1 class="site-title">Modify</h1>
				<form method="post" id="add-movie-form" class="add-movie-form" >

					<!-- BEGIN_ITEMS -->
					<div class="form_table">

						<div class="clear"></div>

						<div id="q0" class="q required">
							<a class="item_anchor" name="ItemAnchor0"></a>
							<label class="question top_question" for="RESULT_RadioButton-0">Choose Category&nbsp;<b class="icon_required"
								 style="color:#FF0000">*</b></label>
							<select id="RESULT_RadioButton-0" name="category" class="drop_down">
								<option></option>
								<option value="1" selected="selected">Comedy</option>
								<option value="2">Romance</option>
								<option value="3">Horror</option>
								<option value="4">Science Fiction</option>
								<option value="5">Action</option>
								<option value="6">Thriller</option>
								<option value="7">Drama</option>
								<option value="8">Mystery</option>
								<option value="9">Crime</option>
								<option value="10">Animation</option>
								<option value="11">Adventure</option>
								<option value="12">Fantasy</option>
								<option value="13">Comedy-Romance</option>
								<option value="14">Action-Comedy</option>
								<option value="15">Superhero</option>
							</select>
						</div>

						<div class="clear"></div>

						<div id="q1" class="q required">
							<a class="item_anchor" name="ItemAnchor1"></a>
							<label class="question top_question" for="title">Movie Title&nbsp;<b class="icon_required" style="color:#FF0000">*</b></label>
							<input type="text" name="title" class="text_field" id="RESULT_TextField-1" placeholder="Movie Title"
							 size="40" maxlength="255" value=<?php echo $movie["title"]; ?>>
						</div>

						<div class="clear"></div>

						<div id="q2" class="q required">
							<a class="item_anchor" name="ItemAnchor2"></a>
							<label class="question top_question" for="year">Year of release&nbsp;<b class="icon_required"
								 style="color:#FF0000">*</b></label>
							<select id="RESULT_RadioButton-2" name="year" class="drop_down">
								<option></option>
								<option value="2018" selected="selected">2018</option>
								<option value="2017">2017</option>
								<option value="2016">2016</option>
								<option value="2015">2015</option>
								<option value="2014">2014</option>
								<option value="2013">2013</option>
								<option value="2012">2012</option>
								<option value="2011">2011</option>
								<option value="2010">2010</option>
								<option value="2009">2009</option>
								<option value="2008">2008</option>
								<option value="2007">2007</option>
								<option value="2006">2006</option>
								<option value="2005">2005</option>
								<option value="2004">2004</option>
								<option value="2003">2003</option>
								<option value="2002">2002</option>
								<option value="2001">2001</option>
								<option value="2000">2000</option>
								<option value="1999">1999</option>
								<option value="1998">1998</option>
								<option value="1997">1997</option>
								<option value="1996">1996</option>
							</select>
						</div>

						<div class="clear"></div>

						<div id="q3" class="q required">
							<a class="item_anchor" name="ItemAnchor3"></a>
							<label class="question top_question" for="RESULT_TextArea-3">Movie Casts&nbsp;<b class="icon_required" style="color:#FF0000">*</b></label>
							<textarea name="casts" class="text_field" id="RESULT_TextArea-3" placeholder="Enter Casts Names"
							 rows="7" cols="50"></textarea>
						</div>

						<div id="q7" class="q required highlight">
							<a class="item_anchor" name="ItemAnchor4"></a>
							<label class="question top_question" for="RESULT_TextField-4">Movie Cover&nbsp;<b class="icon_required" style="color:#FF0000">*</b></label>
							<input type="url" name="cover" class="text_field" id="RESULT_TextField-4" placeholder="Enter Movie Cover URL"
							 size="100" maxlength="255" value="<?php echo $movie["cover"]; ?>">
						</div>

						<div class="clear"></div>

						<div id="q4" class="q">
							<a class="item_anchor" name="ItemAnchor4"></a>
							<label class="question top_question" for="RESULT_TextArea-4">Movie Tags</label>
							<textarea name="tags" class="text_field" id="RESULT_TextArea-4" placeholder="Enter Movie Tags" rows="7"
							 cols="50"></textarea>
						</div>

						<div class="clear"></div>

						<div id="q5" class="q required">
							<a class="item_anchor" name="ItemAnchor5"></a>
							<label class="question top_question" for="RESULT_TextField-5">Movie Url&nbsp;<b class="icon_required" style="color:#FF0000">*</b></label>
							<input type="url" name="url" class="text_field" id="RESULT_TextField-5" placeholder="Enter Movie URL"
							 size="100" maxlength="255" value="<?php echo $movie["imdb_link"]; ?>">
						</div>

						<div class="clear"></div>

						<div id="q6" class="q required">
							<a class="item_anchor" name="ItemAnchor6"></a>
							<label class="question top_question" for="RESULT_TextField-6">Movie Trailer&nbsp;<b class="icon_required" style="color:#FF0000">*</b></label>
							<input type="url" name="trailer" class="text_field" id="RESULT_TextField-6" placeholder="Enter Movie Trailer Youtube URL"
							 size="100" maxlength="255" value="<?php echo $movie["trailer_link"]; ?>">
						</div>
						<div class="clear"></div>
					</div>
					<!-- END_ITEMS -->
					<div class="outside_container">
						<div class="buttons_reverse"><input type="submit" name="Modify" value="Submit" class="submit_button" id="FSsubmit"></div>
					</div>
				</form>
			</div> <!-- .container -->
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