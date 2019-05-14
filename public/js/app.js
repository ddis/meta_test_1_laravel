$(function () {
    $('form').on('submit', function () {
        var form = $(this);
        
        $.ajax('/check', {
            method  : "GET",
            dataType: "json",
            data    : {
                "string": form.find('input').val()
            },
            success : function (result) {
                var alert = $('.alert');
                if (result.result) {
                    alert.removeClass('alert-danger').addClass('alert-success').html("Верно");
                } else {
                    alert.removeClass('alert-success').addClass('alert-danger').html("Не верно");
                }
            },
            error   : function (error) {
                var data = JSON.parse(error.responseText);
                $('.modal-body').html("<p>" + data.error + "</p>");
                $('.modal').modal('show');
            }
        });
        
        return false;
    });
});
