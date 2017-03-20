<?php
$classes = $data->classes;

?>
<div class="col-md-12" style="text-align: center">
    <h2>Insérer une nouvelle classe</h2>

    <div id="formClasse" class="col-md-3 col-lg-3">
        <input type="text" name="nomClasse" id="nomClasse" placeholder="Nom de la classe"/>
        <a href="#" class="btn btn-primary submitElement" data-type="classe" data-table="tableClasse"
           data-field="nomClasse">Ajouter
        </a>
        <!--<a href="#" class="btn btn-primary submitElement" data-type="classe" data-table="tableClasse" data-field="nomClasse">Ajouter</a>
        <input type="button" class="submitElement" data-type="classe" data-table="tableClasse" data-field="nomClasse" value='Ajouter' />-->
    </div>

    <table id="tableClasse" class="col-md-3">
        <?php
        foreach ($classes as $classe) {
            echo "<tr>";
            HtmlTools::addRowInTable($classe['nomClasse'], $classe['idClasse'], "classe");
            echo "</tr>";
        }
        ?>
    </table>
</div>