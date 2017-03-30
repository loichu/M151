<?php

/**
 * This is the internal API.
 *
 * This is usefull for AJAX requests.
 *
 * @author Loïc Humbert
 */
require_once './model/fonctionsDB.inc.php';

session_start();

class ApiCtrl
{
    private $DB;

    function __construct()
    {
        // Connect to the model
        $this->DB = new DB();
    }

    function add($param)
    {
        // Get the parameters
        $type = $param[0];
        //echo $type;
        
        if ($type == "user"){
            if (!empty($_POST['username']) && !empty($_POST['password'])){
                $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
                $password = sha1($_POST['password']);
                $datas = $this->DB->addUser($username, $password);
                echo json_encode($datas);
            } else {
                echo json_encode(array("error" => "Vous devez remplir tous les champs"));
            }
        }
        
        // Check if the field is not empty and exec SQL request in the model.
        if (!empty($_POST['nomElement'])) {
            filter_input(INPUT_POST, 'nomElement', FILTER_SANITIZE_STRING);
            //$datas = $this->DB->add($_POST, $type);
            $datas = $type == "activite" ? $this->DB->addActivite($_POST) : $this->DB->addClasse($_POST);
            echo json_encode($datas);
        } else if ($type != "user") {
            echo json_encode(array("error" => "Vous ne pouvez pas laisser le champ vide"));
        }
    }

    function remove()
    {
        if (!empty($_POST['id']) && !empty($_POST['type'])) {
            filter_input(INPUT_POST, "id");
            filter_input(INPUT_POST, "type");
            $datas = $_POST['type'] == 'activite' ? $this->DB->removeActivite($_POST['id']) : $this->DB->removeClasse($_POST['id']);
            echo json_encode($datas);
        } else {
            echo json_encode(array("error" => "error input"));
        }
    }

    function subscribe()
    {
        if (!empty($_POST['name']) && !empty($_POST['firstname'])) {
            $name = $_POST['name'];
            $firstName = $_POST['firstname'];
            $classe = $_POST['classe'];
            $choices = [$_POST['activite1'], $_POST['activite2'], $_POST['activite3']];

            if (count(array_unique($choices)) < 3) {
                echo json_encode(array("error" => "Vous ne pouvez pas choisir deux fois la même activité"));
                die();
            }
        } else {
            echo json_encode(array("error" => "Vous devez entrer un nom et un prénom"));
            die();
        }

        $response = $this->DB->subscribe($name, $firstName, $classe, $choices);
        echo json_encode($response);
    }

    function update($param)
    {
        $type = $param[0];

        if (!empty($_POST['newName'])) {
            filter_input(INPUT_POST, 'newName', FILTER_SANITIZE_STRING);
            $response = $type == 'activite' ? $this->DB->updateActivite($_POST) : $this->DB->updateClasse($_POST);
            echo json_encode($response);
        } else {
            echo json_encode(array("error" => "Vous ne pouvez pas laisser le champ vide"));
        }

        //header('location:administration');
    }
    
    function checkpassword()
    {
        if (!empty($_POST['username']) && !empty($_POST['password'])){
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = sha1($_POST['password']);
            $response = $this->DB->checkLogin($username, $password);
            if(!isset($response['error'])){
                $_SESSION['username'] = $response['username'];
                $_SESSION['password'] = $response['password'];
                echo json_encode(array("message" => "Connection établie"));
            } else {
                echo json_encode($response);
            }
        } else {
            echo json_encode(array("error" => "Vous devez remplir tous les champs"));

        }
    }

}
