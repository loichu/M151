<?php
require_once "./model/MasterModel.php";
class DB extends MasterModel
{
    function getActivite($id)
    {
        return $this->selectElementById("activite", $id);
    }
    
    function getClasse($id)
    {
        return $this->selectElementById("classe", $id);
    }
    
    function listActivites()
    {    
        return $this->listElements("activite");
    }
    
    function  listClasses()
    {    
        return $this->listElements("classe");
    }
    
    function  listUsers()
    {
        return $this->listElements("users");
    }

    function addActivite($data)
    {
        $datas = array(
            "nomActivite" => $data['nomElement']
        );
        $insertId = $this->insert($datas, "activite");
        if(is_numeric($insertId)){
            return array("id" => $insertId, "data" => $data['nomElement'], "type" => "activite");
        } else {
            return array("error" => "error: db $insertId");
        }
    }

    function addClasse($data)
    {
        $datas = array(
            "nomClasse" => $data['nomElement']
        );
        $insertId = $this->insert($datas, "classe");
        if(is_numeric($insertId)){
            return array("id" => $insertId, "data" => $data['nomElement'], "type" => "classe");
        } else {
            return array("error" => "error: db $insertId");
        }
    }

    function addUser($username, $password)
    {
        $datas = array(
            "username" => $username,
            "password" => $password
        );
        $insertId = $this->insert($datas, "users");
        if(is_numeric($insertId)){
            return array("id" => $insertId, "username" => $username, "password" => $password, "type" => "user");
        } else {
            return array("error" => "error: db $insertId");
        }
    }

    function updateActivite($data)
    {
        $id = $data['id'];
        unset($data['id']);
        $returnArray = $this->update($data, 'activite', $id);
        if($returnArray[0]){
            return array("message" => "L'activité a été modifiée avec succès !");
        } else {
            return array("error" => "Une erreur s'est produite lors de la modification de l'activité ($returnArray[1])");
        }
    }

    function updateClasse($data)
    {
        $id = $data['id'];
        unset($data['id']);
        $returnArray = $this->update($data, 'classe', $id);
        if($returnArray[0]){
            return array("message" => "La classe a été modifiée avec succès !");
        } else {
            return array("error" => "Une erreur s'est produite lors de la modification de la classe ($returnArray[1])");
        }
    }

    function removeActivite($id)
    {
        $returnArray = $this->delete('activite', $id);
        if(!$returnArray[0]){
            if($returnArray[1] == "integrity"){
                return array("error" => "Vous ne pouvez pas supprimer cette activité. Elle est liée à une inscription.");
            } else {
                return array("error" => $returnArray[1]);
            }
        }
        return array("message" => "success");
    }

    function removeClasse($id)
    {
        $returnArray = $this->delete('classe', $id);
        if (!$returnArray[0]) {
            if ($returnArray[1] == "integrity") {
                return array("error" => "Vous ne pouvez pas supprimer cette classe. Elle est liée à une inscription.");
            } else {
                return array("error" => $returnArray[1]);
            }
        }
        return array("message" => "success");
    }
    
    function subscribe($name, $firstName, $classe, $choices)
    {
        $values = array(
            "nom" => $name,
            "prenom" => $firstName,
            "fkClasse" => $classe
        );
        $this->pdo->beginTransaction();
        $lastInsertIdEleve = $this->insert($values, 'eleve');
        if(!is_numeric($lastInsertIdEleve)){
            return array("error" => "L'utilisateur n'a pas pu être enregistré ($lastInsertIdEleve)");
        }
        foreach ($choices as $index => $choice)
        {
            $values = array(
                "fkEleve" => $lastInsertIdEleve,
                "fkActivite" => $choice,
                "ordrePref" => $index
            );
            $lastInsertIdChoice = $this->insert($values, 'inscrire');
            if (!is_numeric($lastInsertIdChoice)) $error = $lastInsertIdChoice;
        }
        if(isset($error)){
            $this->pdo->rollBack();
            return array("error" => "$firstName n'a pas pu être inscrit ($error)");
        } else {
            $this->pdo->commit();
            return array("message" => "$firstName a été inscrit");
        }
    }
    
    function checkLogin($username, $password)
    {
        $where = "username = $username AND password = $password";
        $returnArray = $this->selectWhere('users', $where);
        if($returnArray[0]){
            return array("error" => "Votre identifiant ou mot de passe est erronné");
        } else {
            return array("username" => $username, "password" => $password);
        }
    }
}