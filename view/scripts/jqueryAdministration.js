$(".submitElement").click(function () {
    var type = $(this).data('type');
    var table = $(this).data('table');
    var field = $(this).data('field');
    var inputValue = $("#"+field).val();

    $.ajax({
        method: "POST",
        url: "api/add/"+type,
        data: {nomElement: inputValue}
    })
    .done(function (returnedDatas) {
        var myData = JSON.parse(returnedDatas);
        if(myData.error){
            alert("Something went wrong");
        } else {
            //alert("Data Saved: id:" + myData.id + " data: " + myData.data);
            $("#"+field).val("");
            $("#"+table).append("<tr><td>" + myData.data + "</td>" + 
                    "<td><a href='#' class='rmElement' data-type='"+type+"' data-id='" + myData.id + "'>Modifier</a></td>" +
                    "<td><a href='#"+ myData.id +"' class='rmElement' data-type='"+type+"' data-id='" + myData.id + "'>Supprimer</a></td></tr>");
        }

    })
    .fail(function () {
        alert("Something went wrong");
    });
});

$("#tableClasse, #tableActivite").on('click', 'a.rmElement', function (e) {
    console.log("delete clicked");
    //e.preventDefault();
    var closestTr = $(this).closest("tr");
    var id = $(this).data('id');
    var type = $(this).data('type');

    $.ajax({
        method: "POST",
        url: "api/remove",
        data: {id: id, type: type}
    })
    .done(function (returnedDatas) {
        var myData = JSON.parse(returnedDatas);
        console.log(myData);
        if(myData.error){
            if(myData.error == 23000){
                alert("You can't remove this. It's linked to another element.");
            } else {
                alert("Something went wrong");
            }
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



