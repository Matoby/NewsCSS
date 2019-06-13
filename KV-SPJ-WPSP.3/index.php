<!DOCTYPE html>
<html lang="hr">
<head>
	<meta charset="utf-8">
	<title>Prijava</title>
	<script src="assets/plugins/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="assets/plugins/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container text-center">
		<div class="jumbotron">
			<h2>Prijava u sustav</h2>
		</div>
	</div>
	<div class="loginbox">
		<form class="form-horizontal" action="login.php" method="POST">
			<div class="form-group">
				<label style="color:white" class="control-label col-lg-4 col-xs-4">Korisničko ime</label>
				<div class="col-lg-5 col-xs-5">
					<input class="form-control" type="text" name="username" required="">
				</div>
			</div>
			<div class="form-group">
				<label style="color:white" class="control-label col-lg-4 col-xs-4">Lozinka</label>
				<div class="col-lg-5 col-xs-5">
					<input class="form-control" type="password" name="password" required="">
				</div>
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-secondary btn-lg">Prijava</button>
			</div>
		</form>
	</div>
</body>
</html>