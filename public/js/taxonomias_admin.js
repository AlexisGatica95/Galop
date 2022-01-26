$(".edit_term").on("click tap",function(){
	let id_term = $(this).data("term");
	$(this).closest("form.termino").addClass("editing");
	$("input.input_"+id_term).each(function(){
		$(this).attr("disabled",false);
	});
});
$(".delete_term").on("click tap",function(){
	if (confirm("Eliminar?")) {
		let id_term = $(this).data("term");
		$("form.termino"+id_term+" input[name=action]").val("delete");
		$("form.termino"+id_term).submit();
	}
});
$(".save_term").on("click tap",function(){	
	let id_term = $(this).data("term");
	$("form.termino"+id_term+" input[name=action]").val("edit");
	$("form.termino"+id_term).submit();
	$(".save_term").off();
});