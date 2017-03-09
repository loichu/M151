<?php

/**
 * Description of administrationCtrl
 *
 * @author admin
 */
require_once("./controller/page.php");
require_once 'fonctionsDB.inc.php';

class controller_api {
    
    private $DB;
    
    function __construct() {
        $this->DB = new DB();
    }

    function index() {
        

        
    }
    
    function add() {
        if (!empty($_POST['nomClasse'])) {
            filter_input(INPUT_POST, "nomClasse");
            $datas = $this->DB->addClasse($_POST);
            echo json_encode($datas);
        } else {
            echo json_encode(array("error" => "error"));
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

}
