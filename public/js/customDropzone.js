
$(document).ready(function(){
  var count = 1;
  $(function() {
  
    // preventing page from redirecting
    $("html").on("dragover", function(e) {
        e.preventDefault();
        e.stopPropagation();
        $("p").text("Drag here");
        $('.upload-area').css('border-color','#e4e6fc');
    });
  
    $("html").on("drop", function(e) { e.preventDefault(); e.stopPropagation(); });
  
    // Drag enter
    $('.upload-area').on('dragenter', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $("p").text("Drop");
    });
  
    // Drag over
    $('.upload-area').on('dragover', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $("p").text("Drop");
        $('.upload-area').css('border-color','#ced4da');
    });
  
    // Drop
    $('.upload-area').on('drop', function (e) {
        e.stopPropagation();
        e.preventDefault();
        var file = e.originalEvent.dataTransfer.files;
        
        var fd = new FormData();
        $("#path").attr('value',file[0]);
        fd.append('file', file[0]);
        if(file[0].size>5120000){
          $("p").text('Select Or Drop Resume Here');
          displayErrorMessage('Resume Should Be Less than 5 MB');
        }else{
        uploadData(fd);
        }
    });
  
    // Open file selector on div click
    $("#uploadfile").click(function(){
        $("#file").click();
    });
  
    // file selected
    $("#file").change(function(){
      if(count==1){
        }
        var fd = new FormData();
        var files = $('#file')[0].files[0];
        console.log('files',files);
        fd.append('file',files);
        if(files.size>5120000){
          displayErrorMessage('Resume Should Be Less than 5 MB');
        }
        else{
        uploadData(fd);
        }
    });
  });
  $(document).ajaxStart(function(){
    $("#file").attr('disabled',true);
  });
 
  // Sending AJAX request and upload file
  function uploadData(formdata){
  
    if(count==1){
      
        $("p").remove();
        $("#wait").css("display",'block');
        $("small").css("display",'block');
      count++;
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
      $.ajax({
        url: storedImage,
        type: 'post',
        data: formdata,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response){
          
            $("#wait").css("display",'none');
            $("small").css("display",'none');
            addThumbnail(response);
            //   $('#email').attr('value',response.resumeData.data.emails);
            //   $("#first_name").attr('value',response.resumeData.data.name.first);
            //   $("#last_name").attr('value',response.resumeData.data.name.last);
            //   $("#phonenumber").attr('value',response.resumeData.data.phoneNumbers);
            //   $("#path").attr('value',response.path);
            //   $("#extension").attr('value',response.extension);
            //   $('#identifier').attr('value',response.resumeData.meta.identifier);
             
        }
    });
  
    }else{
      displayErrorMessage('No More Files Are Required');
    }
  }
  
  // Added thumbnail
  function addThumbnail(data){
    $("#uploadfile p").remove(); 
    var len = $("#uploadfile div.thumbnail").length;
  
    var num = Number(len);
    num = num + 1;
  
    var name = data.name;
    var size = convertSize(data.size);
    
    var src = data.src;
  
    // Creating an thumbnail
    $("#uploadfile").append('<center><div id="thumbnail_'+num+'" class="thumbnail d-flex"></div><center>');
    $("#thumbnail_"+num).append('<div><img src="'+src+'" id="thumbnail_image"></div>');
    $("#thumbnail_"+num).append('<div><span class="size">'+name+' ('+size+')<span></div>');
  
  }
  
  // Bytes conversion
  function convertSize(size) {
    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    if (size == 0) return '0 Byte';
    var i = parseInt(Math.floor(Math.log(size) / Math.log(1024)));
    return Math.round(size / Math.pow(1024, i), 2) + ' ' + sizes[i];
  }
  $('#addCandidate').on('submit',function(){
    if($('#path').val()==''){
      displayErrorMessage('Resume Is Required');
      return false;
    }
    else{
      return true;
    }
  });
});