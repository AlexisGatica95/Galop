$(".edit_term").on("click tap",function(){
	let id_term = $(this).data("term");
	$("input.input_"+id_term).each(function(){
		$(this).attr("disabled",false);
	});
});
$(".delete_term").on("click tap",function(){
	if (confirm("Desea borrar esto postis?")) {
		let id_term = $(this).data("term");
		$("form.termino"+id_term+" input[name=action]").val("delete");
		$("form.termino"+id_term).submit();
	}
});