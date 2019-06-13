<?php 
include 'classes.php';
$oConfig = new Configuration('localhost', 'kvbaza', 'root', '');

/*try
{*/
	$oConnection = new PDO("mysql:host=$oConfig->host;dbName=$oConfig->dbName", $oConfig->username, $oConfig->password);
	$oConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	/*echo 'Connected';
}

catch (PDOException $pe)
{
	echo 'Unable to connect to the database';
	
}*/

 ?>