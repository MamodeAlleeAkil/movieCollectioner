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
				<a href="index.html" id="branding">
					<img src="images/logo.png" alt="" class="logo">
					<div class="logo-copy">
						<h1 class="site-title">Super Movies</h1>
						<small class="site-description">One stop Movie collection!</small>
					</div>
				</a> <!-- #branding -->

				<div class="main-navigation">
					<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
					<ul class="menu">
						<li class="menu-item"><a href="index.html">Home</a></li>
						<li class="menu-item"><a href="search.html">Search</a></li>
						<li class="menu-item current-menu-item"><a href="add-movie.html">Add Movie</a></li>
					</ul> <!-- .menu -->
				</div> <!-- .main-navigation -->
				<div class="mobile-navigation"></div>
			</div>
		</header>
		<main class="main-content">
			<div class="container">
				<h1 class="site-title">Add a Movie</h1>
				<form method="post" id="add-movie-form" class="add-movie-form" action="#" onsubmit="#">

					<!-- BEGIN_ITEMS -->
					<div class="form_table">

						<div class="clear"></div>

						<div id="q0" class="q required">
							<a class="item_anchor" name="ItemAnchor0"></a>
							<label class="question top_question" for="RESULT_RadioButton-0">Choose Category&nbsp;<b class="icon_required"
								 style="color:#FF0000">*</b></label>
							<select id="RESULT_RadioButton-0" name="RESULT_RadioButton-0" class="drop_down">
								<option></option>
								<option value="Radio-0" selected="selected">Action</option>
								<option value="Radio-1">Adventure</option>
								<option value="Radio-2">Comedy</option>
								<option value="Radio-3">Romance</option>
							</select>
						</div>

						<div class="clear"></div>

						<div id="q1" class="q required">
							<a class="item_anchor" name="ItemAnchor1"></a>
							<label class="question top_question" for="RESULT_TextField-1">Movie Title&nbsp;<b class="icon_required" style="color:#FF0000">*</b></label>
							<input type="text" name="RESULT_TextField-1" class="text_field" id="RESULT_TextField-1" placeholder="Movie Title"
							 size="40" maxlength="255" value="">
						</div>

						<div class="clear"></div>

						<div id="q2" class="q required">
							<a class="item_anchor" name="ItemAnchor2"></a>
							<label class="question top_question" for="RESULT_RadioButton-2">Year of release&nbsp;<b class="icon_required"
								 style="color:#FF0000">*</b></label>
							<select id="RESULT_RadioButton-2" name="RESULT_RadioButton-2" class="drop_down">
								<option></option>
								<option value="Radio-0" selected="selected">2018</option>
								<option value="Radio-1">2017</option>
								<option value="Radio-2">2016</option>
								<option value="Radio-3">2015</option>
								<option value="Radio-4">2014</option>
								<option value="Radio-5">2013</option>
								<option value="Radio-6">2012</option>
								<option value="Radio-7">2011</option>
								<option value="Radio-8">2010</option>
							</select>
						</div>

						<div class="clear"></div>

						<div id="q3" class="q required">
							<a class="item_anchor" name="ItemAnchor3"></a>
							<label class="question top_question" for="RESULT_TextArea-3">Movie Casts&nbsp;<b class="icon_required" style="color:#FF0000">*</b></label>
							<textarea name="RESULT_TextArea-3" class="text_field" id="RESULT_TextArea-3" placeholder="Enter Casts Names"
							 rows="7" cols="50"></textarea>
						</div>

						<div id="q7" class="q required highlight">
							<a class="item_anchor" name="ItemAnchor4"></a>
							<label class="question top_question" for="RESULT_TextField-4">Movie Cover&nbsp;<b class="icon_required" style="color:#FF0000">*</b></label>
							<input type="url" name="RESULT_TextField-4" class="text_field" id="RESULT_TextField-4" placeholder="Enter Movie Cover URL"
							 size="100" maxlength="255" value="">
						</div>

						<div class="clear"></div>

						<div id="q4" class="q">
							<a class="item_anchor" name="ItemAnchor4"></a>
							<label class="question top_question" for="RESULT_TextArea-4">Movie Tags</label>
							<textarea name="RESULT_TextArea-4" class="text_field" id="RESULT_TextArea-4" placeholder="Enter Movie Tags" rows="7"
							 cols="50"></textarea>
						</div>

						<div class="clear"></div>

						<div id="q5" class="q required">
							<a class="item_anchor" name="ItemAnchor5"></a>
							<label class="question top_question" for="RESULT_TextField-5">Movie Url&nbsp;<b class="icon_required" style="color:#FF0000">*</b></label>
							<input type="url" name="RESULT_TextField-5" class="text_field" id="RESULT_TextField-5" placeholder="Enter Movie URL"
							 size="100" maxlength="255" value="">
						</div>

						<div class="clear"></div>

						<div id="q6" class="q required">
							<a class="item_anchor" name="ItemAnchor6"></a>
							<label class="question top_question" for="RESULT_TextField-6">Movie Trailer&nbsp;<b class="icon_required" style="color:#FF0000">*</b></label>
							<input type="url" name="RESULT_TextField-6" class="text_field" id="RESULT_TextField-6" placeholder="Enter Movie Trailer Youtube URL"
							 size="100" maxlength="255" value="">
						</div>
						<div class="clear"></div>
					</div>
					<!-- END_ITEMS -->
					<div class="outside_container">
						<div class="buttons_reverse"><input type="submit" name="Submit" value="Submit" class="submit_button" id="FSsubmit"></div>
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