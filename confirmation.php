<?php
include "fonctionsDB.inc.php";
session_start();
echo "<pre>";
echo $_SESSION['message'];
echo $_SESSION['error'];
echo "</pre>";

$DB = new DB();

$name = $_POST['nom'];
$firstName = $_POST['prenom'];
$classe = $_POST['classe'];
$choices = [$_POST['premier'], $_POST['deuxième'], $_POST['troisième']];

$DB->subscribe($name, $firstName, $classe, $choices);
?>

<html>
    <pre>
        <?php
        var_dump($_POST);
        var_dump($choices);
        ?>
    </pre>
</html>

