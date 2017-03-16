<?php
//session_start();

//require_once 'fonctionsDB.inc.php';

//$DB = new DB();
$type = $data->type;
$element = $data->element;
$id = $data->id;
$fieldName = "nom" . ucfirst($type);
$jquery = Config::$site_url . "public/scripts/jqueryUpdate.js";
?>
<div class="text-center">
    <div class="col-md-12">
        <h1>Modifier</h1>
    </div>

    <?php
    debug($element);
    ?>

    <div class="col-md-3">
        <div id="updateForm">
            <?php
            if ($type == "activite") {
                ?>
                Nom de l'activité :
                <?php
            }
            if ($type == "classe") {
                ?>
                Nom de la classe :
                <?php
            }
            ?>
            <input type="text" value="<?= $element[$fieldName] ?>" name="newName" id="newNameField" data-id="<?= $id ?>"
                   data-type="<?= $type ?>"/>
            <input type="button" id="updateButton" value="OK"/>
            </form>
        </div>
    </div>
</div>

<script
        src="<?= $jquery ?>">
</script>