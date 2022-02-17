<?php

$mysqli = new mysqli('localhost','root','','goldenhour');
if($mysqli->error){
    die("Greska". $mysqli->error);
}

$mainKey = $_POST['mainKey'];


$sqlResult = $mysqli->query("SELECT * FROM proizvodi WHERE model LIKE '%$mainKey%'");
if(mysqli_num_rows($sqlResult)>0){
    while($result = $sqlResult->fetch_assoc()){
        $output = '
        <div class="col-sm-3 mb-3 mr-4.5 mt-4">
            <div class="card shadow mb-4 bg-white">
                <img src="../admin/images/' . $result['slike'] . '" height="200px" class="card-img-top" alt="' . $result['model'] . '">
                <div class="card-body">
                    <p>    
                        <h5 class="card-title" style="font-weight:bold;">' . $result['model'] . '</h5>
                        <p class="card-sex">Pol:' . $result['pol'] . '</p>
                        <p class="card-text">Cena: ' . $result['cena'] . '.00 €.</p>
                        <a href="productPage.php?id='.base64_encode($result['id']).'" class="btn btn-secondary">Detalji</a>

                    </p>
                </div>
            </div>
        </div>';
    }
}
else{
    $output ='';
}

echo $output;

?>