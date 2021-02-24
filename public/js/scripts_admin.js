$('.summernote').summernote({
  toolbar: [
    ['style', ['bold', 'italic', 'underline','strikethrough', 'superscript', 'clear']],
    ['fontsize', ['fontsize']],
    ['para', ['style','ul', 'ol','paragraph']],
    ['insert', ['link','picture']]
  ],
  minHeight:300,
  lang: 'es-ES',
  callbacks: {
    onPaste: function(e) {
      // console.log('Called event paste');
    },
    onImageUpload: function(files, editor, $editable) {
      sendFile(files[0],editor,$editable);
    } 
  }
});
  
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

//Carga de noticias

$("#guardar_noticia").on("click tap",function() {
  var title = $("input#title").val();
  var body = $("textarea#body").val();
  var lang = $("#lang").val();
  var errores = [];
  if (title == "") {
    errores.push("El campo título es obligatorio");
  }
  if (body == "") {
    errores.push("El campo cuerpo es obligatorio");
  }
  if (title.length>255) {
    errores.push("El campo título tiene una longitud maxima de 255 caracteres");
  }
  if (lang == "") {
    errores.push("Debe seleccionar un idioma para la entrada")
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
    traduccion.show();
  } else {
    traduccion.hide();
  }
};

$(document).ready(function(){
  if ($('#lang').length>0) {
    new SlimSelect({
      select: "#lang",
      showSearch: false
    });
  }

  if ($('#status').length>0) {
    new SlimSelect({
    select: "#status",
    showSearch: false
    });
  }

  if ($('#traduccion_de').length>0) {
    new SlimSelect({
    select: "#traduccion_de",
    showSearch: false
   });
  } 

});

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


