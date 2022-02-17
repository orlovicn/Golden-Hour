<?php 
 header("Content-type:application/json"); 
$mysqli = new mysqli('localhost','root','','goldenhour');
if($mysqli->error){
    die("Greska". $mysqli->error);
}

$proizID = $_POST['IDdel'];

$delete = $mysqli->query("DELETE FROM proizvodi WHERE id ='$proizID'");
if($delete){
    $response_array['status']='success';
    
}
else{
    $response_array['status']='fail';
    
}
 
echo json_encode($response_array);

?>