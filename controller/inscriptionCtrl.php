<?php
/**
 * Description of administrationCtrl
 *
 * @author admin
 */

require_once("./controller/page.php");

class controller_administration {
    
    function index(){
        $this->page = new Page("inscription");
        $data = (object) array();
        $data->title = "Inscription";
        //$this->page->addView("partial/header.php");


        $this->page->addView("inscriptionView.php");

        //$this->page->addView("partial/content.php");
        //$this->page->addView("partial/footer.php");
        $this->page->render($data);
    }
    
}
