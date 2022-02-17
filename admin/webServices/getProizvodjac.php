<?php 

require_once '../config/connection.php';

$allData = $mysqli->query("SELECT * FROM proizvodjaci");
$br = 1;
if(mysqli_num_rows($allData) > 0)
{
    while($result = mysqli_fetch_assoc($allData))
    {
        echo '<tr>
                <td>' . $br++ . '</td>
                <td>' . $result['naziv'] . '</td>
                <td><a href="javascript:void(0)" rel=' . $result['id'] . ' class="edit"><i class="fas fa-edit "></i></a></td>
                <td><a href="javascript:void(0)" rel=' . $result['id'] . ' class="delete"><i class="fas fa-trash-alt "></i></td>
              </tr>';
    }
}
else
{
    echo "Nema podataka";
}

 ?>
 <script type="text/javascript">
    jQuery(document).ready(function(){

        jQuery(".edit").on('click', function(){
            var id = jQuery(this).attr('rel');
            jQuery("#updateProizvodjaciDiv").show();
            jQuery("#addProizvodjaciDiv").hide();

            jQuery.ajax({
                type: 'POST',
                url: 'webServices/editProizvodjac.php',
                data: {proizvodjacID:id},
                success: function(result){
                    jQuery("#updateForm").html(result);
                }
            });
        });

        jQuery(".delete").on('click',function(){
        var DeleteID = jQuery(this).attr('rel');
        jQuery.ajax({
            type:'POST',
            url:'webServices/deleteProizvodjac.php',
            data:{IDdel:DeleteID},
            success:function(result){
                if(result.status=='success')
                {
                    setTimeout(function(){
                        Swal.fire("Greska!","Neuspesno brisanje!","error");
						},100);
                }
                else
                {
                    setTimeout(function(){
                        Swal.fire("Bravo!","Uspesno ste izbrisali proizvodjaca!","success");
						},100);
                }
            }  
            
        });
    });

        jQuery("#btnCancelProizvodjac").on('click',function(){
            jQuery("#updateProizvodjaciDiv").hide();
            jQuery("#addProizvodjaciDiv").show();
        });
    })
 </script>