<?php
session_start();

require_once 'fonctionsDB.inc.php';

$DB = new DB();

$activites = $DB->listActivites();
$classes = $DB->listClasses();

if(!empty($_POST['nomClasse']))
{
    $DB->addClasse($_POST);
    header("location:administration.php");
}

if(!empty($_POST['nomActivite']))
{
    $DB->addActivite($_POST);
    header("location:administration.php");
}

if(!empty($_POST['newName']))
{
    $id = $_POST['id'];
    $type = $_POST['type'];
    $DB->update($id, $type, $_POST);
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
        <div class="col-md-12">
            <?php
            if(!empty($_SESSION['error'])){
                echo $_SESSION['error'];
                $_SESSION['error'] = "";
            }
           
            if(!empty($_SESSION['message'])){
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
            
            <table>
                <?php
                foreach ($classes as $classe)
                {
                    echo "<tr>";
                    echo "<td width='200'>$classe[nomClasse]</td>";
                    echo "<td width='40'><a href='update.php?type=classe&id=" . $classe['idClasse'] . "'>Modifier</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
            
            <form method="post">
                <input type ="text" name="nomClasse" placeholder="Nom de la classe"/>
                <input type="submit" value='Ajouter' />
            </form>
        </div>
        
        <div class="col-md-6">
            <h2>Insérer une nouvelle activité</h2>
            
            <table>
                <?php
                foreach ($activites as $activite)
                {
                    echo "<tr>";
                    echo "<td width='200'>$activite[nomActivite]</td>";
                    echo "<td width='40'><a href='update.php?type=activite&id=" . $activite['idActivite'] . "'>Modifier</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
            
            <form method="post">
                <input type ="text" name="nomActivite" placeholder="Nom de l'activité"/>
                <input type='submit' value="Ajouter" />
            </form>
        </div>
        
        <pre>
            <?php print_r($activites) ?>
        </pre>
    </body>
</html>
