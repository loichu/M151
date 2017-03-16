$("#updateForm").on('click', '#updateButton', function () {
    var id = $('#newNameField').data('id');
    var newName = $("#newNameField").val();
    var type = $("#newNameField").data('type');

    $.ajax({
        method: "POST",
        url: "/api/update/"+type,
        data: {id: id,
               newName: newName}
    })
    .done(function (returnedDatas) {
        console.log(returnedDatas);
        var myData = JSON.parse(returnedDatas);
        if(myData.error){
            alert(error);
            alert(myData.error);
        } else {
            window.location.href = '/administration/' + type +'#updated';
        }

    })
    .fail(function () {
        alert("Something went wrong");
    });
});

