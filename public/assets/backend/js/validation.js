$.ajaxSetup({
  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

$('#exilednoname-form').on('submit', function(e){
  e.preventDefault();

  let formData = new FormData(this);
  var progressBar = $('#uploadProgress');
  var bar = progressBar.find('.progress-bar');

  $('#errors').html('');
  $('#success').html('');

  $.ajax({
    xhr: function() {
      var xhr = new window.XMLHttpRequest();
      xhr.upload.addEventListener("progress", function(evt) {
        if (evt.lengthComputable) {
          var percentComplete = Math.round((evt.loaded / evt.total) * 100);
          progressBar.show();
          bar.css('width', percentComplete + '%').text(percentComplete + '%');
        }
      }, false);
      return xhr;
    },

    url: this_url + "/../",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    cache: false,
    beforeSend: function() {
      $('.progress-bar').css('width', '0%').text('0%');
    },
    success: function(res){
      $('.invalid-feedback').remove();
      $('.is-invalid').removeClass('is-invalid');
      if(res.status === 'success'){ window.location.href = res.redirect_url; }
      else if(res.status === 'error'){ window.location.href = res.redirect_url; }
      else { alert(res.message); }
    },
    error: function(xhr){
      if(xhr.status === 422){
        $('.invalid-feedback').remove();
        $('.is-invalid').removeClass('is-invalid');
        let errors = xhr.responseJSON.errors;
        $.each(errors, function(key, value){
          let input = $('[name="'+ key +'"]');
          input.addClass('is-invalid');
          input.after('<div class="invalid-feedback">'+ value[0] +'</div>');
        });
      }
    }
  });
});
