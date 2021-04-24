$(document).ready(function(){

	new SlimSelect({
        select: "#filtro_permisos",
        showSearch: false,
    	});

});

//creo la query para cuando intento mandar data vacia no se mande 

$("#query_form").on("submit",function(e){
    e.preventDefault();
    var inputs = $("#query_form select, #query_form input").toArray();
    inputs.forEach(function(item, i) {
        if (item.value.length == 0) item.setAttribute('disabled', 'disabled');
    });
    $("#query_form").off().submit();
});

$(".responder_solicitud").on("click tap", function(){
    // let id_user = $(this).data("")
});