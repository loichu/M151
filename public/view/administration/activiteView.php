<?php
$activites = $data->activites;
?>
<div class="col-md-6">
    <h2>Insérer une nouvelle activité</h2>

    <table id="tableActivite">
        <?php
        foreach ($activites as $activite) {
            echo "<tr>";
            HtmlTools::addRowInTable($activite['nomActivite'], $activite['id'], "activite");
            echo "</tr>";
        }
        ?>
    </table>

    <div id="formActivite">
        <input type="text" name="nomActivite" id="nomActivite" placeholder="Nom de l'activité"/>
        <a href="#" class="btn btn-primary submitElement" data-type="activite" data-table="tableActivite"
           data-field="nomActivite">Confirmer
        </a>
        <!--<a href="#" class="btn btn-primary submitElement" data-type="activite" data-table="tableActivite" data-field="nomActivite">Ajouter</a>
        <input type='button' class="btn btn-primary submitElement" data-type="activite" data-table="tableActivite" data-field="nomActivite" value="Ajouter" />-->
    </div>
</div>
