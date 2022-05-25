// EVento submit para la creación de nuevo post
$('#formCrearPost').on('submit', function(e){
    e.preventDefault();
    
    // Ejecutamos ajax
    $.ajax({
        url: '/posts/storePost',
        method: 'POST',
        type: 'POST',
        dataType: 'JSON',
        // contentType: false,
        // cache: false,
        // processData: false,
        data: $(this).serializeArray(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    }).done(function(response) {
        // console.log('success');
        // console.log(response);
        if(response.respuesta == 'OK') {
            // Sweet alert en caso que se cree el post exitosamente
            Swal.fire({
                icon: 'success',
                title: 'Post creado correctamente',
                showConfirmButton: false,
                timer: 1500
            })
            
            // Limpiamos alertas de error existentes
            $('#txt_alert').remove();

            // Reseteamos formulario
            limpiarCampos();

            // 
            setTimeout(() => {
                location.reload();
            }, 1500);
        } else {
            // Sweet alert en caso que no se cree el post exitosamente
            Swal.fire({
                icon: 'error',
                title: 'El post no se ha creado correctamente',
                showConfirmButton: false,
                timer: 1500
            })
        }
    }).fail(function(resp) {
        // console.log('error');
        // console.log(resp);
        Swal.fire({
            icon: 'error',
            title: 'Por favor completar los datos del formulario...',
            showConfirmButton: false,
            timer: 1500
        })

        // Limpiamos alertas de error existentes
        $('#txt_alert').remove();

        // Iteramos los campos que aún no han sido completados para alerta de error
        $.each(resp.responseJSON.errors, function (key, value) {
            $(document).find('[name='+key+']').after('<span id="txt_alert" name="txt_alert" class="text-strong text-danger"><strong>' +value+ '</strong></span>')
        });

    });  
});

// Evento para limpiar campos del formulario
function limpiarCampos() {
    $('#txt_titulo_post').val('');
    $('#txt_email_post').val('');
    $('#txt_contenido_post').val('');
}