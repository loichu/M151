<?php
/**
 * This file is the entry point for the site.
 * Every page is loaded from here.
 */

// First we need to do some imports
require_once("./config.php"); // This is a class containing usefull static props
require_once("./funcs.php"); // This file contains usefull functions

// Getting the URI and put args in an array
$uri = $_SERVER["REQUEST_URI"];
$uriArray = explode('/', $uri);

// In easy php I use M151 directory: have to cut it
//array_shift($uriArray);

// First arg is controller, second is method, the rest are parameters
$controller = (isset($uriArray[1])) ? $uriArray[1] : '';
$method = (isset($uriArray[2])) ? $uriArray[2] : '';
$params = (isset($uriArray[3])) ? array_slice($uriArray, 3) : '';
/*$param1 = (isset($uriArray[3])) ? $uriArray[3] : '';
$param2 = (isset($uriArray[4])) ? $uriArray[4] : '';
$param3 = (isset($uriArray[5])) ? $uriArray[5] : '';*/

// be sure that the controller is valid before loading it
if (in_array($controller, Config::$allowed_controller)) {
    require_once("./controller/"  . $controller . "Ctrl.php");
    $ctrl_class_name = "Controller_" . $controller;
    $cont = new $ctrl_class_name();
    if (method_exists($cont, $method)) {
      if (!empty($params)) {
        $cont->$method($params);
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

if (Config::$debug) {
  print "<br /><br /><br />--- debug -----<pre>";
  print_r($params);
  print "</pre>";
}

?>
