jQuery(document).ready(function(){

//------------------------Root elements
setInterval(function() {
    getData();
}, 1000)

jQuery("#updateProizvodjaciDiv").hide();

//------------------------Dodavanje novog proizvodjaca
    jQuery("#btnProizvodjac").on('click',function() {
        var proizvodjac = jQuery("#addProizvodjac").val();

        if(proizvodjac == "")
        {
            alert("Unesi proizvodjaca");
        }
        else
        {

//--------------------------Ajax za dodavanje novog proizvodjaca
            jQuery.ajax({
                type: 'POST',
                url: 'webServices/dodajProizvodjac.php',
                data: jQuery("#ProizvodjacForm").serialize(),
                success: function(result) {
                    if(result.status=='success')
                    {
                    setTimeout(function(){
                        Swal.fire("Bravo!","Uspesno ste dodali proizvodjaca","success");
						},100);
                        jQuery("#ProizvodjacForm")[0].reset();
                    }
                    else
                    {
                    setTimeout(function(){
                        Swal.fire("Greska!","Proizvodjac vec postoji!","error");
						},100);
                    }
                }
            });
        }
    });

//------------------------------Uzimanje podataka
    function getData() {

 //------------------------Ajax
        jQuery.ajax({
            type: 'POST',
            url: 'webServices/getProizvodjac.php',
            success: function(result) {
                jQuery("#proizvodjaciData").html(result);
            }
        });
        jQuery.ajax({
            type: 'POST',
            url: 'webServices/getProizvodi.php',
            success: function(result) {
                jQuery("#proizvodiData").html(result);
            }
        })
    }
});
