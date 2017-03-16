<?php
$classes = $data->classes;

?>
<div class="col-md-6">
    <h2>Insérer une nouvelle classe</h2>

    <table id="tableClasse">
        <?php
        foreach ($classes as $classe) {
            echo "<tr>";
            HtmlTools::addRowInTable($classe['nomClasse'], $classe['idClasse'], "classe");
            echo "</tr>";
        }
        ?>
    </table>

    <div id="formClasse">
        <input type="text" name="nomClasse" id="nomClasse" placeholder="Nom de la classe"/>
        <a href="#" class="btn btn-primary submitElement" data-type="classe" data-table="tableClasse"
           data-field="nomClasse">Ajouter
        </a>
        <!--<a href="#" class="btn btn-primary submitElement" data-type="classe" data-table="tableClasse" data-field="nomClasse">Ajouter</a>
        <input type="button" class="submitElement" data-type="classe" data-table="tableClasse" data-field="nomClasse" value='Ajouter' />-->
    </div>

</div>