<?php
class htmllTools{
    
    function afficherSelect($name, $content){
        
        echo "<select class='form-control' id=$name name=$name>";
        
        foreach($content as $element){
            echo "<option>" . $element['nomActivite'] . "</option>";
        }
        
        echo "</select>";
    }
    
}