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
                if(result.error == false){
                    alert(result.message);
                    location.reload();
                }else{
                    alert('Xóa không được! Vui lòng thử lại');
                }
            }
        })
    }
}

// Upload file

    $(() => {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#show-image').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#inputIMG").change(function() {
            readURL(this);
        });
    });

    $(() => {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#show-IMGs').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#inputIMGs").change(function() {
            readURL(this);
        });
    });