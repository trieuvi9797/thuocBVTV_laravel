$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function removeRow(id, url){
    if(confirm('Xóa không thể phục hồi lại được!. Bạn có chắc không?')){
        $.ajax({
            type:'DELETE',
            datatype:'JSON',
            data:{id},
            url: url,
            success:function(result){
                console.log(result);
            }
        })
    }
}