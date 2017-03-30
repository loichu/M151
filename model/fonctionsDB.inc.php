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
    
    /*function _update($type, $data)
    {
       
        if($type=="classe"){
            $req = $this->bdd->prepare("UPDATE classe SET nomClasse = :newName WHERE idClasse = :id");
        } else {
            $req = $this->bdd->prepare("UPDATE activite SET nomActivite = :newName WHERE idActivite = :id");
        }
        
        $req->bindParam(':newName', $data['newName']);
        $req->bindParam(':id', $data['id']);
        
        try{
            $req->execute();
            return array("message" => "La $type a été modifiée avec succès !");
        } catch (Exception $ex) {
            return array("error" => "Une erreur s'est produite lors de la modification de la $type ($ex)");
        }
    }*/

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
    }

    function removeClasse($id)
    {
        $returnArray = $this->delete('classe', $id);
        if(!$returnArray[0]){
            if($returnArray[1] == "integrity"){
                return array("error" => "Vous ne pouvez pas supprimer cette classe. Elle est liée à une inscription.");
            } else {
                return array("error" => $returnArray[1]);
            }
        }
    }
    
    /*function remove($id, $type)
    {
        if($type=="classe"){
            $req = $this->bdd->prepare("DELETE FROM classe WHERE idClasse = :id");
        } else {
            $req = $this->bdd->prepare("DELETE FROM activite WHERE idActivite = :id");
        }
        
        $req->bindParam(':id', $id);
        
        try{
            $req->execute();
            // $_SESSION['message'] = "La $type a été supprimé avec succès !";
            return array('id' => $id, 'data' => $type);
        } catch (Exception $ex) {
            // $_SESSION['error'] = "Une erreur s'est produite lors de la suppression de la $type ($ex)";
            if($ex->getCode() == 23000){
                return array("error" => "You can't remove this. It's linked to another element.");
            } else {
                return array("error" => "Something went wrong");
            }
            
        }
    }*/
    
    function subscribe($name, $firstName, $classe, $choices)
    {
        $values = array(
            "nom" => $name,
            "prenom" => $firstName,
            "fkClasse" => $classe
        );
        $lastInsertId = $this->insert($values, 'eleve');
        if(!is_numeric($lastInsertId)){
            return array("error" => "L'utilisateur n'a pas pu être enregistré ($lastInsertId)");
        }
        foreach ($choices as $index => $choice)
        {
            $values = array(
                "fkEleve" => $lastInsertId,
                "fkActivite" => $choice,
                "ordrePref" => $index
            );
            $lastInsertId = $this->insert($values, 'inscrire');
            if (!is_numeric($lastInsertId)) $error = $lastInsertId;
        }
        if(isset($error)){
            return array("error" => "$firstName n'a pas pu être inscrit ($error)");
        } else {
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
        /* Check user and password at once
        $req = $this->pdo->prepare("SELECT username FROM users WHERE username = (:username) AND password = (:password)");
        $req->bindParam(":username", $username);
        $req->bindParam(":password", $password);
        try {
            $req->execute();
            return array("username" => $username, "password" => $password);
        } catch (Exception $ex) {
            return array("error" => "Votre identifiant ou mot de passe est erronné");
        }*/
    }
}