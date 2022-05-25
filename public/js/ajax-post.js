// $(document).on('submit', '#formCrearPost', function(e) {
$('#formCrearPost').on('submit', function(e){
    e.preventDefault();
    
    console.log( $( this ).serializeArray() );
    
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
        console.log('success');
        console.log(response);
    }).fail(function(resp) {
        console.log('error');
        console.log(resp);
    });  
     
});