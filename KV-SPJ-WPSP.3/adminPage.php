<?php 
session_start();
if(!empty($_SESSION['username']))
{
 ?>
<!DOCTYPE html>
<html lang="hr">
<head>
	<meta charset="utf-8">
	<title style="text-align: center">Administracijska stranica</title>
	<script src="assets/plugins/jquery/jquery-3.2.1.min.js"></script>
	<script src="js/angular.min.js"></script>
	<script src="js/angular-route.min.js"></script>
    <link rel="stylesheet" href="assets/plugins/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/app.js"></script>
</head>
<body ng-app="tablice-app">
	<div>
		<h3 style="padding-left: 40px; color: black">Administratorska stranica</h3>	
	</div>

	<td>
		&nbsp;
    </td>

	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<ul class="nav navbar-nav">
				<li><a href="#!/tableVijesti">Vijesti</a></li>
				<li><a href="#!/tableKategorije">Kategorije</a></li>
				<li><a href="#!/tableUsers">Korisnici</a></li>
			</ul>
			<div>
				<form class="navbar-form navbar-right">
					<ul>
						<input type="button" value="Naslovna" onclick="window.location.href='mainPage.php'">
					</ul>
				</form>
			</div>
		</div>
	</nav>

	<div ng-view></div>

	<div class="modal" id="modals" tabindex="-1" role="dialog" aria-labelledby="" aria-hiddeen="true">
		<div class="modal-dialog">
			<div class="modal-content">
			</div>
		</div>
	</div>

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