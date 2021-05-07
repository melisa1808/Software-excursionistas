$(document).ready(function(){
    $("#riscos1").change(function () {

        $('#min').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
        
        $("#riscos1 option:selected").each(function () {
            IdRiscos = $(this).val();
            $.post("peso.php", { IdRiscos: IdRiscos }, function(data){
                $("#ps").html(data);
            });            
        });
    })
});

$(document).ready(function(){
    $("#riscos1").change(function () {
        $("#riscos1 option:selected").each(function () {
            IdRiscos = $(this).val();
            $.post("calorias.php", { IdRiscos: IdRiscos }, function(data){
                $("#min").html(data);
            });            
        });
    })
});
//este pertenece a producto 
$(document).ready(function(){
    $("#producto1").change(function () {

        $('#Cp').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
        
        $("#producto1 option:selected").each(function () {
            IdProducto = $(this).val();
            $.post("pesop.php", { IdProducto: IdProducto }, function(data){
                $("#Pp").html(data);
            });            
        });
    })
});

$(document).ready(function(){
    $("#producto1").change(function () {
        $("#producto1 option:selected").each(function () {
            IdProducto = $(this).val();
            $.post("calop.php", { IdProducto: IdProducto }, function(data){
                $("#Cp").html(data);
            });            
        });
    })
});