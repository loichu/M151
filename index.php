<?php

require_once("./config.php"); // use $c->property
require_once("./funcs.php"); // use $c->property
$uri = $_SERVER["REQUEST_URI"];
$uriArray = explode('/', $uri);

// In easy php I use M151 directory: have to cut it
array_shift($uriArray);

$controller = (isset($uriArray[1])) ? $uriArray[1] : '';
$method = (isset($uriArray[2])) ? $uriArray[2] : '';
$param1 = (isset($uriArray[3])) ? $uriArray[3] : '';
$param2 = (isset($uriArray[4])) ? $uriArray[4] : '';
$param3 = (isset($uriArray[5])) ? $uriArray[5] : '';

//debug( $controller . " - " . $method . " - " . $param1 . " - " . $param2 . " - " . $param3 );

// be sure that the controller is valid before loading it
if (in_array($controller, $c->allowed_controller)) {
    require_once("./controller/"  . $controller . "Ctrl.php");
    $cntrl_class_name = "controller_" . $controller;
    $cont = new $cntrl_class_name();
    if (method_exists($cont, $method)) {
      if ($param1) {
        $cont->$method($param1, $param2, $param3);
      } else {
        $cont->$method();
      }
  } else {
      // fallback to the default method
      $cont->index();
  }
} else {
    echo "To Do - Load default controller as fallback";
    debug($controller);
}

if ($c->d) {
  print "<br /><br /><br />--- debug -----<pre>";
  print_r($_SERVER);
  print "</pre>";
}

?>
