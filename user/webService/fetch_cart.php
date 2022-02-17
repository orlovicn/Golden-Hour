<?php 

session_start();

$output='';
$total =0;
$output .='<table class="table table-bordered">
        <thead><tr><td>Model</td><td>Cena</td><td>Kolicina</td><td>Akcija</td></tr></thead>
    ';
if(!empty($_SESSION['cart'])){
    
    foreach($_SESSION['cart'] as $key=> $value){
        $output .='
            <tr>
                <td>'.$value['p_name'].'</td><td>'.($value['p_price'] * $value['p_qty']).'.00 $</td><td>'.$value['p_qty'].'</td><td><button value="'.$value['p_id'].'" class="btn btn-danger deleteItem">Obrisi</button></td>
            </tr>
        ';
        $total = $total + ($value['p_price'] * $value['p_qty']);
    }
    $output .='</table>';
    $output .='<div class="text-center"><b>Ukupno: '.$total.'.00 €</b></div>';
}
else{
    $output .='<tr>
       <td colspan="5" align="center">Korpa je prazna!</td>
    </tr>';
   }
   $output .='</table></div>';
   
echo $output;


?>