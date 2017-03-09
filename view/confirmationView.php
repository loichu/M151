<?php
include "fonctionsDB.inc.php";
session_start();

if(!empty($_POST['nom']) && !empty($_POST['prenom']))
{
    $name = $_POST['nom'];
    $firstName = $_POST['prenom'];
    $classe = $_POST['classe'];
    $choices = [$_POST['premier'], $_POST['deuxième'], $_POST['troisième']];
    
    if(count(array_unique($choices)) < 3)
    {
        $_SESSION['error']['identical records'] = "<br /> Vous ne pouvez pas choisir deux fois la même activité"; 
        header("location: inscription.php");
        die();
    }
} else {
    $_SESSION['error']['no name'] = "<br /> Vous devez entrer un nom et un prénom"; 
    header("location: inscription.php");
    die();
}

$DB = new DB();

/*$name = $_POST['nom'];
$firstName = $_POST['prenom'];
$classe = $_POST['classe'];
$choices = [$_POST['premier'], $_POST['deuxième'], $_POST['troisième']];*/

$DB->subscribe($name, $firstName, $classe, $choices);
?>

<html>
    
    <br />
    
    Vous avez été enregistré avec succès
    
    <br />
    
    <a href="inscription.php"><button>Inscription</button></a>
    <a href="administration.php"><button>Administration</button></a>
    
    
    
    <pre>
        
    </pre>
</html>

