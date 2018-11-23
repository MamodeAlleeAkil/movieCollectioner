<?php

$USER= "root";
$PASSWORD ="1234";
$DSN ="mysql:host=localhost;dbname=movie_collectioner_db";
try {
   $pdo = new PDO($DSN, $USER, $PASSWORD);
} catch (PDOException $e) {
   die("Error ! : " . $e->getMessage());
}

$resultUsers = $pdo->query("SELECT * FROM users");
$users = $resultUsers->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Login'])) { Login(); }
function Login(){
	global $users;
	$username=$_POST["username"]; 
	$password=$_POST["password"];
	foreach($users as $user){
									if ( $user["username"]== $username &&  $user["password"]== $password ){
										echo "<script>window.location = '/movieCollectioner/index.php'</script>";
									}
								}
}
?>

<!DOCTYPE html>
<html>
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
	
  <div class="wrapper">
    <form class="form-signin" method="post">       
      <h2 class="form-signin-heading">Please login</h2>
      <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
    
      <button class="btn btn-lg btn-primary btn-block" name="Login" type="submit">Login</button>   
    </form>
  </div>

</body>

</html>