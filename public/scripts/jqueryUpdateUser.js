    $("#updateForm").on('click', '#updateButton', function () {
    var id = $('#newNameField').data('id');
    var newName = $("#newNameField").val();
    var exPswd = $("#exPswdField").val();
    var newPswd = $("#newPswdField").val();

    $.ajax({
        method: "POST",
        url: "/api/update/user",
        data: {id: id,
               username: newName,
               exPswd: exPswd,
               password: newPswd
              }
    })
    .done(function (returnedDatas) {
        var myData = JSON.parse(returnedDatas);
        if(myData.error){
            alert(myData.error);
        } else {
            window.location.href = '/administration/user#updated';
        }

    })
    .fail(function () {
        alert("Something went wrong");
    });
});

