$("#formSubscribe").on('click', '#submitSubscription', function () {
    var name = $('#name').val();
    var firstname = $('#firstname').val();
    var classe = $('#classe').val();
    var activite1 = $("#activite1").val();
    var activite2 = $("#activite2").val();
    var activite3 = $("#activite3").val();

    $.ajax({
        method: "POST",
        url: "api/subscribe",
        data: {name: name,
               firstname: firstname,
               classe: classe,
               activite1: activite1,
               activite2: activite2,
               activite3: activite3}
    })
    .done(function (returnedDatas) {
        $('#name').val('');
        $('#firstname').val('');
        $('#classe').val('0');
        $('#activite1').val('0');
        $('#activite2').val('0');
        $('#activite3').val('0');
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


