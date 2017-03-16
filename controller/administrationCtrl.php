<?php
/**
 * This is the controller for the administration page.
 *
 * In this page we can add, remove or update elements in the DB.
 *
 * @author Loïc Humbert
 * @todo Protect this page with a password
 */

require_once("./controller/page.php");
require_once './model/fonctionsDB.inc.php';

class Controller_administration {
    
    private $DB;
    
    function __construct()
    {
        // Connect to the model
        $this->DB = new DB();
    }
    
    function index()
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
    }

    function classe()
    {
        // Create a new empty page
        $this->page = new Page("Administration");

        // Add datas from the model
        $data = (object) array();
        $data->classes = $this->DB->listClasses();
        $data->activites = $this->DB->listActivites();

        // Add views
        $this->page->addView("partial/header.php");
        $this->page->addView("administration/headView.php");
        $this->page->addView("administration/classeView.php");
        $this->page->addView("administration/footView.php");
        $this->page->addView("partial/footer.php");

        // Render everything together and display it !
        $this->page->render($data);
    }

    function activite()
    {
        // Create a new empty page
        $this->page = new Page("Administration");

        // Add datas from the model
        $data = (object) array();
        $data->classes = $this->DB->listClasses();
        $data->activites = $this->DB->listActivites();

        // Add views
        $this->page->addView("partial/header.php");
        $this->page->addView("administration/headView.php");
        $this->page->addView("administration/activiteView.php");
        $this->page->addView("administration/footView.php");
        $this->page->addView("partial/footer.php");

        // Render everything together and display it !
        $this->page->render($data);
    }

    function user()
    {
        // Create a new empty page
        $this->page = new Page("Administration");

        // Add datas from the model
        $data = (object) array();
        $data->classes = $this->DB->listClasses();
        $data->activites = $this->DB->listActivites();

        // Add views
        $this->page->addView("partial/header.php");
        $this->page->addView("administration/headView.php");
        $this->page->addView("administration/userView.php");
        $this->page->addView("administration/footView.php");
        $this->page->addView("partial/footer.php");

        // Render everything together and display it !
        $this->page->render($data);
    }
    
}
