<?php 

include_once 'templates/headerUser.php';

session_start();

if(isset($_COOKIE['loginMsg']))
{
    echo '<script type="text/javascript">
    setTimeout(function(){
       Swal.fire("Zdravo ' . $_SESSION['user'] . '", " Dobrodosli u Golden Hour","success");
   }, 100)</script>';
}
else
{
    echo "";
}

$mysqli = new mysqli('localhost','root','','goldenhour');
if($mysqli->error){
    die("Greska". $mysqli->error);
}

$userData = $mysqli->query("SELECT * FROM korisnik WHERE ime = '" . $_SESSION['user'] . "'");
$result = $userData->fetch_assoc();

$userName = $_SESSION['user']; 

include_once "templates/navUser.php"; 

?>

<div class="row">
    <div class="col-md-1">

    </div>
    <div class="col-md-10 mt-5">
<!-------------------------------- Karusel -->
        <div id="carouselMoj" class="carousel slide" data-ride="carousel" data-interval="2000">
            <ol class="carousel-indicators">
                <li data-target="#carouselMoj" data-slide-to="0" class="active"></li>
                <li data-target="#carouselMoj" data-slide-to="1"></li>
                <li data-target="#carouselMoj" data-slide-to="2"></li>
                <li data-target="#carouselMoj" data-slide-to="3"></li>
            </ol>
            <!-- Omotač slajdera -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/Carousel/Carousel1.png" class="d-block w-100" style="height:400px;">
                </div>
                <div class="carousel-item">
                    <img src="images/Carousel/Diesel.jpg" class="d-block w-100" style="height:400px;">
                </div>
                <div class="carousel-item">
                    <img src="images/Carousel/Fossil.jpg" class="d-block w-100 " style="height:400px;">
                </div>
                <div class="carousel-item">
                    <img src="images/Carousel/Festina.jpg" class="d-block w-100 " style="height:400px;">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselMoj" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Prethodni</span>
			</a>
			<a class="carousel-control-next" href="#carouselMoj" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Sledeci</span>
			</a>
        </div>
    </div>  
    <div class="col-md-1">

    </div>   
</div>

<div class="row" id="index">
    <div class="col-sm-2">

    </div>
    <div class="col-sm-8">
<!--------------------- Novi proizvodi -->
        <div class="container mt-5 p-1 text-center fire shadow bg-white">
            <h3><strong>Novi proizvodi</strong></h3>
        </div>
        <div class="container mt-5">
            <div class="row">
                <?php 
                    
                $new = $mysqli->query("SELECT * FROM proizvodi WHERE tip ='novi'");
                while($proizvodNew = $new->fetch_assoc()):

                ?>
                <div class="col-sm-3 mb-4">
                    <div class="card shadow mb-4 bg-white">
                        <img src="../admin/images/<?php echo $proizvodNew['slike']?>" height="200px" class="card-img-top" alt="<?php echo $proizvodNew['model']?>">
                        <div class="card-body">
                        <p>    
                            <h5 class="card-title" style="font-weight:bold;"><?php echo $proizvodNew['model']?></h5>
                            <p class="card-sex">Pol: <?php if($proizvodNew['pol']=="M") {echo "Muski";} else { echo "Zenski";} ?></p>
                            <p class="card-text">Cena: <?php echo $proizvodNew['cena']?>.00 €.</p>
                            <a href="productPage.php?id=<?php echo base64_encode($proizvodNew['id'])?>" class="btn btn-secondary fire">Detalji</a>
                        </p>
                        </div>
                    </div>
                </div>
                <?php endwhile ?>
            </div>
        </div>

        <!--------------------- Popularni proizvodi -->
        <div class="container mt-5 p-1 text-center fire shadow bg-white">
            <h3><strong>Popularni proizvodi</strong></h3>
        </div>
        <div class="container mt-5">
            <div class="row">
                <?php 
                
                $new = $mysqli->query("SELECT * FROM proizvodi WHERE tip ='popularni'");
                while($proizvodPop = $new->fetch_assoc()):

                ?>
                <div class="col-sm-3 mb-4">
                    <div class="card shadow mb-4 bg-white">
                        <img src="../admin/images/<?php echo $proizvodPop['slike']?>" height="200px" class="card-img-top" alt="<?php echo $proizvodPop['model']?>">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight:bold;"><?php echo $proizvodPop['model']?></h5>
                            <p class="card-text">Cena: <?php echo $proizvodPop['cena']?>.00 €.</p>
                            <a href="productPage.php?id=<?php echo base64_encode($proizvodPop['id'])?>" class="btn btn-secondary fire">Detalji</a>
                        </div>
                    </div>
                </div>
                <?php endwhile ?>
            </div>
        </div>
    </div>
    <div class="col-sm-2">

    </div>
</div >
<?php include_once 'templates/footerUser.php' ?>
