<?php
/**
 * Description of administrationCtrl
 *
 * @author admin
 */

require_once("./Controllers/page.php");
require_once './model/fonctionsDB.inc.php';

class InscriptionCtrl extends Page
{
    function init()
    {
        $this->needModel = true;
    }
    
    function index()
    {
        $this->data->classes = $this->Model->listClasses();
        $this->data->activites = $this->Model->listActivites();

        $this->addView("partial/header.php");
        $this->addView("inscriptionView.php");
        $this->addView("partial/footer.php");

        $this->render();
    }
}
