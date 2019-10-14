jQuery(document).ready(function($){
  var mediaUploader;
  $('#upload_image_button').click(function(e) {
    e.preventDefault();
      if (mediaUploader) {
      mediaUploader.open();
      return;
    }
    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Selecione uma imagem',
      button: {
      text: 'Selecione uma imagem'
    }, multiple: false });
    mediaUploader.on('select', function() {
      var attachment = mediaUploader.state().get('selection').first().toJSON();
      $('#eschema_logo').val(attachment.url);
      $('#eschema_logo').attr('value', attachment.url);
      $('.img_thumb').attr('src', attachment.url);
    });
    mediaUploader.open();
  });
});