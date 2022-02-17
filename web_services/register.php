<?php 

header('Content-type: application/json)');
require_once '../config/connection.php';

$ime = $_POST['regIme'];
$email = $_POST['regEmail'];
$pass = $_POST['regPass'];

$emailVerify = $mysqli->query("SELECT * FROM korisnik WHERE email = '$email'");
if(mysqli_num_rows($emailVerify) > 0)
{
	$response_array['status'] = 'fail';
}
else
{
	$sql_insert = $mysqli->query("INSERT INTO korisnik(role, ime, email, sifra) VALUES('user','$ime', '$email', '$pass')");
	if($sql_insert)
	{
		$response_array['status'] = 'success';
	}
}

echo json_encode($response_array);

?>