<?php
ini_set('display_errors', 1);
ini_set('display_startuperrors', 1);
error_reporting(E_ALL);

session_start();

require_once './public/helpers/phpToHtml.inc.php';

$activites = $data->activites;
$classes = $data->classes;
$jquery = Config::BASE_URL . "public/scripts/jqueryInscription.js";
    
?>

<div class="container center_div">

    <div class="form-horizontal" id="formSubscribe">

        <div class='alert alert-dismissible alert-warning' hidden="true" id='errorAlert'>
            <button type='button' class='close' onclick="$('.alert-warning').hide()">&times;</button>
            <h4>Warning!</h4>
            <p id='errorMessage'></p>
        </div>

        <div class='alert alert-dismissible alert-success' hidden="true" id='successAlert'>
            <button type='button' class='close' onclick="$('.alert-success').hide()">&times;</button>
            <h4>Succès!</h4>
            <p id='successMessage'></p>
        </div>

        <div>
            <h2>Inscription à la journée sportive du CFPT</h2>
            <br />
        </div>

        <div class="form-group">
            <label for="nom" class="col-lg-3 control-label">Nom: </label>
            <div class="col-lg-3">
                <input type="text" name="nom" id="name" class="form-control" />
            </div>
        </div>

        <div class="form-group">
            <label for="prenom" class="col-lg-3 control-label">Prénom: </label>
            <div class="col-lg-3">
                <input type="text" name="prenom" id="firstname" class="form-control" />
            </div>
        </div>

        <div class="form-group">
            <label for="classe" class="col-lg-3 control-label">Classe: </label>
            <div class="col-lg-3">
                <?php HtmlTools::afficherSelect("classe", $classes, "classe");?>
            </div>
        </div>

        <hr>

        <div class='form-group'>
            <label for="premier" class='col-lg-3 control-label'>Premier choix: </label>
            <div class='col-lg-3'>
                <?php HtmlTools::afficherSelect("activite1", $activites, "activite"); ?>
            </div>
        </div>

        <div class='form-group'>
            <label for="deuxième" class='col-lg-3 control-label'>Deuxième choix: </label>
            <div class='col-lg-3'>
                <?php HtmlTools::afficherSelect("activite2", $activites, "activite"); ?>
            </div>
        </div>

        <div class='form-group'>
            <label for="troisième" class='col-lg-3 control-label'>Troisième choix: </label>
            <div class='col-lg-3'>
                <?php HtmlTools::afficherSelect("activite3", $activites, "activite"); ?>
            </div>
        </div>


        <!--<div class="col-lg-10 col-lg-offset-2">-->
        <div class="form-group center_div">
            <button type="submit" id="submitSubscription" class="btn btn-primary col-lg-2">Confirmer</button>
            <button type="reset" class="btn btn-default col-lg-2">Annuler</button>
        </div>
    </div>
</div>

<script
    src="<?= $jquery ?>">
</script>
  


