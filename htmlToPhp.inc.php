<?php
class htmllTools{
    
    function afficherSelect($name, $content, $type){
        
        echo "<select class='form-control' id=$name name=$name>";
        
        $type = nom . ucfirst($type);
        
        foreach($content as $id => $element){
            echo "<option value=$id>" . $element["$type"] . "</option>";
        }
        
        echo "</select>";
    }
    
}