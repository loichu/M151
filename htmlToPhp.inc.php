<?php
class htmllTools{
    
    
    function afficherSelect($name, $content, $type){
        
        //var_dump($content);
        
        echo "<select class='form-control' id=$name name=$name>";
        
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
    
}