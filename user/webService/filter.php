<?php 



$mysqli = new mysqli('localhost','root','','goldenhour');
if($mysqli->error){
    die("Greska". $mysqli->error);
}


$proizvodjac = $_POST['proizvodjac'];
$kategorije = $_POST['pol'];




 if(!empty($proizvodjac) && !empty($kategorije) ){
    $filter = $mysqli->query("SELECT * FROM proizvodi WHERE id LIKE '$proizvodjac' AND pol LIKE '$kategorije'");
    if(mysqli_num_rows($filter)>0)
    {
    while($result=$filter->fetch_assoc()){
        echo $output= '
        <div class="col-sm-3 mb-3 mr-4.5 mt-4">
            <div class="card shadow mb-4 bg-white">
                <img src="../admin/images/' . $result['slike'] . '" height="200px" class="card-img-top" alt="' . $result['model'] . '">
                <div class="card-body">
                    <p>    
                        <h5 class="card-title" style="font-weight:bold;">' . $result['model'] . '</h5>
                        <p class="card-sex">Pol:' . $result['pol'] . '</p>
                        <p class="card-text">Cena: ' . $result['cena'] . '.00 €.</p>
                        <a href="productPage.php?id='. base64_encode($result['id']).'" class="btn btn-secondary">Detalji</a>

                    </p>
                </div>
            </div>
        </div>';
        }
    }
}
elseif(!empty($proizvodjac) && empty($kategorije)){
    $filter = $mysqli->query("SELECT * FROM proizvodi WHERE id = '$proizvodjac' ");
    if(mysqli_num_rows($filter)>0)
{
    while($result=$filter->fetch_assoc()){
         echo $output = '
        <div class="col-sm-3 mb-3">
                <div class="card" style="width: 18rem;">
                    <img src="../admin/images/'.$result['slike'].'" height="200px" class="card-img-top" alt="'.$result['model'].'">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight:bold;">'.$result['model'].'</h5>
                        <p class="card-text">Price:'. $result['cena'].'.00 $.</p>
                        <a href="productPage.php?id='.base64_encode($result['id']).'" class="btn btn-secondary">Detalji</a>
                    </div>
                    
                </div>
            </div>
        
        
        ';
    }
}
}
elseif(!empty($kategorije)&& empty($proizvodjac)){
    $filter = $mysqli->query("SELECT * FROM product WHERE kategorija LIKE '$kategorije' ");
    if(mysqli_num_rows($filter)>0)
{
    while($result=$filter->fetch_assoc()){
         echo $output = '
        <div class="col-sm-3 mb-3">
                <div class="card" style="width: 18rem;">
                    <img src="../AdminPage/images/'.$result['prod_images'].'" height="200px" class="card-img-top" alt="'.$result['naziv'].'">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight:bold;">'.$result['naziv'].'</h5>
                        <p class="card-text">Price:'. $result['cena'].'.00 $.</p>
                        <a href="productPage.php?id='.base64_encode($result['productID']).'" class="btn btn-secondary">Detalji</a>
                    </div>
                    
                </div>
            </div>
        
        
        ';
    }
}
}
else {
    echo $output ="";
}



?>