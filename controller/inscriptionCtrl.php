<?php
/**
 * Description of administrationCtrl
 *
 * @author admin
 */

require_once("./controller/page.php");
require_once './model/fonctionsDB.inc.php';

class controller_inscription {
    
    private $DB;
    
    function __construct(){
        $this->DB = new DB();
    }
    
    function index(){
        $this->page = new Page("inscription");
        $data = (object) array();
        $data->title = "Inscription";
        $this->page->addView("partial/header.php");
        
        $data->classes = $this->DB->listClasses();
        $data->activites = $this->DB->listActivites();

        $this->page->addView("inscriptionView.php");

        //$this->page->addView("partial/content.php");
        $this->page->addView("partial/footer.php");
        $this->page->render($data);
    }
    
}
