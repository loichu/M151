<?php
$users = $data->users;
?>
<div class="col-md-6">
    <h2>Insérer un nouvel administrateur</h2>

    <table id="tableActivite">
        <?php
        foreach ($activites as $activite) {
            echo "<tr>";
            HtmlTools::addRowInTable($users['username'], $activite['idUser'], "user");
            echo "</tr>";
        }
        ?>
    </table>

    <div id="formActivite">
        <input type="text" name="nomActivite" id="nomActivite" placeholder="Nom de l'activité"/>
        <a href="#" class="btn btn-primary submitElement" data-type="user" data-table="tableUser"
           data-field="nomActivite">Confirmer
        </a>
        <!--<a href="#" class="btn btn-primary submitElement" data-type="activite" data-table="tableActivite" data-field="nomActivite">Ajouter</a>
        <input type='button' class="btn btn-primary submitElement" data-type="activite" data-table="tableActivite" data-field="nomActivite" value="Ajouter" />-->
    </div>
</div>
