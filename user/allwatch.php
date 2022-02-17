<?php 

include_once 'templates/headerUser.php';

session_start();

$mysqli = new mysqli('localhost','root','','goldenhour');
if($mysqli->error){
    die("Greska". $mysqli->error);
}

$userData = $mysqli->query("SELECT * FROM korisnik WHERE ime = '" . $_SESSION['user'] . "'");
$result = $userData->fetch_assoc();

include_once "templates/navUser.php"; 

?>

<!--------------------- Pocetak strane -->
<div class="row">
    <div class="col-sm-2">

    </div>
    <div class="col-sm-8" id="allwatch">
        <div class="page-header mt-4 mb-4 text-center">
            <h1 style="text-shadow: 3px 3px orange">Svi proizvodi </h1>
        </div>
        <div class="row">
            <?php

            $allProd= $mysqli->query("SELECT * FROM proizvodi ");
            while($result_proizvod=$allProd->fetch_assoc()):
                ?>
                <div class="col-sm-3 mb-3 mr-4.5">
                    <div class="card shadow mb-4 bg-white">
                        <img src="../admin/images/<?php echo $result_proizvod['slike']?>" height="200px" class="card-img-top" alt="<?php echo $result_proizvod['model']?>">
                        <div class="card-body">
                            <p>    
                                <h5 class="card-title" style="font-weight:bold;"><?php echo $result_proizvod['model']?></h5>
                                <p class="card-sex">Pol: <?php if($result_proizvod['pol']=="M") {echo "Muski";} else { echo "Zenski";} ?></p>
                                <p class="card-amount">Preostalo jos: <?php echo $result_proizvod['kolicina'] ?></p>
                                <p class="card-text">Cena: <?php echo $result_proizvod['cena']?>.00 €.</p>
                                <a href="productPage.php?id=<?php echo base64_encode($result_proizvod['id'])?>" class="btn btn-secondary fire">Detalji</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endwhile ?>
        </div>
    </div>
    <div class="col-sm-2">

    </div>
</div>
<?php include_once 'templates/footerUser.php' ?>


