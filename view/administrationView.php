<?php
session_start();

// todo: the model should not be required
//require_once './model/fonctionsDB.inc.php';
require_once 'helpers/phpToHtml.inc.php';

//$DB = new DB();

$activites = $data->activites;
$classes = $data->classes;

/*if (!empty($_POST['nomClasse'])) {
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
}*/
?>

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

<!-- Jquery -->
<script
    src="./view/scripts/jqueryAdministration.js">
</script>