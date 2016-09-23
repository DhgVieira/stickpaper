$(document).ready(function() {
    $(document).on('click', 'a[data-confirm]', function(ev) {
        href = $(this).attr('href');
        bootbox.dialog({
            title: '<strong>'+ $(this).attr('data-title') +'</strong>',
            message: $(this).attr('data-confirm'),
            buttons: {
                success: {
                    label: "Cancelar",
                    className: "btn-default"
                },
                danger: {
                    label: "Confirmar",
                    className: "btn-danger",
                    callback: function() {
                        window.location.href = href;
                    }
                }
            }
        });
        return false;
    });
    $('[data-tooltip="true"]').tooltip({
        container: 'body'
    });

    $('[data-tooltip="true"]').tooltip({
        container: 'body'
    });
});