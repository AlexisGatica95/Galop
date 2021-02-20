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