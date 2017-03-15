<?php
session_start();

require_once './public/helpers/phpToHtml.inc.php';


$activites = $data->activites;
$classes = $data->classes;
$script = Config::$site_url . "public/scripts/jqueryAdministration.js";
?>

<div class="col-md-12">
    <h1>Administration</h1>
</div>

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
        <button type="submit" class="btn btn-primary submitElement" data-type="classe" data-table="tableClasse"
                data-field="nomClasse">Ajouter
        </button>
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
        <button type="submit" class="btn btn-primary submitElement" data-type="activite" data-table="tableActivite"
                data-field="nomActivite">Confirmer
        </button>
        <!--<a href="#" class="btn btn-primary submitElement" data-type="activite" data-table="tableActivite" data-field="nomActivite">Ajouter</a>
        <input type='button' class="btn btn-primary submitElement" data-type="activite" data-table="tableActivite" data-field="nomActivite" value="Ajouter" />-->
    </div>
</div>

<pre>
    <?php print_r($activites) ?>
</pre>

<!-- Jquery -->
<script
        src="<?= $script ?>">
</script>