// $(document).on('submit', '#formCrearPost', function(e) {
$('#formCrearPost').on('submit', function(e){
    e.preventDefault();
    
    var URL = $('#formCrearPost').attr('data-action');
    console.log('URL: ' + URL);

    $.ajax({
        url: URL,
        method: 'POST',
        type: 'POST',
        dataType: 'JSON',
        data: {
            _token: '{{ csrf_token() }}',
            txt_titulo_post: $('#txt_titulo_post').val(),
            txt_email_post: $('#txt_email_post').val(),
            txt_contenido_post: $('#txt_contenido_post').val(),
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Content-Type':'application/json'
        },
        contentType: false,
        cache: false,
        processData: false,
        success: function(response) {
            console.log('success');
            console.log(response);
        },
        error: function(err) {
            console.log('error');
            console.log(err);
        }
    });  
     
});