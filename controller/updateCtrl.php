<?php
/**
 * Description of administrationCtrl
 *
 * @author admin
 */
session_start();

require_once './model/fonctionsDB.inc.php';
require_once("./controller/page.php");
//$DB = new DB();
//$type = $_GET['type'];
//$id = $_GET['id'];

class Controller_update {
    
    private $DB;
    
    function __construct() {
        $this->DB = new DB();
    }
    
    function classe($param){
        $this->page = new Page("Update");

        $id = $param[0];
        
        $data = (object) array();
        $data->type = "classe";
        $data->id = $id;
        $data->element = $this->DB->getClasse($id);
        
        $this->page->addView("partial/header.php");
        $this->page->addView("updateView.php");
        $this->page->addView("partial/footer.php");
        
        $this->page->render($data);
    }
    
    function activite($param){
        $this->page = new Page("Update");

        $id = $param[0];

        $data = (object) array();
        $data->type = "activite";
        $data->id = $id;
        $data->element = $this->DB->getActivite($id);
        
        $this->page->addView("partial/header.php");
        $this->page->addView("updateView.php");
        $this->page->addView("partial/footer.php");
        
        $this->page->render($data);
    }
    
}
