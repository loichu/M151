<?php
//require_once './public/helpers/phpToHtml.inc.php';


//$activites = $data->activites;
//$classes = $data->classes;
//$script = Config::$site_url . "public/scripts/jqueryAdministration.js";
?>

<!--<div class='alert alert-dismissible alert-warning' hidden="true" id='errorAlert'>
    <button type='button' class='close' onclick="$('.alert-warning').hide()">&times;</button>
    <h4>Warning!</h4>
    <p id='errorMessage'></p>
</div>

<div class='alert alert-dismissible alert-success' hidden="true" id='successAlert'>
    <button type='button' class='close' onclick="$('.alert-success').hide()"> &times;</button>
    <h4>Succès!</h4>
    <p id='successMessage'></p>
</div>


<div class="col-md-12">
    <h1>Administration</h1>
</div>-->

<div class="col-md-6">
    <h2>Insérer une nouvelle classe</h2>

    <table id="tableClasse">
        <?php
        foreach ($classes as $classe) {
            echo "<tr>";
            HtmlTools::addRowInTable($classe['nomClasse'], $classe['idClasse'], "classe");
            echo "</tr>";
        }
        ?>
    </table>

    <div id="formClasse">
        <input type="text" name="nomClasse" id="nomClasse" placeholder="Nom de la classe"/>
        <a href="#" class="btn btn-primary submitElement" data-type="classe" data-table="tableClasse"
                data-field="nomClasse">Ajouter
        </a>
        <!--<a href="#" class="btn btn-primary submitElement" data-type="classe" data-table="tableClasse" data-field="nomClasse">Ajouter</a>
        <input type="button" class="submitElement" data-type="classe" data-table="tableClasse" data-field="nomClasse" value='Ajouter' />-->
    </div>

</div>

<div class="col-md-6">
    <h2>Insérer une nouvelle activité</h2>

    <table id="tableActivite">
        <?php
        foreach ($activites as $activite) {
            echo "<tr>";
            HtmlTools::addRowInTable($activite['nomActivite'], $activite['idActivite'], "activite");
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

<pre>
    <?php print_r($activites) ?>
</pre>

