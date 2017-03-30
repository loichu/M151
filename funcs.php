<?php

// some usefull functions accross the site

function debug($v)
{
    echo "<br /><pre>--- debug: ";
    if (is_array($v)) {
        print_r($v);
    } else {
        print $v;
    }
}

function argsAsArray($args)
{
    $argsArray = $args[0];
    return $argsArray;
}

function getMethod($uri)
{
    $uriArray = explode('/', $uri);

    // In easy php I use M151 directory: have to cut it
    // array_shift($uriArray);
    
    return $uriArray[2];
}


?>
