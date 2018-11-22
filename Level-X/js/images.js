
$(document).ready(function(){
    $("#guardarImagenes").on("submit", function(ev){
        ev.preventDefault();

        let form_data = new FormData(this);
        $.ajax({
            url: "guardarImagenes",
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(data){
                alert(data);
            }
        });
        return false;
    });
});
