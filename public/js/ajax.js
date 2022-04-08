$(function() {
    $('.approved').change(function() {

        var active_status = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: applianceStatus,
            data: {'active_status': active_status, 'id': id},
            success: function(data){
              if (active_status == 1) {

                    $('.text-'+id).html('Active');
                    $('.text-'+id).removeClass("text-theme-6");
                    $('.text-'+id).addClass("text-theme-9");
                    $('.text-'+id).attr('checked',1);

             } else {
                    $('.text-'+id).html('InActive');
                    $('.text-'+id).removeClass("text-theme-9");
                    $('.text-'+id).addClass("text-theme-6");
                    $('.text-'+id).attr('unchecked',0);
                }
            }, error: function (error) {

                            }

        });

    })
  });



// <script>
//     $(document).on('click','.delete-article-btn',function(){
//          var active_status  = $(this).attr('checked');
//          var id = $(this).attr('id');
//          $.ajax({
//             url: '/changeajax',
//             type: 'post',
//             dataType: 'json',
//             data: {'active_status': active_status, 'id': id},
//             success: function (response) {
//                 console.log(response);
//                 console.log('Article ID',id);

//                 if (response == 1) {
//                     $('.approved-'+id).html('Active');
//                     $('.approved-'+id).attr('checked',1);
//                 } else {
//                     $('.approved-'+id).html('Inactive');
//                     $('.approved-'+id).attr('unchecked',0);
//                 }
//             }, error: function (error) {

//             }
//         });
//     })

// </script>
