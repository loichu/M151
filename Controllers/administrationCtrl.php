<?php
/**
 * This is the controller for the administration page.
 *
 * In this page we can add, remove or update elements in the DB.
 *
 * @author Loïc Humbert
 * @todo Protect this page with a password
 */

require_once("./Controllers/page.php");
require_once("./Controllers/SecurePage.php");
require_once './model/fonctionsDB.inc.php';

session_start();

class AdministrationCtrl extends SecurePage
{

    //private $DB;

    function init()
    {
        $this->needModel = true;
    }



    /*function index()
    {
        // Create a new empty page
        $this->page = new Page("Administration");

        // Add datas from the model
        $data = (object) array();
        $data->classes = $this->DB->listClasses();
        $data->activites = $this->DB->listActivites();

        // Add views
        $this->page->addView("partial/header.php");
        $this->page->addView("administrationView.php");
        $this->page->addView("partial/footer.php");

        // Render everything together and display it !
        $this->page->render($data);
    }*/

    function classe()
    {
        $this->data->classes = $this->Model->listClasses();

        // Add views
        $this->addView("partial/header.php");
        $this->addView("administration/headView.php");
        $this->addView("administration/classeView.php");
        $this->addView("administration/footView.php");
        $this->addView("partial/footer.php");

        // Render everything together and display it !
        $this->render();
    }

    function activite()
    {
        // Add datas from the model
        $this->data->activites = $this->Model->listActivites();

        // Add views
        $this->addView("partial/header.php");
        $this->addView("administration/headView.php");
        $this->addView("administration/activiteView.php");
        $this->addView("administration/footView.php");
        $this->addView("partial/footer.php");

        // Render everything together and display it !
        $this->render();
    }

    function user()
    {
        // Add datas from the model
        $this->data->users = $this->Model->listUsers();

        // Add views
        $this->addView("partial/header.php");
        $this->addView("administration/headView.php");
        $this->addView("administration/userView.php");
        $this->addView("administration/footView.php");
        $this->addView("partial/footer.php");

        // Render everything together and display it !
        $this->render();
    }

}
