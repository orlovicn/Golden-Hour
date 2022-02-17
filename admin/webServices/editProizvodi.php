<?php

require_once '../config/connection.php';

$id = $_POST['proizvodID'];
$getProizvodjac = $mysqli->query("SELECT * FROM proizvodi WHERE id='$id'");
$finalResult = mysqli_fetch_assoc($getProizvodjac);
if($finalResult){
    echo '  <hr>
            <form id="updateProizvodForm>
                <div class="form-group">
                    <input class="form-control mb-2" id="updateID" value="' . $finalResult['id'].'" type="hidden" name="updateID">
                    <input class="form-control mb-2" id="updateModel" value="'.$finalResult['model'].'" type="text" placeholder="Azurirajte modela" name="updateModel">
                    <select class="form-control mb-2" name="updateTip" id="updateTip">
                        <option >'.$finalResult['tip'].'"</option>
                        <option value="regularni">Regularni</option>
                        <option value="popularni">Popularni</option>
                    </select>
                    <select class="form-control mb-2" name="updatePol" id="updatePol">
                        <option>"'.$finalResult['pol'].'"</option>
                        <option value="M">Muski</option>
                        <option value="Z">Zenski</option>
                    </select>
                    <input class="form-control mb-2" id="updateKolicina" value="'.$finalResult['kolicina'].'" type="text" placeholder="Azurirajte kolicinu" name="updateKolicina">
                    <input class="form-control mb-2" id="updateCena" value="'.$finalResult['cena'].'" type="text" placeholder="Azurirajte cenu" name="updateCena">
                </div>
            </form>
            <button class="btn fire" id="btnUpdateProizvod">Update</button> <button class="btn btn-secondary" id="btnCancelProizvod">Cancel</button>';


?>

<script type="text/javascript">
    jQuery(document).ready(function(){

        jQuery("#btnUpdateLanguage").on('click',function(){

            jQuery.ajax({

                type:'POST',
                url:'WebServices/UpdateTravel.php',
                data:jQuery("#updateLanguageForm").serialize(),
                success:function(result){
                    if(result.status=='success')
                    {
                        setTimeout(function(){
                            Swal.fire("Well done","Successfully updated travel","success");
                        },100);
                        jQuery("#updatetravel1").hide();
                        jQuery("#addtravel1").show();
                    }
                    else if(result.status=='fail')
                    {
                        setTimeout(function(){
                            Swal.fire("Wrong","Something went wrong , nothing is updated!","error");
                        },100);
                    }
                }


            });

        });


    });
</script>