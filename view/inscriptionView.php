<?php
ini_set('display_errors', 1);
ini_set('display_startuperrors', 1);
error_reporting(E_ALL);

session_start();

require_once './view/helpers/phpToHtml.inc.php';
//require_once 'fonctionsDB.inc.php';

//$htmlTools = new htmllTools();
//$myDB = new DB();

$activites = $data->activites;
$classes = $data->classes;

if(!empty($_SESSION['error']['identical records'])){
    echo $_SESSION['error']['identical records'];
    unset($_SESSION['error']['identical records']);
}

if(!empty($_SESSION['error']['no name'])){
    echo $_SESSION['error']['no name'];
    unset($_SESSION['error']['no name']);
}
    
    
?>
<h2>Inscription à la journée sportive du CFPT</h2>

<div class="form-horizontal" id="formSubscribe">
    
    <div class='alert alert-dismissible alert-warning' hidden="true" id='errorAlert'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <h4>Warning!</h4>
        <p id='errorMessage'></p>
    </div>
    
    <div class='alert alert-dismissible alert-success' hidden="true" id='errorAlert'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <h4>Warning!</h4>
        <p id='errorMessage'></p>
    </div>
    
    
  <div class="form-group">
      <label for="nom" class="col-lg-2 control-label">Nom: </label>
      <div class="col-lg-4">
          <input type="text" name="nom" id="name" class="form-control" />
      </div>
  </div>

  <div class="form-group">
      <label for="prenom" class="col-lg-2 control-label">Prénom: </label>
      <div class="col-lg-4">
          <input type="text" name="prenom" id="firstname" class="form-control" />
      </div>
  </div>

  <div class="form-group">
      <label for="classe" class="col-lg-2 control-label">Classe: </label>
      <div class="col-lg-4">
          <?php HtmlTools::afficherSelect("classe", $classes, "classe");?>
      </div>
  </div>

  <hr>

  <div class='form-group'>
      <label for="premier" class='col-lg-2 control-label'>Premier choix: </label>
      <div class='col-lg-4'>
          <?php HtmlTools::afficherSelect("activite1", $activites, "activite"); ?>
      </div>
  </div>

  <div class='form-group'>
      <label for="deuxième" class='col-lg-2 control-label'>Deuxième choix: </label>
      <div class='col-lg-4'>
          <?php HtmlTools::afficherSelect("activite2", $activites, "activite"); ?>
      </div>
  </div>

  <div class='form-group'>
      <label for="troisième" class='col-lg-2 control-label'>Troisième choix: </label>
      <div class='col-lg-4'>
          <?php HtmlTools::afficherSelect("activite3", $activites, "activite"); ?>
      </div>
  </div>        


  <div class="col-lg-10 col-lg-offset-2">
      <button type="submit" id="submitSubscription" class="btn btn-primary">Confirmer</button>
      <button type="reset" class="btn btn-default">Annuler</button>
  </div>
  
  <script
    src="./view/scripts/jqueryInscription.js">
  </script>
  
</div>

