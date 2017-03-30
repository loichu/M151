<?php
/**
 *
 *
 * @author Loïc Humbert
 */

require_once("./Controllers/page.php");
require_once './model/fonctionsDB.inc.php';

class WelcomeCtrl extends Page{
    function index()
    {
        // Add views
        $this->addView("partial/header.php");
        $this->addView("welcomeView.php");
        $this->addView("partial/footer.php");

        // Render everything together and display it !
        $this->render($this->data);
    }
}
