<?php
/**
 * Description of administrationCtrl
 *
 * @author admin
 */
session_start();

require_once './model/fonctionsDB.inc.php';
require_once("page.php");
//$DB = new DB();
//$type = $_GET['type'];
//$id = $_GET['id'];

class UpdateCtrl extends Page
{
    function init()
    {
        $this->needModel = true;
    }
    
    function classe($param)
    {
        //$this->page = new Page("Update");

        $id = $param[0];
        
        //$data = (object) array();
        $this->data->type = "classe";
        $this->data->id = $id;
        $this->data->element = $this->Model->getClasse($id);
        
        $this->addView("partial/header.php");
        $this->addView("updateView.php");
        $this->addView("partial/footer.php");
        
        $this->render();
    }
    
    function activite($param)
    {
        //$this->page = new Page("Update");

        $id = $param[0];

        //$data = (object) array();
        $this->data->type = "activite";
        $this->data->id = $id;
        $this->data->element = $this->Model->getActivite($id);
        
        $this->addView("partial/header.php");
        $this->addView("updateView.php");
        $this->addView("partial/footer.php");
        
        $this->render();
    }

    function user($param)
    {
        $id = $param[0];

        $this->data->id = $id;
        $this->data->user = $this->Model->getUser($id);

        $this->addView("partial/header.php");
        $this->addView("updateUserView.php");
        $this->addView("partial/footer.php");

        $this->render();
    }
}
