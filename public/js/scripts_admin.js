function sendFile(file,editor,welEditable) {
  data = new FormData();
  data.append("file", file);
  $.ajax({
    url: "uploader.php",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    type: 'POST',
    success: function(data){
      alert(data);
      $('.summernote').summernote("insertImage", data, 'filename');
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus+" "+errorThrown);
    }
  });
}

$(".modbtn").click(function(){
  var nmodal = $(this).attr("data-open");
  $("#"+nmodal).css("display","flex");
});
$(".mod-close").click(function(){
  var nmodal = $(this).attr("data-close");
  $("#"+nmodal).css("display","none");
});
$(".mod-w").click(function(e){
  var targetClasses = e.target.className;
  if (targetClasses.indexOf("mod-w") >= 0) {
    var nmodal = $(this).attr("id");
    $("#"+nmodal).css("display","none");
  }
});

//Carga de noticias
let fecha_evento = false;

$("#guardar_noticia").on("click tap",function() {
  var title = $("input#title").val();
  var body = $("textarea#body").val();
  var lang = $("#lang").val();
  var errores = [];
  if (title == "") {
    errores.push("El campo título es obligatorio");
  }
  if (body == "" || body == "<p><br></p>") {
    errores.push("El campo cuerpo es obligatorio");
  }
  if (title.length>255) {
    errores.push("El campo título tiene una longitud maxima de 255 caracteres");
  }
  if (lang == "") {
    errores.push("Debe seleccionar un idioma para la entrada")
  }
  if (!fecha_evento) {
    errores.push("Debe seleccionar la fecha del evento")
  }
  if(errores.length>0){
    let html = "<ul>";
    for (let i = 0; i < errores.length; i++) {
      html = html + "<li>"+errores[i]+"</li>";
    }
    html = html + "</ul>";
    $(".errors").html(html);
  } else {
    $("#nueva_noticia").trigger("submit");
  }
});

// function traduccionDe(){
//   var checkbox = $("#es_traduccion");
//   var traduccion = $(".traduccion");

//   if (checkbox[0].checked){
//     traduccion[0].style.display = "block";
//   } else {
//    traduccion[0].style.display = "none";
//   }
// }

function traduccionDe(){
  var checkbox = $("#es_traduccion");
  var traduccion = $(".traduccion");

  if (checkbox.prop("checked")){
    traduccion.show("fast");
  } else {
    traduccion.hide("fast");
  }
};

$(".dropdown>span").on("click tap",function(){
  var hijo = $(this).closest(".dropdown").find(".dropdown_content");
  var abierto;
  if ($(hijo).css("display") == "block") {
    abierto = true;
  } else {
    abierto = false;
  }
  $(".dropdown_content").slideUp();
  if (!abierto) {
    $(hijo).toggle(340);
  }  
});


$("#toggler").on("click tap",function(){
    $(".menu_barra").toggle();
});

$(document).on("click",".acc_btn, .acc_head[data-toggle]",function(){
    var cont = $(this).data('toggle');
    $("#"+cont).slideToggle();
});