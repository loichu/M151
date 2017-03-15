<?php

/**
 * Description of administrationCtrl
 *
 * @author admin
 */
require_once("./controller/page.php");
require_once './model/fonctionsDB.inc.php';

class controller_api {
    
    private $DB;
    
    function __construct() {
        $this->DB = new DB();
    }
    
    function add() {
        
        $args = func_get_args();
        $type = $args[0];
        //$nomType = 'nom' . ucfirst($type);
        if (!empty($_POST['nomElement'])) {
            filter_input(INPUT_POST, 'nomElement', FILTER_SANITIZE_STRING);
            $datas = $this->DB->add($_POST, $type);
            /* if($type == 'classe'){
                $datas = $this->DB->addClasse($_POST);
            } else {
                $datas = $this->DB->addActivite($_POST);
            }*/
            echo json_encode($datas);
        } else {
            echo json_encode(array("error" => "Vous ne pouvez pas laisser le champ vide"));
        }
    }
    
    function remove() {
        // print_r($_POST);
        if (!empty($_POST['id']) && !empty($_POST['type'])) {
            filter_input(INPUT_POST, "id");
            filter_input(INPUT_POST, "type");
            $datas = $this->DB->remove($_POST['id'], $_POST['type']);
            echo json_encode($datas);
        } else {
            echo json_encode(array("error" => "error input"));
        }
    }
    
    function subscribe() {
        
        if(!empty($_POST['name']) && !empty($_POST['firstname']))
        {
            $name = $_POST['name'];
            $firstName = $_POST['firstname'];
            $classe = $_POST['classe'];
            $choices = [$_POST['activite1'], $_POST['activite2'], $_POST['activite3']];

            if(count(array_unique($choices)) < 3)
            {
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
    
    function update() {
        $args = func_get_args();
        $type = $args[0];
        
        if (!empty($_POST['newName'])) {
            filter_input(INPUT_POST, 'newName', FILTER_SANITIZE_STRING);
            $datas = $this->DB->update($type, $_POST);
            echo json_encode($datas);
        } else {
            echo json_encode(array("error" => "Vous ne pouvez pas laisser le champ vide"));
        }
        
        header('location:administration');
    }

}
