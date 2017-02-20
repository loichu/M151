<?php
ini_set('display_errors', 1);
ini_set('display_startuperrors', 1);
error_reporting(E_ALL);

require_once 'htmlToPhp.inc.php';
require_once 'fonctionsDB.inc.php';

$htmlTools = new htmllTools();
$myDB = new DB();

$activites = $myDB->listActivites();
$classes = $myDB->listClasses();
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
            <div class="col-lg-10">
                <input type="text" name="nom" />
            </div>
        </div>
          
        <div class="form-group">
            <label for="prenom" class="col-lg-2 control-label">Prénom: </label>
            <div class="col-lg-10">
                <input type="text" name="prenom" />
            </div>
        </div>
          
        <div class="form-group">
            <label for="classe" class="col-lg-2 control-label">Classe: </label>
            <div class="col-lg-10">
                <?php $htmlTools->afficherSelect("classe", $classes);?>
            </div>
        </div>

        <hr>
        
        <div class='form-group'>
            <label for="premier" class='col-lg-2 control-label'>Premier choix: </label>
            <div class='col-lg-10'>
                <?php $htmlTools->afficherSelect("premier", $activites); ?>
            </div>
        </div>
        
        <div class='form-group'>
            <label for="deuxième" class='col-lg-2 control-label'>Deuxième choix: </label>
            <div class='col-lg-10'>
                <?php $htmlTools->afficherSelect("deuxième", $activites); ?>
            </div>
        </div>
        
        <div class='form-group'>
            <label for="troisième" class='col-lg-2 control-label'>Troisième choix: </label>
            <div class='col-lg-10'>
                <?php $htmlTools->afficherSelect("troisième", $activites); ?>
            </div>
        </div>        
        
      
        <div class="col-lg-10 col-lg-offset-2">
            <button type="submit" class="btn btn-primary">Confirmer</button>
            <button type="reset" class="btn btn-default">Annuler</button>
        </div>
        
      </form>
   
  </body>
</html>

