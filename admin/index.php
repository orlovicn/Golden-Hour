<?php

include_once "templates/headerAdmin.php"; 

session_start(); 

include_once "templates/navAdmin.php"; 

?>

<!-------------- Dodavanje proizvoda -->
<div class="container mt-5 mb-5 fire ch_relative">
    <h3 class="ch_absolute">Proizvodjaci</h3>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-4" id="addProizvodjaciDiv">
            <h4>Dodaj proizvodjaca</h4>
            <hr>
            <form id="ProizvodjacForm">
                <div class="form-group">
                    <label>Dodaj novog proizvodjaca</label>
                    <input type="text" name="addProizvodjac" id="addProizvodjac" class="form-control" placeholder="Unesi Proizvodjaca">
                </div>
            </form>
            <button class="btn fire" id="btnProizvodjac">Submit</button> 
        </div>
        <div class="col-sm-4" id="updateProizvodjaciDiv">
            <h4 id="updateForm">Azuriraj proizvodjaca</h4>
            
        </div>
        <div class="col-sm-8 text-center">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Br.</th>
                        <th scope="col">Naziv</th>
                        <th scope="col">Izmeni</th>
                        <th scope="col">Obrisi</th>
                    </tr>
                </thead>
                <tbody id="proizvodjaciData">
                   
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once "templates/footerAdmin.php"; ?>
