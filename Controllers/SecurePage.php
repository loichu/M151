<?php

/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 30.03.17
 * Time: 08:07
 */
require_once("./Controllers/page.php");

class SecurePage extends Page
{
    function secure()
    {
        if (!isset($_SESSION['user']) && !isset($_SESSION['password'])) {
            $this->setTitle("Login");
            $this->addView("loginView.php");
            $this->render();
            die();
        } else {
            $check = $this->Model->checkLogin($_SESSION['username'], $_SESSION['password']);
            if (isset($check['error'])) {
                $this->setTitle("Login");
                $this->data->error = $check['error'];
                $this->addView("loginView.php");
                $this->render();
                die();
            }
        }
    }
}