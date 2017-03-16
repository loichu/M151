<?php
class DB {
    private $host = "localhost";
    private $username = "m151";
    private $password = "12345";
    private $DB_name = "journeesportive";
    
    public $bdd;
    
    function __construct() 
    {
        try {
            $bdd = new PDO("mysql:host={$this->host};dbname={$this->DB_name};charset=utf8", $this->username, $this->password);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->bdd = $bdd;
            //echo "Connected successfully";
        } catch (PDOException $e) {
            echo 'Connection failed : ' . $e->getMessage();
        }
    }
    
    function getActivite($id){
        $reponse = $this->bdd->prepare('SELECT * FROM activite WHERE idActivite = (:id)');
        $reponse->bindParam('id', $id);
        try{
            $reponse->execute();
        } catch (Exception $e){
            echo $e;
        }

        $activite = $reponse->fetch(PDO::FETCH_ASSOC);
    
        return $activite;
    }
    
    function getClasse($id){
        $reponse = $this->bdd->prepare('SELECT * FROM classe WHERE idClasse = (:id)');
        $reponse->bindParam('id', $id);
        $reponse->execute();
        
        $classe = $reponse->fetch(PDO::FETCH_ASSOC);
    
        return $classe;
    }
    
    function listActivites()
    {    
        $reponse = $this->bdd->prepare('SELECT * FROM activite');
        $reponse->execute();
        
        $activites = $reponse->fetchAll(PDO::FETCH_ASSOC);
    
        return $activites;
    }
    
    function  listClasses()
    {    
        $reponse = $this->bdd->prepare('SELECT * FROM classe');
        $reponse->execute();
        
        $classes = $reponse->fetchAll(PDO::FETCH_ASSOC);
    
        return $classes;
    }
    
    
    
    function add($data, $type)
    {
        if($type == 'classe'){
            $req = $this->bdd->prepare("INSERT INTO classe (nomClasse) VALUES (:nom)");
        } else {
            $req = $this->bdd->prepare("INSERT INTO activite (nomActivite) VALUES (:nom)");
        }
        
        $req->bindParam(':nom', $data['nomElement']);
        
        try{
            $req->execute();
            //$_SESSION['message'] = "La $type a été ajoutée avec succès !";
            return array("id" => $this->bdd->lastInsertId(), "data" => $data['nomElement'], "type" => $type);
        } catch (Exception $ex) {
            //$_SESSION['error'] = "Une erreur s'est produite lors de l'ajout de la $type ($ex)";
            return array("error" => "error: db $ex");
        }
    }
    
    function update($type, $data)
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
    }
    
    function remove($id, $type)
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
    }
    
    function subscribe($name, $firstName, $classe, $choices){
        
        $addEleveReq = $this->bdd->prepare("INSERT INTO eleve (nom, prenom, fkClasse) VALUES (:name, :firstName, :classe)");
        $addEleveReq->bindParam(":name", $name);
        $addEleveReq->bindParam(":firstName", $firstName);
        $addEleveReq->bindParam(":classe", $classe);
        
        $_SESSION = array();
        
        $_SESSION['debug']['params'] = [$name, $firstName, $classe, $choices]; 
        
        try {
            $addEleveReq->execute();
            //$_SESSION['message']['classe'] = "L'utilisateur a été enregistré";
        } catch (Exception $exc) {
            //echo $exc->getTraceAsString();
            return array("error" => "L'utilisateur n'a pas pu être enregistré" . $exc);
        }
        
        $lastInsertId = $this->bdd->lastInsertId();
        $_SESSION['debug']['lastInsertId'] = $lastInsertId;        
        
        foreach ($choices as $id => $choice)
        {
            $req = "addChoice" . "$id";
            
            $_SESSION['debug']['foreach'] = [$id, $choice]; 
            
            $$req = $this->bdd->prepare("INSERT INTO inscrire (fkEleve, fkActivite, ordrePref) VALUES (:eleve, :activite, :ordre)");
            $$req->bindParam(":eleve", $lastInsertId);
            $$req->bindParam(":activite", $choice);
            $$req->bindParam(":ordre", $id);
            /*
            try {
                $$req->execute();
                $_SESSION['message']["activite$id"] = "L'activité $id a été enregistrée";
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
                $_SESSION['error']["activite$id"] = "L'activité $id pas enregistré" . $exc;
            }*/
        }
        try {
            foreach ($choices as $id => $choice){
                $req = "addChoice" . "$id";
                $$req->execute();
            }
            return array("message" => "$firstName a été inscrit");
        } catch (Exception $ex) {
            return array("error" => "$firstName n'a pas pu être inscrit" . $ex);
        }
    }
    
    function checkLogin($username, $password)
    {
        // Check user and password at once
        $req = $this->bdd->prepare("SELECT username FROM user WHERE username = (:username) AND password = (:password)");
        $req->bindParam(":username", $username);
        $req->bindParam(":password", $password);
        $req->execute();
        $isCorrect = $req->fetchAll(PDO::FETCH_ASSOC);
        return isCorrect;
    }
}