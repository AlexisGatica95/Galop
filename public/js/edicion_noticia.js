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
          // onImageUpload: function(files, editor, $editable) {
          //   // sendFile(files[0],editor,$editable);
          // } 
        }
      });
      $('.summernote').summernote('reset');
      $('.summernote').summernote('editor.pasteHTML', post_body);
      $('.note-editable p').first().remove();
  });


