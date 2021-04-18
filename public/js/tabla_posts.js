$(document).ready(function(){
	new SlimSelect({
        select: "#filtro_estado",
        showSearch: false,
    });
    
    new SlimSelect({
    	select: "#filtro_lenguaje",
    	showSearch: false
    });

    new SlimSelect({
    	select: "#filtro_categoria"
    });
});
// $("#filtrar_items").on("click tap",function(){
//     let query_status = $("#filtro_estado").val();
//     let query_lang = $("#filtro_lenguaje").val();
//     let query_cat = $("#filtro_categoria").val();
//     let query_string = $("#query_string").val();
//     console.log(query_status,query_lang,query_cat,query_string);
// });
$("#query_form").on("submit",function(e){
    e.preventDefault();
    var inputs = $("#query_form select, #query_form input").toArray();
    inputs.forEach(function(item, i) {
        if (item.value.length == 0) item.setAttribute('disabled', 'disabled');
    });
    $("#query_form").off().submit();
});