<?php include_once 'templates/headerUser.php';?>
<?php
session_start();
$mysqli = new mysqli('localhost','root','','goldenhour');
if($mysqli->error){
    die("Greska". $mysqli->error);
}
 $userName = $_SESSION['user'];

include_once "templates/navUser.php"; 

?>

<div class="container mt-5">
    <div class="col-sm-12" id="productPejdz">
        <?php
        if(isset($_GET['id'])){
            $productGet = base64_decode($_GET['id']);
        }
        $choseProdbyID = $mysqli->query("SELECT * FROM proizvodi WHERE id='$productGet'");
        while($result_proizvod=$choseProdbyID->fetch_assoc()):
            ?>
                <div class="card mb-3 text-center">
                    <image src="../admin/images/<?php echo $result_proizvod['slike']?>" alt="<?php echo $result_proizvod['slike']?>" style="height:500px; width:600px; margin:auto;">
                    <div class="card-body mb-3 text-dark">
                        <h3 class="card-title"><?php echo $result_proizvod['model']?></h3>
                        <p class="card-text" ><strong>Cena: <?php echo $result_proizvod['cena']?>.00 €</strong></p>
                        <p class="card-text"><strong>Dostupna kolicina: <?php echo $result_proizvod['kolicina']?> komada</strong></p>
                        <label for="quantity">Kolicina: </label>
                        <input type="number" id="quantity" name="quantity" min="1" max="25">
                        <button  class="btn btn-primary btnKupi fire" data-id="<?php echo $result_proizvod['id']?>"> Dodaj u korpu</button>
                        <input type="hidden" id="price" name="price" value="<?php echo $result_proizvod['cena']?>">
                        <input type="hidden" id="name" name="name"  value="<?php echo $result_proizvod['model']?>">
                        <input type="hidden" id="hidden_id" name="hidden_id" value="<?php echo $result_proizvod['id']?>">
                        <input type="hidden" id="dostupnaKol" value="<?php echo $result_proizvod['kolicina']?>">
                    </div> 
            </div>
        <?php
        endwhile
        ?>
</div>

<?php include_once 'templates/footerUser.php';?>

