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

<div class="row">
    <div class="col-sm-2">
    
    </div>
    <div class="col-sm-8" id="zene">
        <div class="page-header mt-4 text-center">
            <h1 style="text-shadow: 3px 3px orange">Zenski proizvodi</h1>
        </div>
        <!--------------------- Rolex -->
        <div class="container mt-4 text-center fire">
            <h3><strong>Rolex</strong></h3>
        </div>
        <div class="container mt-5">
            <div class="row">
                <?php 
                
                $new = $mysqli->query("SELECT * FROM proizvodi WHERE proizvodjac ='1' AND pol = 'Z'");
                while($proizvodNew = $new->fetch_assoc()):

                ?>
                <div class="col-sm-3 mb-4">
                    <div class="card shadow mb-4 bg-white">
                        <img src="../admin/images/<?php echo $proizvodNew['slike']?>" height="200px" class="card-img-top" alt="<?php echo $proizvodNew['model']?>">
                        <div class="card-body">
                        <p>    
                            <h5 class="card-title" style="font-weight:bold;"><?php echo $proizvodNew['model']?></h5>
                            <p class="card-amount">Preostalo jos: <?php echo $proizvodNew['kolicina'] ?></p>
                            <p class="card-text">Cena: <?php echo $proizvodNew['cena']?>.00 €.</p>
                            <a href="productPage.php?id=<?php echo base64_encode($proizvodNew['id'])?>" class="btn btn-secondary fire">Detalji</a>
                        </p>
                        </div>
                    </div>
                </div>
                <?php endwhile ?>
            </div>
        </div>

        <!--------------------- Diesel -->
        <div class="container mt-4 text-center fire">
            <h3><strong>Diesel</strong></h3>
        </div>
        <div class="container mt-5">
            <div class="row">
                <?php 
                
                $new = $mysqli->query("SELECT * FROM proizvodi WHERE proizvodjac ='2' AND pol = 'Z'");
                while($proizvodNew = $new->fetch_assoc()):

                ?>
                <div class="col-sm-3 mb-4">
                    <div class="card shadow mb-4 bg-white">
                        <img src="../admin/images/<?php echo $proizvodNew['slike']?>" height="200px" class="card-img-top" alt="<?php echo $proizvodNew['model']?>">
                        <div class="card-body">
                        <p>    
                            <h5 class="card-title" style="font-weight:bold;"><?php echo $proizvodNew['model']?></h5>
                            <p class="card-amount">Preostalo jos: <?php echo $proizvodNew['kolicina'] ?></p>
                            <p class="card-text">Cena: <?php echo $proizvodNew['cena']?>.00 €.</p>
                            <a href="productPage.php?id=<?php echo base64_encode($proizvodNew['id'])?>" class="btn btn-secondary fire">Detalji</a>
                        </p>
                        </div>
                    </div>
                </div>
                <?php endwhile ?>
            </div>
        </div>

        <!--------------------- Fossil -->
        <div class="container mt-4 text-center fire">
            <h3><strong>Fossil</strong></h3>
        </div>
        <div class="container mt-5">
            <div class="row">
                <?php 
                
                $new = $mysqli->query("SELECT * FROM proizvodi WHERE proizvodjac ='3' AND pol = 'Z'");
                while($proizvodNew = $new->fetch_assoc()):

                ?>
                <div class="col-sm-3 mb-4">
                    <div class="card shadow mb-4 bg-white">
                        <img src="../admin/images/<?php echo $proizvodNew['slike']?>" height="200px" class="card-img-top" alt="<?php echo $proizvodNew['model']?>">
                        <div class="card-body">
                        <p>    
                            <h5 class="card-title" style="font-weight:bold;"><?php echo $proizvodNew['model']?></h5>
                            <p class="card-amount">Preostalo jos: <?php echo $proizvodNew['kolicina'] ?></p>
                            <p class="card-text">Cena: <?php echo $proizvodNew['cena']?>.00 €.</p>
                            <a href="productPage.php?id=<?php echo base64_encode($proizvodNew['id'])?>" class="btn btn-secondary fire">Detalji</a>
                        </p>
                        </div>
                    </div>
                </div>
                <?php endwhile ?>
            </div>
        </div>

        <!--------------------- Festina -->
        <div class="container mt-4 text-center fire">
            <h3><strong>Festina</strong></h3>
        </div>
        <div class="container mt-5">
            <div class="row">
                <?php 
                
                $new = $mysqli->query("SELECT * FROM proizvodi WHERE proizvodjac ='4' AND pol = 'Z'");
                while($proizvodNew = $new->fetch_assoc()):

                ?>
                <div class="col-sm-3 mb-4">
                    <div class="card shadow mb-4 bg-white">
                        <img src="../admin/images/<?php echo $proizvodNew['slike']?>" height="200px" class="card-img-top" alt="<?php echo $proizvodNew['model']?>">
                        <div class="card-body">
                        <p>    
                            <h5 class="card-title" style="font-weight:bold;"><?php echo $proizvodNew['model']?></h5>
                            <p class="card-amount">Preostalo jos: <?php echo $proizvodNew['kolicina'] ?></p>
                            <p class="card-text">Cena: <?php echo $proizvodNew['cena']?>.00 €.</p>
                            <a href="productPage.php?id=<?php echo base64_encode($proizvodNew['id'])?>" class="btn btn-secondary fire">Detalji</a>
                        </p>
                        </div>
                    </div>
                </div>
                <?php endwhile ?>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
    
    </div>
</div>
<?php include_once 'templates/footerUser.php' ?>
