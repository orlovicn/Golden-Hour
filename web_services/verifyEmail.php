<?php 

header('Content-type: application/json)');
require_once '../config/connection.php';

$email = $_POST['forgotEmail'];

$verifyEmail = $mysqli->query("SELECT * FROM korisnik WHERE email = '$email'");

if(mysqli_num_rows($verifyEmail) > 0)
{
    $response_array['status'] = 'success';
}
else
{
    $response_array['status'] = 'fail';
}

echo json_encode($response_array);

 ?>