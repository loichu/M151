<?php
session_start();

// todo: the model should not be required
require_once './model/fonctionsDB.inc.php';
require_once 'helpers/phpToHtml.inc.php';

$DB = new DB();

$activites = $DB->listActivites();
$classes = $DB->listClasses();

if (!empty($_POST['nomClasse'])) {
    $DB->addClasse($_POST);
    header("location:administration");
}

if (!empty($_POST['nomActivite'])) {
    $DB->addActivite($_POST);
    header("location:administration");
}

if (!empty($_POST['newName'])) {
    $data = $_POST;
    $id = $_POST['id'];
    $type = $_POST['type'];
    $DB->update($id, $type, $data);
    header("location:administration");
}

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];
    $DB->remove($id, $type);
    header("location:administration");
}
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <title>Journée Sportive du CFPT</title>
        <link rel="stylesheet" type="text/css" href="https://bootswatch.com/paper/bootstrap.css">
        <script
            src="https://code.jquery.com/jquery-3.1.1.js"
            integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
            crossorigin="anonymous">
        </script>

    </head>
    <body>
        <div class="col-md-12">
            <?php
            if (!empty($_SESSION['error']) && empty($_POST) && empty($_GET)) {
                echo $_SESSION['error'];
                $_SESSION['error'] = "";
            }

            if (!empty($_SESSION['message']) && empty($_POST) && empty($_GET)) {
                echo $_SESSION['message'];
                $_SESSION['message'] = "";
            }
            ?>
        </div>

        <div class="col-md-12">
            <h1>Administration</h1>
        </div>

        <div class="col-md-6">
            <h2>Insérer une nouvelle classe</h2>

            <table id="tableClasse">
                <?php
                foreach ($classes as $classe) {
                    echo "<tr>";
                    HtmllTools::addRowInTable($classe['nomClasse'], $classe['idClasse'], "classe");
                    /*echo "<td width='200'>$classe[nomClasse]</td>";
                    echo "<td width='80'><a href='update.php?type=classe&id=" . $classe['idClasse'] . "'>Modifier</a></td>";
                    echo "<td width='40'><a href='#' class='rmElement' data-type='classe' data-id='" . $classe['idClasse'] . "'>Supprimer</a></td>";*/
                    echo "</tr>";
                }
                ?>
            </table>
            
            <div id="formClasse">
                <input type ="text" name="nomClasse" id="nomClasse" placeholder="Nom de la classe"/>
                <input type="button" class="submitElement" data-type="classe" data-table="tableClasse" data-field="nomClasse" value='Ajouter' />
            </div>
       
        </div>

        <div class="col-md-6">
            <h2>Insérer une nouvelle activité</h2>

            <table id="tableActivite">
                <?php
                foreach ($activites as $activite) {
                    echo "<tr>";
                    HtmllTools::addRowInTable($activite['nomActivite'], $activite['idActivite'], "activite");
                    /*echo "<td width='200'>$activite[nomActivite]</td>";
                    echo "<td width='80'><a href='update.php?type=activite&id=" . $activite['idActivite'] . "'>Modifier</a></td>";
                    echo "<td width='40'><a href=?type=activite&id=" . $activite['idActivite'] . "'>Supprimer</a></td>";*/
                    echo "</tr>";
                }
                ?>
            </table>

            <div id="formActivite">
                <input type ="text" name="nomActivite" id="nomActivite" placeholder="Nom de l'activité"/>
                <input type='button' class="submitElement" data-type="activite" data-table="tableActivite" data-field="nomActivite" value="Ajouter" />
            </div>
        </div>

        <pre>
            <?php print_r($activites) ?>
        </pre>

        <!--
        Jquery
        -->
        <script>
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
            
            /*$("#submitClasse").click(function () {
                var inputValue = $("#nomClasse").val();
                $.ajax({
                    method: "POST",
                    url: "api/add/classe",
                    data: {nomClasse: inputValue}
                })
                .done(function (returnedDatas) {
                    var myData = JSON.parse(returnedDatas);
                    if(myData.error){
                        alert("Something went wrong");
                    } else {
                        //alert("Data Saved: id:" + myData.id + " data: " + myData.data);
                        $("#nomClasse").val("");
                        $("#tableClasse").append("<tr><td>" + myData.data + "</td>" + 
                                "<td><a href='#' class='rmElement' data-type='classe' data-id='" + myData.id + "'>Modifier</a></td>" +
                                "<td><a href='#"+ myData.id +"' class='rmElement' data-type='classe' data-id='" + myData.id + "'>Supprimer</a></td></tr>");
                    }
                    
                })
                .fail(function () {
                    alert("Something went wrong");
                });
            });
            
            $("#submitActivite").click(function () {
                var inputValue = $("#nomActivite").val();
                $.ajax({
                    method: "POST",
                    url: "api/add/activite",
                    data: {nomActivite: inputValue}
                })
                .done(function (returnedDatas) {
                    var myData = JSON.parse(returnedDatas);
                    if(myData.error){
                        alert("Something went wrong");
                    } else {
                        //alert("Data Saved: id:" + myData.id + " data: " + myData.data);
                        $("#nomActivite").val("");
                        $("#tableActivite").append("<tr><td>" + myData.data + "</td>" + 
                                "<td><a href='#' class='rmElement' data-type='activite' data-id='" + myData.id + "'>Modifier</a></td>" +
                                "<td><a href='#"+ myData.id +"' class='rmElement' data-type='activite' data-id='" + myData.id + "'>Supprimer</a></td></tr>");
                    }
                    
                })
                .fail(function () {
                    alert("Something went wrong");
                });
            });*/

        </script>



    </body>
</html>
