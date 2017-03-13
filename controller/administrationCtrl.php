<?php
/**
 * Description of administrationCtrl
 *
 * @author admin
 */

require_once("./controller/page.php");
require_once './model/fonctionsDB.inc.php';

class controller_administration {
    
    private $DB;
    
    function __construct(){
        $this->DB = new DB();
    }
    
    function index(){
        $this->page = new Page("administration");
        $data = (object) array();
        $data->title = "Administration";
        $this->page->addView("partial/header.php");
        
        $data->classes = $this->DB->listClasses();
        $data->activites = $this->DB->listActivites();

        $this->page->addView("administrationView.php");

        $this->page->addView("partial/footer.php");
        $this->page->render($data);
    }
    
}
