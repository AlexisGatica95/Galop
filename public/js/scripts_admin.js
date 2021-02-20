$('.summernote').summernote({
    toolbar: [
      ['style', ['bold', 'italic', 'underline','strikethrough', 'superscript', 'clear']],
      ['para', ['ul', 'ol']],
      ['insert', ['link']]
    ],
    minHeight:300,
    lang: 'es-ES',
    callbacks: {
      onPaste: function(e) {
        // console.log('Called event paste');
      }
    }
  });