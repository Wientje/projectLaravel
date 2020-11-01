
    $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var carItems_id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/status',
            data: {'status': status, 'carItems_id': carItems_id},
            success: function(data){
                console.log(data.success)
            }
        });
    })
})
