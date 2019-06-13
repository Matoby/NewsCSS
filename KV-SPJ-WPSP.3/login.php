<?php 
include 'connection.php';

$sQuery = 'SELECT * FROM kvbaza.users WHERE username="'.$_POST['username'].'" AND password="'.$_POST['password'].'"';

$oStatement = $oConnection->query($sQuery);
$oData = $oStatement->fetch(PDO::FETCH_ASSOC);
var_dump($oData);

if(!empty($oData['username']))
{
	$oKorisnik = new User ($oData['user_id'], $oData['username'], $oData['password'], $oData['admin']);
		session_start();

	//$_SESSION['user_id'] = $oData['user_id'];
	$_SESSION['username'] = $oKorisnik->username;
	$_SESSION['password'] = $oKorisnik->password;
	$_SESSION['admin'] = $oKorisnik->admin;
	header("Location: mainPage.php");
}
else
{
	echo "<script type='text/javascript'>alert('Netočno korisničko ime ili lozinka'); window.location.href='index.php'</script>";
}

?>