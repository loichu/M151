<?php
$users = $data->users;
?>
<div class="col-md-6">
    
    <div class='alert alert-dismissible alert-warning' hidden="true" id='errorAlert'>
        <button type='button' class='close' onclick="$('.alert-warning').hide()">&times;</button>
        <h4>Warning!</h4>
        <p id='errorMessage'></p>
    </div>

    <div class='alert alert-dismissible alert-success' hidden="true" id='successAlert'>
        <button type='button' class='close' onclick="$('.alert-success').hide()"> &times;</button>
        <h4>Succès!</h4>
        <p id='successMessage'></p>
    </div>
    
    <h2>Insérer un nouvel administrateur</h2>

    <table id="tableUser">
        <?php
        foreach ($users as $user) {
            echo "<tr>";
            HtmlTools::addRowInTable($user['username'], $user['idUser'], "user");
            echo "</tr>";
        }
        ?>
    </table>

    <div class="form-horizontal" id="formUser">
        
        <div class="form-group">
            <input type="text" name="username" id="username" placeholder="Nom d'utilisateur"/>
        </div>
        
        <div class="form-group">
            <input type="password" name="password" id="password" placeholder="Mot de passe"/>
        </div>
        
        <div class="form-group">
            <button id="createUser" class="btn btn-primary" data-table="tableUser">
                Confirmer
            </button>
        </div>
        
        <!--<a href="#" class="btn btn-primary submitElement" data-type="activite" data-table="tableActivite" data-field="nomActivite">Ajouter</a>
        <input type='button' class="btn btn-primary submitElement" data-type="activite" data-table="tableActivite" data-field="nomActivite" value="Ajouter" />-->
    </div>
</div>
