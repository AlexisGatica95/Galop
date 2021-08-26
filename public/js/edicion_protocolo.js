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
      select: "#traduccion_de"
      // showSearch: false
     });
    }

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
      $('.summernote').summernote('reset');
      if (typeof post_body !== 'undefined') {
        $('.summernote').summernote('editor.pasteHTML', post_body);
        $('.note-editable p').first().remove();
      }

      function sendFile(file, editor, $Editable) {
        data = new FormData();
        data.append("file", file);
        $.ajax({
          data: data,
          type: "POST",
          url: "/upload/img",
          cache: false,
          contentType: false,
          processData: false,
          success: function(url) {
            // editor.insertImage($Editable, url);
            url = url.replace('../../../public/','/');
            $('.summernote').summernote('insertImage', url);
            console.log(url);
          }
        });
      }
  });

$(".sumar_input").on("click tap", function(){
  $(".bloque_panel.archivos .inputs").append("<div class='file_input'><input type='file' name='adjuntos[]'/><div class='delete'>&times;</div></div>");
});
$(document).on("click tap", ".file_input .delete", function(event){
  $(event.target).closest(".file_input").remove();
});
$(document).on("click tap", ".linked_file .delete", function(event){
  $(event.target).closest(".linked_file").remove();
  $("form").append("<input type='hidden' name='files_borrar[]' value='"+$(event.target).data("id")+"'/>");
});