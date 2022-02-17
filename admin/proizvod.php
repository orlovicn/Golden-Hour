<?php 

include_once "templates/headerAdmin.php";

session_start();

$mysqli = new mysqli('localhost','root','','goldenhour');
if($mysqli->error){
    die("Greska". $mysqli->error);
}

if(isset($_POST['addProizvod']))
{
    $proizvodjac = $_POST['selectProizvodjac'];
    $model = $_POST['tbModel'];
    $tip = $_POST['selectTip'];
    $pol = $_POST['selectPol'];
    $kolicina = $_POST['tbKolicina'];
    $cena = $_POST['tbCena'];

    $slika = $_FILES['proizvodSlika']['name'];
    $temp = $_FILES['proizvodSlika']['tmp_name'];
    move_uploaded_file($temp, "images/$slika");

    $sqlInsert = $mysqli->query("INSERT INTO proizvodi(slike, proizvodjac, model, cena, tip, pol, kolicina) VALUES
    ('$slika','$proizvodjac','$model','$cena','$tip','$pol','$kolicina')");
    if($sqlInsert)
    {
       echo '<script type="text/javascript">
		setTimeout(function(){
			Swal.fire("Bravo","Proizvod je dodat!","success");
			},100)
			</script>';
     } 
     else{
        echo '<script type="text/javascript">
		setTimeout(function(){
			Swal.fire("Greska","Neuspesno dodavanje","error");
			},100)
			</script>';
     }
    
}

include_once "templates/navAdmin.php"; 

?>


<!-------------- Dodavanje proizvoda -->
<div class="container mt-5 mb-5 fire ch_relative">
    <h3 class="ch_absolute">Proizvodi</h3>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-4 mb-5" id="addProizvodDiv">
            <h4>Dodaj proizvod</h4>
            <hr>
            <form method="post" id="ProizvodForm" enctype="multipart/form-data">
<!---------------------------------------------- Izaberi proizvodjaca -->
                <div class="form-group mb-3">
                    <select class="form-control" id="selectProizvodjac" name="selectProizvodjac">
                        <option selected value="0">---Izaberi proizvodjaca-----</option>
                        <?php 
                            $getProizvodjaci = $mysqli->query("SELECT * FROM proizvodjaci");
                            while($total = $getProizvodjaci->fetch_assoc()) : 
                        ?>
                        <option value="<?php echo $total['id']; ?>"><?php echo $total['naziv']; ?></option>
                        <?php endwhile ?>
                    </select>
                </div>

<!---------------------------------------------- Izaberi model -->
                <div class="form-group mb-3">
                    <input type="text" class="form-control" id="tbModel" name="tbModel" aria-describedby="emailHelp" placeholder="Unesite ime modela">
                </div>

<!---------------------------------------------- Izaberi sliku -->
                <div class="input-group mb-3">
                        <input type="file" class="form-control" name="proizvodSlika" id="proizvodSlika" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        <!-- <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Upload</button> -->
                </div>

<!---------------------------------------------- Izaberi tip -->
                <div class="form-select mb-3">
                    <select class="form-control" id="selectTip" name="selectTip" aria-label="Default select example">
                    <option selected value="0">---Izaberi tip-----</option>
                        <option value="novi">Novi</option>
                        <option value="popularni">Popularni</option>
                        <option value="regularni">Regularni</option>
                    </select>
                </div>

<!---------------------------------------------- Izaberi pol -->
                <div class="form-select mb-3">
                    <select class="form-control" id="selectPol" name="selectPol" aria-label="Default select example">
                        <option selected value="0">---Izaberi pol-----</option>
                        <option value="M">Muski</option>
                        <option value="Z">Zenski</option>
                    </select>
                </div>

<!---------------------------------------------- Izaberi kolicinu -->
                <div class="form-group mb-3">
                    <input type="text" class="form-control" id="tbKolicina" name="tbKolicina" aria-describedby="emailHelp" placeholder="Unesite kolicinu">
                </div>

<!---------------------------------------------- Izaberi cenu -->
                <div class="input-group mb-3">
                        <input type="text" name="tbCena" id="tbCena" name="tbCena" class="form-control" aria-label="Amount (to the nearest euro)" placeholder="Unesite cenu">
                        <span class="input-group-text">.00</span>
                        <span class="input-group-text">€</span>
                </div>

<!---------------------------------------------- Dugme submit -->
                <div class="form-group mb-5">
                    <button type="submit" name="addProizvod"class="btn btn-block fire">Dodaj</button>
                </div>
                <div class="form-group mb-5">
                    <Input type="hidden"></input>
                </div>
            </form>
        </div>
<!--         <div class="col-md-4" id="updateProizvodDiv">
            <h4 id="updateForm">Azuriraj proizvod</h4>
            
        </div> -->
        <div class="col-sm-8">
        <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Br.</th>
                        <th scope="col">Model</th>
                        <th scope="col">Pol</th>
                        <th scope="col">Kolicina</th>
                        <th scope="col">Cena</th>
                        <th scope="col">Tip</th>
                        <th scope="col">Izmeni</th>
                        <th scope="col">Obrisi</th>
                    </tr>
                </thead>
                <tbody id="proizvodiData">
                   
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once "templates/footerAdmin.php"; ?>
