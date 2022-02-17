<?php

header("Content-type:application/json");
$mysqli = new mysqli('localhost','root','','goldenhour');
if($mysqli->error){
    die("Greska". $mysqli->error);
}

$nazivPr = $_POST['updateNaziv'];
$IDpr = $_POST['updateID'];

$update = $mysqli->query("UPDATE proizvodjaci SET naziv='$nazivPr' WHERE id = '$IDpr'");
if($update){
    $response_array['status'] = 'success';  
}
else{
    $response_array['status'] = 'fail'; 
    
}
echo json_encode($response_array);

?>