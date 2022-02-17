<?php 

require_once '../config/connection.php';

$allData = $mysqli->query("SELECT * FROM proizvodi");
$br = 1;
if(mysqli_num_rows($allData) > 0)
{
    while($result = mysqli_fetch_assoc($allData))
    {
        echo '    <tr>
        <th scope="row">'.$br++.'</th>
        
        <td>'.$result['model'].'</td>
        <td>'.$result['pol'].'</td>
        <td>'.$result['kolicina'].'</td>
        <td>'.$result['cena'].'</td>
        <td>'.$result['tip'].'</td>        
        <td><a  href="javascript:void(0)" rel='.$result['id'].' class="editProizvod"><i class="fas fa-edit"></i></i></a></td>
        <td><a  href="javascript:void(0)" rel='.$result['id'].' class="deleteProizvod"><i class="fas fa-trash-alt"></i></a></td>
        </tr>
       ';
    }
}
else
{
    echo "Nema podataka";
}

 ?>
 <script type="text/javascript">
    jQuery(document).ready(function(){

        jQuery(".editProizvod").on('click', function(){
            var id = jQuery(this).attr('rel');
            jQuery("#updateProizvodDiv").show();
            jQuery("#addProizvodDiv").hide();

            jQuery.ajax({
                type: 'POST',
                url: 'webServices/editProizvodi.php',
                data: {proizvodID:id},
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

        jQuery("#btnCancelProizvod").on('click',function(){
            jQuery("#updateProizvodDiv").hide();
            jQuery("#addProizvodDiv").show();
        });
    })
 </script>