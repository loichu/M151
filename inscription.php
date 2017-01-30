<?php
require_once 'htmlToPhp.inc.php';
?>

<!DOCTYPE html"
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Journée Sportive du CFPT</title>
    <link rel="stylesheet" type="text/css" href="https://bootswatch.com/paper/bootstrap.css">
    <script type="text/javascript" src="script.js"></script>
  </head>
  <body>
      
      <h2>Inscription à la journée sportive du CFPT</h2>
      
      <form class="form-horizontal" method="post" action="confirmation.php">
          
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
                <select class="form-control" id="classe" name="classe">
                  <option>Classe 1</option>
                  <option>Classe 2</option>
                  <option>Classe 3</option>
                </select>
            </div>
        </div>

        <hr>
        
        <?php
        afficherSelectActivites("premier");
        afficherSelectActivites("deuxième");
        afficherSelectActivites("troisième");
        ?>
        <!--
        <div class="form-group">
            <label for="choix1" class="col-lg-2 control-label">Premier choix: </label>
            <div class="col-lg-10">
                <select class="form-control" id="choix1" name="choix1">
                    <option selected="selected">Accrobranche</option>
                    <option>Vélo</option>
                    <option>Football</option>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label for="choix2" class="col-lg-2 control-label">Deuxième choix:</label>
            <div class="col-lg-10">
                <select class="form-control" id="choix2" name="choix2">
                    <option>Accrobranche</option>
                    <option selected="selected">Vélo</option>
                    <option>Football</option>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label for="choix3" class="col-lg-2 control-label">Troisième choix:</label>
            <div class="col-lg-10">
                <select class="form-control" id="choix3" name="choix3">
                    <option>Accrobranche</option>
                    <option>Vélo</option>
                    <option selected="selected">Football</option>
                </select>
            </div>
        </div>-->
      
        <div class="col-lg-10 col-lg-offset-2">
            <button type="submit" class="btn btn-primary">Confirmer</button>
            <button type="reset" class="btn btn-default">Annuler</button>
        </div>
        
      </form>
   
  </body>
</html>

