// EVento submit para la creación de nuevo post
$('#formCrearPost').on('submit', function(e){
    e.preventDefault();
    
    let formData = new FormData(this)
    
    formData.append('txt_id_r_post', $('#txt_id_r_post').val());
    formData.append('txt_titulo_post', $('#txt_titulo_post').val());
    formData.append('txt_email_post', $('#txt_email_post').val());
    formData.append('txt_imagen_post', $('#txt_imagen_post')[0].files[0]);
    formData.append('txt_contenido_post', $('#txt_contenido_post').val());

    // Ejecutamos ajax
    $.ajax({
        url: '/posts/storePost',
        method: 'POST',
        type: 'POST',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        data: formData,
        enctype: 'multipart/form-data',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    }).done(function(response) {
        console.log('success');
        console.log(response);
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
        console.log('error');
        console.log(resp);
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

// Evento para eliminar registro
function confirmarEliminarPost(idPost) {
    // Recuperamos el token de sesión
    
    Swal.fire({
        title: 'Deseas eliminar el registro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Confirmar',
        cancelButtonText: `Cancelar`,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            // Swal.fire('Saved!', '', 'success')
            // fetch('/admins/' + idPost, {
            //     method: "DELETE", // POST, PUT, DELETE, GET, etc.
            //     "X-CSRF-Token": csrfToken,
                
            // })
            // .then(function(response){
            //     console.log(response);
            // })

            $.ajax({
                url: "/admins/" + idPost,
                type: 'post',
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    '_method': 'delete'
                },
                success: function(response) {
                    console.log('success');
                    console.log(response);
                },
                error: function (err) {
                    
                    console.log('success');
                    console.log(err);
                }
            });
        }
    })
}