 $(function() {
     $('.categorystatus').change(function() {
         var status = $(this).prop('checked') == true ? 1 : 0;
         var id = $(this).data('id');


         $.ajax({
             type: "GET",
             dataType: "json",
             url: chategoryStatus,
             data: { 'status': status, 'id': id },
             success: function(data) {
                 console.log(data.status)
                 if (status == 1) {
                     $('.text-' + id).html('Active');
                     $('.text-' + id).removeClass("text-theme-6");
                     $('.text-' + id).addClass("text-theme-9");
                     $('.text-' + id).attr('checked', 1);
                 } else {
                     $('.text-' + id).html('InActive');
                     $('.text-' + id).removeClass("text-theme-9");
                     $('.text-' + id).addClass("text-theme-6");
                     $('.text-' + id).attr('unchecked', 0);
                 }
             },
             error: function(error) {

             }

         });

     })
 });
 $('#myselect').select2({
    width: '100%',
    placeholder: "Select an Option",
    allowClear: true
  });
  $('#summernote').summernote({
    height: 400,
    toolbar: [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
      ]
});

var dropzone = new Dropzone('#demo-upload', {
    // previewTemplate: document.querySelector('#preview-template').innerHTML,
    parallelUploads: 2,
    thumbnailHeight: 120,
    thumbnailWidth: 120,
    maxFilesize: 3,
    filesizeBase: 1000,
    thumbnail: function(file, dataUrl) {
      if (file.previewElement) {
        file.previewElement.classList.remove("dz-file-preview");
        var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
        for (var i = 0; i < images.length; i++) {
          var thumbnailElement = images[i];
          thumbnailElement.alt = file.name;
          thumbnailElement.src = dataUrl;
        }
        setTimeout(function() { file.previewElement.classList.add("dz-image-preview"); }, 1);
      }
    }

  });


  // Now fake the file upload, since GitHub does not handle file uploads
  // and returns a 404

  var minSteps = 6,
      maxSteps = 60,
      timeBetweenSteps = 100,
      bytesPerStep = 100000;

  dropzone.uploadFiles = function(files) {
    var self = this;

    for (var i = 0; i < files.length; i++) {

      var file = files[i];
      totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

      for (var step = 0; step < totalSteps; step++) {
        var duration = timeBetweenSteps * (step + 1);
        setTimeout(function(file, totalSteps, step) {
          return function() {
            file.upload = {
              progress: 100 * (step + 1) / totalSteps,
              total: file.size,
              bytesSent: (step + 1) * file.size / totalSteps
            };

            self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
            if (file.upload.progress == 100) {
              file.status = Dropzone.SUCCESS;
              self.emit("success", file, 'success', null);
              self.emit("complete", file);
              self.processQueue();
              //document.getElementsByClassName("dz-success-mark").style.opacity = "1";
            }
          };
        }(file, totalSteps, step), duration);
      }
    }
  }
