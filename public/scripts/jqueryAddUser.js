$("#formUser").on('click', '#createUser', function () {
    console.log("clicked");
    var table = $(this).data('table');
    var username = $("#username").val();
    var password = $("#password").val();
    $.ajax({
        method: "POST",
        url: "/api/add/user",
        data: {username: username,
               password: password}
    })
    .done(function (returnedDatas) {
        var myData = JSON.parse(returnedDatas);
        if(myData.error){
            $("#errorMessage").html(myData.error);
            $("#errorAlert").show();
        } else {
            //alert("Data Saved: id:" + myData.id + " data: " + myData.data);
            $("#username").val("");
            $("#password").val("");
            $("#"+table).append("<tr><td width='200'>" + myData.username + "</td>" + 
                    "<td width='80'><a href='/update/" + myData.type + "/" + myData.id +"'>Modifier</a></td>" +
                    "<td><a href='#"+ myData.id +"' class='rmElement' data-type='user' data-id='" + myData.id + "'>Supprimer</a></td></tr>");
        }

    })
    .fail(function () {
        console.log("Something went wrong");
        alert("Something went wrong");
    });
    return false;
});

$("#tableClasse, #tableActivite").on('click', 'a.rmElement', function (e) {
    console.log("delete clicked");
    //e.preventDefault();
    var closestTr = $(this).closest("tr");
    var id = $(this).data('id');
    var type = $(this).data('type');

    $.ajax({
        method: "POST",
        url: "/api/remove",
        data: {id: id, type: type}
    })
    .done(function (returnedDatas) {
        var myData = JSON.parse(returnedDatas);
        console.log(myData);
        if(myData.error){
            alert(myData.error);
        } else {
            console.log(closestTr);
            closestTr.css('background-color', '#FF3030');
            closestTr.fadeOut("fast", function() {
                closestTr.remove();
            })
        }

    })
    .fail(function () {
        alert("Something went wrong");
    });
    return false;
});

$(function () {
    var hash = window.location.hash;
    if(hash === "#updated"){
        $("#successMessage").html("Modification réussie !");
        $("#successAlert").show();
        parent.location.hash = "";
    }
});



