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
        try {
          $('.summernote').summernote('editor.pasteHTML', post_body);
          $('.note-editable p').first().remove();
        } catch (e) {
          //console.error('no hay body');
          // expected output: ReferenceError: nonExistentFunction is not defined
          // Note - error messages will vary depending on browser
        }
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

  const picker = new Litepicker({ 
    element: document.getElementById('litepicker'),
    inlineMode: true,
    lang: "es-ES",
    singleMode: true,
    setup: (picker) => {
      picker.on('selected', (date1) => {
        fecha_evento = true;
        
        console.log(date1);
        date1 = date1.dateInstance;
        date1.setHours(date1.getHours() + 4);
        let fecha = date1.toISOString().slice(0, 19).replace('T', ' ');
        $("input[name=fecha]").val(fecha);
      });
    },
  });

  if (typeof post_date !== 'undefined') {
    picker.setDate(post_date);
    picker.gotoDate(post_date);
  }