<?php 
include 'connection.php';

$modal_id = "";
$kategorija_id = "";
$vijesti_id = "";
if (!empty($_GET['modal_id'])) 
{
	$modal_id = $_GET['modal_id'];
}

if (!empty($_POST['modal'])) 
{
	$modal_id = $_POST['modal'];
}

if (!empty($_GET['kategorija_id'])) 
{
	$kategorija_id = $_GET['kategorija_id'];
}

if (!empty($_GET['vijesti_id'])) 
{
	$vijesti_id = $_GET['vijesti_id'];
}

switch ($modal_id) 
{
	case 'dodaj_kategoriju':
		echo '<div class="modal-header">
					<button type="button" class="close" data-dissmis="modal" aria-hidden="true"></button>
						<h4 class="modal-title" style="color: black">Dodaj kategoriju</h4>
				</div>
				<div class="modal-body">
				<form class="form-horizontal" action="actionKategorije.php" method="POST">
					<input type="hidden" name="action_id" value="dodaj_kategoriju">
				
					<div class="form-group">
						<label class="control-label col-lg-4 col-xs-4">Ime kategorije</label>
						<div class="col-lg-5 col-xs-5"><input class="form-control" type="text" name="ime" required></div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-secondary btn-s">Spremi</button>
						<button type="button" class="btn btn-danger btn-s close">Odustani</button>
					</div>
				</form>
				</div>';
		break;
	
	default:
		# code...
		break;
}

 ?>