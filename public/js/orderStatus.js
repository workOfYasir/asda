

$(function() {
    $('.order-check').change(function() {

        var active_status = $(this).prop('checked') == true ? 1 : 0;
        console.log('active_status',active_status)
        var id = $(this).data('id');
        console.log(id)
        $.ajax({
            type: "GET",
            dataType: "json",
            url: orderStatus,
            data: {'status': active_status, 'id': id},
            success: function(data){
                console.log('data',data)
                if (active_status == 1) {

                    $('.orderText-'+id).html('Placed');
                    $('.anchor-'+id).removeClass("text-theme-6");
                    $('.icon-'+id).html(feather.icons['check-circle'].toSvg());
                    $('.orderText-'+id).attr('checked',1);

                } else {
                    $('.orderText-'+id).html('Pending');
                    $('.icon-'+id).html(feather.icons['x-circle'].toSvg());
                    $('.anchor-'+id).addClass("text-theme-6");
                    $('.orderText-'+id).attr('unchecked',0);
                }
            }, error: function (error) {

            }

        });

    })
});


