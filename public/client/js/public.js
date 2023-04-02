$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function loadMore()
{
    const page = $('#page').val();
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        data: {page},
        url: '/services/load-product',
        success : function(result){
            
        }
    })

}