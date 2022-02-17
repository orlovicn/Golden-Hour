<?php

header("Content-type:application/json");
$mysqli = new mysqli('localhost','root','','goldenhour');
if($mysqli->error){
    die("Greska". $mysqli->error);
}

$model = $_POST['model'];
$id = $_POST['id'];
$cena = $_POST['cena'];
$kolicina = $_POST['kolicina'];
$proizvodjac = $_POST['proizvodjac'];
$opis = $_POST['opis'];
$tip = $_POST['tip'];
$pol = $_POST['pol'];

$update = $mysqli->query("UPDATE proizvodi SET model='$model' WHERE id = '$id'");
if($update){
    $response_array['status'] = 'success';  
}
else{
    $response_array['status'] = 'fail'; 
    
}
echo json_encode($response_array);

?>