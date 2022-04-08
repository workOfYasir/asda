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
