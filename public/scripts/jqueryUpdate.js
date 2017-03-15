$("#updateForm").on('click', '#updateButton', function () {
    var id = $('#newNameField').data('id');
    var newName = $("#newNameField").val();

    $.ajax({
        method: "POST",
        url: "api/update/"+type,
        data: {id: id,
               newName: newName}
    })
    .done(function (returnedDatas) {
        var myData = JSON.parse(returnedDatas);
        if(myData.error){
            alert(myData.error);
        } else {
            alert(myData.message);
        }

    })
    .fail(function () {
        alert("Something went wrong");
    });
});

