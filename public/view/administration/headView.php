<?php
require_once './public/helpers/phpToHtml.inc.php';

?>
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


<div class="col-md-12">
    <h1>Administration</h1>
</div>
