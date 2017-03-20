<?php
class HtmlTools{
    
    
    static function afficherSelect($name, $content, $type){
        
        //var_dump($content);
        
        echo "<select class='form-control' id=$name name=$name>";
        echo "<option value=0 selected='selected' disabled='disabled'>Sélectionnez une $type</option>";
        $type = ucfirst($type);
        
        $idName = "id" . $type;
        $nomName = "nom" . $type;
        
        $_SESSION['debug']['select']['idName'] = $idName;
        $_SESSION['debug']['select']['nomName'] = $nomName;
        $_SESSION['debug']['select']['type'] = $type;
        
        
        $_SESSION['debug']['select'][$name] = Array();
        foreach($content as $element){
            echo "<option value=$element[$idName]>" . $element[$nomName] . "</option>";
            $_SESSION['debug']['select'][$name][] = $element[$idName];
        }
        
        echo "</select>";
    }
    
    static function addRowInTable($name, $id, $type){
        
        // echo "<tr>";
        echo "<td width='100'>$name</td>";
        echo "<td width='10'><a href='" . Config::$site_url ."update/$type/$id'>Modifier</a></td>";
        //echo "<td width='40'><a href=?type=" . $type . "&id=" . $id . "'>Supprimer</a></td>";
        echo "<td width='10'><a href='#' class='rmElement' data-type='" . $type . "' data-id='" . $id . "'>Supprimer</a></td>";
        // echo "</tr>";
    }
    
}