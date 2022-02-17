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

<!-- ---------------------------------------------------contact page body -->

<div class="container mt-5" id="kontakt">
    <div class="row">
        <div class="page-header mx-auto mb-sm-4 mt-n4 text-center">
            <h1 style="text-shadow: 3px 3px orange">Prodavnice u Beogradu</h1>
        </div>
        <div class="row">
            <!-- ----left content -->
            <div class="col-md-6">
                <h2 class="mt-3" style="font-size: 35px; font-weight: 600;">Knez Mihajlova</h2>
                <hr>
                <p><strong>Adresa:</strong><br>Knez Mihajlova 47</p>	
                <p><strong>Radno vreme:</strong><br>Ponedeljak-Petak: 08h-22h<br>Subota: 10h-22h<br>Nedelja: Ne radimo</p>
                <p><strong>Kontakt:</strong><br>Broj telefona: +381 11-2222-333 , +381 11-4444-555<br>E-mail:<strong> goldenhour@gmail.com</strong></p>	
            </div>
            <!-- ------right content -->
            <div class="col-md-6">
                <img src="images/OnamaIKontakt/beograd.jpg" class="rounded mx-auto d-block mt-3" alt="Knez Mihajlova">
            </div>
        </div>
        <div class="row">
            <!-- ----left content -->
            <div class="col-md-6">
                <h2 class="mt-5" style="font-size: 35px; font-weight: 600;">Usce Shopping Center</h2>
                <hr>
                <p><strong>Adresa:</strong><br>Bulevar Mihajla Pupina 4 </p>	
                <p><strong>Radno vreme:</strong><br>Ponedeljak-Petak: 08h-22h<br>Subota: 10h-22h<br>Nedelja: Ne radimo</p>
                <p><strong>Kontakt:</strong><br>Broj telefona: +381 11-2222-333 , +381 11-4444-555<br>E-mail:<strong> goldenhour@gmail.com</strong></p>	
            </div>
            <!-- ------right content -->
            <div class="col-md-6">
                <img src="images/OnamaIKontakt/usce.jpg" height="350px" width="600px" class="rounded mx-auto d-block mt-5" alt="Usce Shopping Center">
            </div>
        </div>
        <div class="row">
            <!-- ----left content -->
            <div class="col-md-6 mb-5">
                <h2 class="mt-5" style="font-size: 35px; font-weight: 600;">Galerija Beograd</h2>
                <hr>
                <p><strong>Adress:</strong><br>Bulevar Vudroa Vilsona 12</p>	
                <p><strong>Radno vreme:</strong><br>Ponedeljak-Petak: 08h-22h<br>Subota: 10h-22h<br>Nedelja: Ne radimo</p>
                <p><strong>Kontakt:</strong><br>Broj telefona: +381 11-2222-333 , +381 11-4444-555<br>E-mail:<strong> goldenhour@gmail.com</strong></p>	
            </div>
            <!-- ------right content -->
            <div class="col-md-6 mb-5">
                <img src="images/OnamaIKontakt/galerijabg.jpg" height="350px" width="600px" class="rounded mx-auto d-block mt-5" alt="Galerija">
            </div>
        </div>
    </div>
</div>
<?php include_once 'templates/footerUser.php'; ?>