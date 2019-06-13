<?php 
session_start();
if(!empty($_SESSION['username']))
{
 ?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="utf-8">
    <title>Naslovna</title>
    <script src="assets/plugins/jquery/jquery-3.2.1.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="js/angular-route.min.js"></script>
    <link rel="stylesheet" href="assets/plugins/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/app.js"></script>
</head>
<body ng-app="tablice-app">
	<div class="container-fluid">
			<div class="jumbotron">
				<div class="container text-center">
					<h1>Portal vijesti</h1>
				</div>
			</div>
		<nav class="navbar navbar-default">
  			<div class="container-fluid">
    			<ul class="nav navbar-nav">
      				<li><a href="#!/naslovnaVijesti">Zadnje vijesti</a></li>
      				<li><a href="#!/naslovnaKategorije">Kategorije</a></li>
    			</ul>
    			<div>
    				<?php
    				if($_SESSION['admin'] == "Y")
    				{
    				 ?>
    				
    				<form class="navbar-form navbar-right">
      					<ul>
      						<input type="button" value="Admin. stranica" onclick="window.location.href='adminPage.php'">
      					</ul>
      				</form>
      				<?php  
      				}
      				?>
    			</div>
  			</div>
		</nav>
	</div>

  <div ng-view></div>	

	<script src="assets/plugins/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
}
else
{
	session_destroy();
	session_unset();
	header("Location: index.php");
} 
?>