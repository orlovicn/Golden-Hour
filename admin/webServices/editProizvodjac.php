<?php

require_once '../config/connection.php';

$id = $_POST['proizvodjacID'];
$getProizvodjac = $mysqli->query("SELECT * FROM proizvodjaci WHERE id='$id'");
$finalResult = mysqli_fetch_assoc($getProizvodjac);
    echo '<hr>
    <form id="updateProizvodjacForm">
        <div class="form-group">
            <label>Azuriraj proizvodjaca</label>
            <input type="text" name="updateID" value="' . $finalResult['id'] . '" id="updateID" class="form-control" readonly>
            <input type="text" name="updateNaziv" value="' . $finalResult['naziv'] . '" id="updateNaziv" class="form-control">
        </div>
    </form>
    <button class="btn fire" id="btnUpdateProizvodjac">Update</button> <button class="btn btn-secondary" id="btnCancelProizvodjac">Cancel</button> ';


?>

<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery("#btnUpdateProizvodjac").on('click', function(){
        jQuery.ajax({
            type:'POST',
            url:'webServices/updateProizvodjac.php',
            data: jQuery("#updateProizvodjacForm").serialize(),
            success:function(result){
                if(result.status=='success'){
                    setTimeout(function(){
							Swal.fire("Bravo!","Uspesno ste azurirali proizvodjaca!","success");
						},100);	
                }
                else{
                    setTimeout(function(){
							Swal.fire("Greska!","Neuspesno azuriranje proizvodjaca!","error");
						},100);
                } 
            }
        });
    });
});
</script>