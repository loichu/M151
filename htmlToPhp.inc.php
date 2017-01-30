<?php
function afficherSelectActivites($name){
    echo "<div class='form-group'>";
    echo "<label for=$name class='col-lg-2 control-label'>" . ucfirst($name) . " choix: </label>";
    echo "<div class='col-lg-10'>";
    echo "<select class='form-control' id=$name name=$name>";
    echo "<option>Accrobranche</option>";
    echo "<option>Vélo</option>";
    echo "<option>Football</option>";     
    echo "</select>";
    echo "</div>";
    echo "</div>";
}
