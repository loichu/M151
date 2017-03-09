<?php
/**
 * Description of administrationCtrl
 *
 * @author admin
 */

require_once("./controller/page.php");

class controller_administration {
    
    function index(){
        $this->page = new Page("administration");
        $data = (object) array();
        $data->title = "Administration";
        //$this->page->addView("partial/header.php");


        $this->page->addView("administrationView.php");

        //$this->page->addView("partial/content.php");
        //$this->page->addView("partial/footer.php");
        $this->page->render($data);
    }
    
}
