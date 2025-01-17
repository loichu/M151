<?php
class HtmlTools{
    
    
    static function afficherSelect($name, $content, $type){
        
        //var_dump($content);
        
        echo "<select class='form-control' id=$name name=$name>";
        echo "<option value=0 selected='selected' disabled='disabled'>Sélectionnez une $type</option>";
        $type = ucfirst($type);
        
        $idName = "id" . $type;
        $nomName = "nom" . $type;
        
        
        $_SESSION['debug']['select'][$name] = Array();
        foreach($content as $element){
            echo "<option value={$element['id']}>" . $element[$nomName] . "</option>";
        }
        
        echo "</select>";
    }
    
    static function addRowInTable($name, $id, $type){
        
        // echo "<tr>";
        echo "<td width='200'>$name</td>";
        echo "<td width='80'><a href='" . Config::BASE_URL ."update/$type/$id'>Modifier</a></td>";
        //echo "<td width='40'><a href=?type=" . $type . "&id=" . $id . "'>Supprimer</a></td>";
        echo "<td><a href='#' class='rmElement' data-type='" . $type . "' data-id='" . $id . "'>Supprimer</a></td>";
        // echo "</tr>";
    }
    
}