<?php 

$mysqli = new mysqli('localhost', 'root', '', 'goldenhour');
if($mysqli->error){
    die("Greska". $mysqli->error);
}

 ?>