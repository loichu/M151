<?php
/**
 * This file is the entry point for the site.
 * Every page is loaded from here.
 */


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// First we need import a few things
require_once("./config.php"); // This is a class containing usefull static props
require_once("./funcs.php"); // This file contains usefull functions

// Getting the URI and put args in an array
$uri = $_SERVER["REQUEST_URI"];
$uriArray = explode('/', $uri);

// Define some constants
define("CONTROLLERS_DIR", "./Controllers/");

// If you don't have a virtual host you should use one or many subdirectories
// after localhost to be able to host more than one site.
// In the Config class you can precise if it's your case or not and choose the
// number of subdirectories. (default: off)
if(Config::NO_VHOST['activated']){
    array_slice($uriArray, Config::NO_VHOST['urlSub']);
}

// First arg is controller, second is method, the rest are parameters
$controller = (isset($uriArray[1])) ? $uriArray[1] : '';
$method = (isset($uriArray[2])) ? $uriArray[2] : '';
$params = (isset($uriArray[3])) ? array_slice($uriArray, 3) : '';

// be sure that the controller is valid before loading it
if (file_exists(CONTROLLERS_DIR . $controller . "Ctrl.php"))
{
    require_once("./Controllers/"  . $controller . "Ctrl.php");
    $ctrl_class_name = ucfirst($controller) . "Ctrl";
    $cont = new $ctrl_class_name(ucfirst($controller));
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
} else if(empty($controller)) {
    header("location:welcome");
} else {
    require_once "./Controllers/page.php";
    $page = new Page("Error 404");
    $page->addView("partial/header.php");
    $page->addView("404.php");
    $page->addView("partial/footer.php");
    $data = (object) array();
    $page->render($data);
}

if (Config::DEBUG) {
  print "<br /><br /><br />--- debug -----<pre>";
  print_r($params);
  print "</pre>";
}

?>
