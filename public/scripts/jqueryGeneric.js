$(".formAjax").on('click', '.submitAjax', function () {
    var url = $(this).data('url');
    var datastring = $(this).serialize();
    $.ajax({
        method: "POST",
        url: url,
        data: datastring
    })
    .done(function (returnedDatas) {
        $(".formAjax")[0].reset();
        var myData = JSON.parse(returnedDatas);
        if(myData.error){
            $("#errorMessage").html(myData.error);
            $("#errorAlert").show();
        } else {
            $("#successMessage").html(myData.message);
            $("#successAlert").show();
            //alert(myData.message);
        }

    })
    .fail(function () {
        alert("Something went wrong");
    });
});

function ajaxRequest(formID, url) {

}

