<?php
/**
 *
 *
 * @author Loïc Humbert
 */

require_once("./controller/page.php");
require_once './model/fonctionsDB.inc.php';

class Controller_welcome {
    
    //private $DB;
    
    function __construct()
    {
        // Connect to the model
        //$this->DB = new DB();
    }
    
    function index()
    {
        // Create a new empty page
        $this->page = new Page("Welcome");

        // Add datas from the model
        $data = (object) array();

        // Add views
        $this->page->addView("partial/header.php");
        $this->page->addView("welcomeView.php");
        $this->page->addView("partial/footer.php");

        // Render everything together and display it !
        $this->page->render($data);
    }
}
