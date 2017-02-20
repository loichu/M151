<?php
session_start();

require_once 'fonctionsDB.inc.php';

$DB = new DB();
$type = $_GET['type'];
$id = $_GET['id'];

if($type == "activite")
{
    $activite = $DB->getActivite($id);
}
else
{
    $classe = $DB->getClasse($id);
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
    <body class="text-center">
        <div class="col-md-12">
            <h1>Modifier</h1>
        </div>
        
        <div class="col-md-3">
            <form  method="post" action="administration.php">
                <input type="hidden" value="<?= $id ?>" name="id" />
                <input type="hidden" value="<?= $type ?>" name="type" />
                
                <?php
                if($type == "activite")
                {
                ?>    
                    Nom de l'activité :
                    <input type="text" value="<?= $activite['nomActivite'] ?>" name="newName" />
                <?php
                }
                if($type == "classe")
                {
                ?>
                    Nom de la classe :
                    <input type="text" value="<?= $classe['nomClasse'] ?>" name="newName" />
                <?php    
                }
                ?>
                    
                <input type="submit" value="OK" />
            </form>
            
        </div>
            
        <pre>
            <?php
            echo "Type: $type";
            print_r($activite);
            print_r($classe);
            ?>
        </pre>
        
        
    </body>
</html>
