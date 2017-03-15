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

class controller_update {
    
    private $DB;
    
    function __construct() {
        $this->DB = new DB();
    }
    
    function classe(){
        $this->page = new Page("update");
        
        $args = func_get_args();
        $id = $args[0];
        
        $data = (object) array();
        $data->title = "Update";
        $data->type = "classe";
        $data->id = $id;
        $data->element = $this->DB->getClasse($id);
        
        $this->page->addView("partial/header.php");
        $this->page->addView("updateView.php");
        $this->page->addView("partial/footer.php");
        
        $this->page->render($data);
    }
    
    function activite(){
        $this->page = new Page("update");
        
        $args = func_get_args();
        $id = $args[0];
        
        $data = (object) array();
        $data->title = "Update";
        $data->type = "activite";
        $data->id = $id;
        $data->element = $this->DB->getClasse($id);
        
        $this->page->addView("partial/header.php");
        $this->page->addView("updateView.php");
        $this->page->addView("partial/footer.php");
        
        $this->page->render($data);
    }
    
}
