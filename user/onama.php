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
<div class="container mt-5">
    <div class="row" id="onama">
        <div class="page-header mx-auto mb-sm-4 mt-n4 text-center">
            <h1 style="text-shadow: 3px 3px orange">O nama </h1>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <p class="text-justify">
                <strong>Lorem ipsum</strong> dolor sit, amet consectetur adipisicing elit. 
                Doloribus dicta ad ducimus veniam quos quas repudiandae 
                ratione id dolorum saepe, <small>recusandae</small>, velit deleniti 
                maiores repellendus dolore quae? Illo, quo tenetur.
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. <mark>Aldus PageMaker</mark>
                Aut ullam aliquam nobis illum ad perferendis eaque sunt 
                <em>exercitationem,</em> voluptatem, quasi soluta veniam. Quae, 
                dignissimos. In temporibus eaque blanditiis sit ex! 
                <strong>Lorem ipsum</strong> dolor sit amet consectetur adipisicing elit. 
                Pariatur rerum, necessitatibus officia facilis quos corrupti 
                asperiores id qui harum. Enim suscipit maiores quae aliquam, 
                deserunt similique. <i>Debitis</i> amet minus repellat.
                Lorem ipsum dolor sit, amet consectetur <small>adipisicing</small> elit. 
                Doloribus dicta ad ducimus veniam quos quas repudiandae 
                ratione id dolorum saepe, recusandae, velit deleniti 
                maiores repellendus dolore quae? Illo, quo tenetur.
                <strong>Lorem ipsum</strong> dolor sit amet consectetur adipisicing elit. 
                Aut ullam aliquam nobis illum ad perferendis eaque sunt 
                exercitationem, voluptatem, quasi soluta veniam. Quae, 
                dignissimos. In temporibus eaque <u>blanditiis</u>
                <p class="lead text-center"> VREME JE NOVAC</p>
                <blockquote class="p-2 fire">
                    <p> Time is more valuable than money. You can get more money, but you cannot get more time.</p>
                    <small><cite title="Aristotel">Jim Rohn</cite></small>
                </blockquote>  
            </div>
            <div class="col-md-6 mb-4">
                <img src="images/OnamaIKontakt/backgroundonama.jpg" alt="backgroundonama" class="img-thumbnail">
            </div>
        </div>
    </div> 
</div>
<?php include_once 'templates/footerUser.php' ?>
