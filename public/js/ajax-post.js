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

            // Reseteamos formulario
            $('#formCrearPost').trigger("reset");
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
            title: 'Se ha generado un error al intentar almacenar el post, por favor intentar más tarde...',
            showConfirmButton: false,
            timer: 1500
        })

        // Iteramos los campos que aún no han sido completados para alerta de error
        $.each(resp.responseJSON.errors, function (key, value) {
            $(document).find('[name='+key+']').after('<span class="text-strong text-danger"><strong>' +value+ '</strong></span>')

        });

    });  
});