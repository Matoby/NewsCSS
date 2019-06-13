<?php 
include "connection.php";
header('Content-type: text/json');
header('Content-type: application/json; charset=utf-8');

$sQueryInsert = "INSERT INTO vijesti (naslov, sadrzaj, kategorija, autor) VALUES (:naslov, :sadrzaj, :kategorija, :autor)";

$oStatement = $oConnection->prepare($sQueryInsert);

$action_id = "";
$vijesti_id = "";
if(!empty($_GET['action_id']))
{
	$action_id = $_GET['action_id'];
}
if (!empty($_GET['vijesti_id'])) 
{
	$vijesti_id = $_GET['vijesti_id'];
}

$oJson = array();

switch ($action_id) 
{
	case 'vijesti':
		$sQuery = "SELECT * FROM kvbaza.vijesti";

		$oRecord = $oConnection->query($sQuery);

		while ($oRow = $oRecord->fetch(PDO::FETCH_BOTH)) 
		{
			$oVijesti = new Vijest(
				$oRow['vijesti_id'],
				$oRow['naslov'],
				$oRow['sadrzaj'],
				$oRow['kategorija'],
				$oRow['autor']
			);
			array_push($oJson, $oVijesti);
		}
		echo json_encode($oJson);
	break;

	case 'dodaj_vijest':
		if(!empty($_POST['naslov']) && !empty($_POST['sadrzaj']) && !empty($_POST['kategorija']) && !empty($_POST['autor']))
		{
			$oData = array(
				'naslov' => $_POST['naslov'],
				'sadrzaj' => $_POST['sadrzaj'],
				'kategorija' => $_POST['kategorija'],
				'autor' => $_POST['autor']);

			$oStatement->execute($oData);

			echo '<div class="modal-header">
					<button type="button" class="close" data-dissmis="modal"></button>
						<h4 class="modal-title" style="color: black">Dodaj vijest</h4>
				</div>
				<br>
				<form class="form-horizontal" action="" method="POST">
					<div class="form-group">
						<label class="control-label col-lg-4 col-xs-4">Naslov</label>
						<div class="col-lg-5 col-xs-5"><input class="form-control" type="text" name="naslov" required></div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-4 col-xs-4">Sadrzaj</label>
						<div class="col-lg-5 col-xs-5"><input class="form-control" type="text" name="sadrzaj" required></div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-4 col-xs-4">Kategorija</label>
						<div class="col-lg-5 col-xs-5"><input class="form-control" type="text" name="kategorija" required></div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-4 col-xs-4">Autor</label>
						<div class="col-lg-5 col-xs-5"><input class="form-control" type="text" name="autor" required></div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-secondary btn-s">Spremi</button>
						<button type="button" class="btn btn-danger btn-s close"</button>
					</div>
				</form>';
			}
		header("Location: adminPage.php");
	break;

	case 'obrisi_vijest':
		$sQueryDelete = "DELETE FROM vijesti WHERE vijesti_id=".$vijesti_id;

		$oStatement = $oConnection->query($sQueryDelete);
		header("Location: adminPage.php");
	break;
}

 ?>