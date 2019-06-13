<?php 
include 'connection.php';
header('Content-type: text/json');
header('Content-type: application/json; charset=utf-8');

$sQueryInsert = "INSERT INTO users (username, password, admin) VALUES (:username, :password, :admin)";

$oStatement = $oConnection->prepare($sQueryInsert);

$action_id = "";
$kategorija_id = "";
if(!empty($_GET['action_id']))
{
	$action_id = $_GET['action_id'];
}

if (!empty($_GET['kategorija_id'])) 
{
	$kategorija_id = $_GET['kategorija_id'];
}

$oJson = array();

switch ($action_id) 
{
	case 'kategorije':
		$sQuery = "SELECT * FROM kvbaza.kategorije";

		$oRecord = $oConnection->query($sQuery);

		while ($oRow = $oRecord->fetch(PDO::FETCH_BOTH)) 
		{
			$oKategorije = new Kategorija(
				$oRow['kategorija_id'],
				$oRow['ime']
			);
			array_push($oJson, $oKategorije);
		}
		echo json_encode($oJson);
	break;

	case 'dodaj_kategoriju':

		if(!empty($_POST['ime']))
		{
			$sQueryInsert = "INSERT INTO kategorije (ime) VALUES ('".$_POST['ime']."')";
			

			$oConnection->query($sQueryInsert);
			//echo $sQueryInsert;
			
		}
		header("Location: adminPage.php");

	break;

	case 'obrisi_vijest':
		$sQueryDelete = "DELETE FROM kategorije WHERE kategorije_id=".$kategorije_id;

		$oStatement = $oConnection->query($sQueryDelete);
		header("Location: adminPage.php");
	break;
}
 ?>