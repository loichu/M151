<?php
ini_set('display_errors', 1);
ini_set('display_startuperrors', 1);
error_reporting(E_ALL);

session_start();

require_once 'htmlToPhp.inc.php';
require_once 'fonctionsDB.inc.php';

$htmlTools = new htmllTools();
$myDB = new DB();

$activites = $myDB->listActivites();
$classes = $myDB->listClasses();

if(!empty($_SESSION['error']['identical records'])){
    echo $_SESSION['error']['identical records'];
    unset($_SESSION['error']['identical records']);
}

if(!empty($_SESSION['error']['no name'])){
    echo $_SESSION['error']['no name'];
    unset($_SESSION['error']['no name']);
}
    
    
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Journée Sportive du CFPT</title>
    <link rel="stylesheet" type="text/css" href="https://bootswatch.com/paper/bootstrap.css">
    <script type="text/javascript" src="script.js"></script>
  </head>
  <body>
      
      <h2>Inscription à la journée sportive du CFPT</h2>
      
      <form class="form-horizontal" role="form" method="post" action="confirmation.php">
          
        <div class="form-group">
            <label for="nom" class="col-lg-2 control-label">Nom: </label>
            <div class="col-lg-4">
                <input type="text" name="nom" class="form-control" />
            </div>
        </div>
          
        <div class="form-group">
            <label for="prenom" class="col-lg-2 control-label">Prénom: </label>
            <div class="col-lg-4">
                <input type="text" name="prenom" class="form-control" />
            </div>
        </div>
          
        <div class="form-group">
            <label for="classe" class="col-lg-2 control-label">Classe: </label>
            <div class="col-lg-4">
                <?php $htmlTools->afficherSelect("classe", $classes, "classe");?>
            </div>
        </div>

        <hr>
        
        <div class='form-group'>
            <label for="premier" class='col-lg-2 control-label'>Premier choix: </label>
            <div class='col-lg-4'>
                <?php $htmlTools->afficherSelect("premier", $activites, "activite"); ?>
            </div>
        </div>
        
        <div class='form-group'>
            <label for="deuxième" class='col-lg-2 control-label'>Deuxième choix: </label>
            <div class='col-lg-4'>
                <?php $htmlTools->afficherSelect("deuxième", $activites, "activite"); ?>
            </div>
        </div>
        
        <div class='form-group'>
            <label for="troisième" class='col-lg-2 control-label'>Troisième choix: </label>
            <div class='col-lg-4'>
                <?php $htmlTools->afficherSelect("troisième", $activites, "activite"); ?>
            </div>
        </div>        
        
      
        <div class="col-lg-10 col-lg-offset-2">
            <button type="submit" class="btn btn-primary">Confirmer</button>
            <button type="reset" class="btn btn-default">Annuler</button>
        </div>
        
      </form>
   
  </body>
</html>
