$("#login").on('click', '#submit', function () {
    var username = $("#username").val();
    var password = $("#password").val();
    var uri = $("#submit").data('uri');
    console.log("clicked");
    //console.log(uri);
    $.ajax({
        method: "POST",
        url: "/api/checkpassword",
        data: {
            username: username,
            password: password}
    })
    .done(function (returnedDatas) {
        console.log(returnedDatas);
        var myData = JSON.parse(returnedDatas);
        if(myData.error){
            alert(error);
            alert(myData.error);
        } else {
            window.location.reload();
        }

    })
    .fail(function () {
        alert("Something went wrong");
    });
});

