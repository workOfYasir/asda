
$(document).ready(function(){
    console.log('okok');
})
    $("a[class^='projects-']").click(function(){
      var l = $(this).attr('id')
      console.log(l);
        //   location.reload('/projects#');
    });