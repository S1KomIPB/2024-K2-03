$("#poster").bind('change',function(){
    var imagename = $("#poster").val();
    if(/^s*$/.test(imagename)){
        $("#blankImage").text("No File Chosen..");
        $(".success").hide();web
    }else{
        $("#blankImage").text(imagename.replace("C:\\fakepath\\",""));
        $(".success").show();
    }
})
  
  
$("#pdf").bind('change',function(){
    var filename = $("#pdf").val();
    if(/^s*$/.test(filename)){
        $("#blankFile").text("No File Chosen..");
        $(".success").hide();
    }else{
        $("#blankFile").text(filename.replace("C:\\fakepath\\",""));
        $(".success").show();
    }
  })
  
$(document).on('click', '#cancel', function(){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1481FF',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/';
        }
    });
});

$(document).on('click', '#uploadButton', function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to change after uploading!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1481FF',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Upload'
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit the form
            document.getElementById('upload-form').submit();
        }
    });
});
