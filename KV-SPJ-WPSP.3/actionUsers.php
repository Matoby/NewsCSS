<?php 
include "connection.php";
header('Content-type: text/json');
header('Content-type: application/json; charset=utf-8');

$sQueryInsert = "INSERT INTO users (username, password, admin) VALUES (:username, :password, :admin)";

$oStatement = $oConnection->prepare($sQueryInsert);

$action_id = "";
$user_id = "";
if(!empty($_GET['action_id']))
{
	$action_id = $_GET['action_id'];
}

if(!empty($_GET['user_id']))
{
	$user_id = $_GET['user_id'];
}

$oJson = array();

switch ($action_id) 
{
	case 'users':
		$sQuery = "SELECT * FROM kvbaza.users";

		$oRecord = $oConnection->query($sQuery);

		while ($oRow = $oRecord->fetch(PDO::FETCH_BOTH)) 
		{
			$oUsers = new User(
				$oRow['user_id'],
				$oRow['username'],
				$oRow['password'],
				$oRow['admin']
			);
			array_push($oJson, $oUsers);
		}
		echo json_encode($oJson);
	break;

	case 'dodaj_user':
		if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['admin']))
		{
			$oData = array(
				'username' => $_POST['username'],
				'password' => $_POST['password'],
				'admin' => $_POST['admin']);

			$oStatement->execute($oData);

			echo '<div class="modal-header">
					<button type="button" class="close" data-dissmis="modal"></button>
						<h4 class="modal-title" style="color: black">Dodaj korisnika</h4>
				</div>
				<br>
				<form class="form-horizontal" action="" method="POST">
					<div class="form-group">
						<label class="control-label col-lg-4 col-xs-4">Korisničko ime</label>
						<div class="col-lg-5 col-xs-5"><input class="form-control" type="text" name="username" required></div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-4 col-xs-4">Lozinka</label>
						<div class="col-lg-5 col-xs-5"><input class="form-control" type="password" name="password" required></div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-4 col-xs-4">Admin</label>
						<div class="col-lg-5 col-xs-5"><input class="form-control" type="text" name="admin" required></div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-secondary btn-s">Spremi</button>
						<button type="button" class="btn btn-danger btn-s close"</button>
					</div>
				</form>';
		}
	break;

	case 'obrisi_user':
		$sQueryDelete = "DELETE FROM users WHERE user_id=".$user_id;

		$oStatement = $oConnection->query($sQueryDelete);
		header("Location: adminPage.php");
	break;
	
}
 ?>