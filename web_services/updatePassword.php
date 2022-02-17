<?php 

header('Content-type: application/json');
require_once '../config/connection.php';

$email= $_POST['forgotEmail'];
$password = $_POST['forgotPassword'];

$update =  $mysqli->query("UPDATE korisnik SET sifra='$password' WHERE email='$email'");
if($update)
{
	$response_array['status'] = 'success';

}
else 
{ 
	$response_array['status'] = 'fail';

}
echo json_encode($response_array);

?>
