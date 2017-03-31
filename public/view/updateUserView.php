<?php
//session_start();

//require_once 'fonctionsDB.inc.php';

//$DB = new DB();
$user = $data->user;
$id = $data->id;
$jquery = Config::BASE_URL . "public/scripts/jqueryUpdateUser.js";
?>
<div class="text-center">
    <div class="col-md-12">
        <h1>Modifier</h1>
    </div>

    <div class="col-md-3">
        <div id="updateForm" class="form-horizontal">
            <div class="form-group">
                Nom d'utilisateur:
                <input type="text" value="<?= $user['username'] ?>" name="username" id="newNameField" data-id="<?= $id ?>"
                       data-type="user"/>
            </div>
            <div class="form-group">
                Ancien mot de passe:
                <input type="password" name="exPswd" id="exPswdField"/>
            </div>
            <div class="form-group">
                Nouveau mot de passe:
                <input type="password"  name="password" id="newPswdField"/>
            </div>

            <input type="button" id="updateButton" value="OK"/>
        </div>
    </div>
</div>

<script
        src="<?= $jquery ?>">
</script>