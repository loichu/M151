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
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo 'Connection failed : ' . $e->getMessage();
        }
    }
    
    function getActivite($id){
        $reponse = $this->bdd->prepare('SELECT * FROM activite WHERE idActivite = (:id)');
        $reponse->bindParam('id', $id);
        $reponse->execute();
        
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
    
    function addClasse($data)
    {
        $req = $this->bdd->prepare("INSERT INTO classe (nomClasse) VALUES (:nomClasse)");
        $req->bindParam(':nomClasse', $data['nomClasse']);
        
        try{
            $req->execute();
            $_SESSION['message'] = "La classe a été ajoutée avec succès !";
        } catch (Exception $ex) {
            $_SESSION['error'] = "Une erreur s'est produite lors de l'ajout de la classe ($ex)";
        }
    }
    
    function addActivite($data)
    {
        $req = $this->bdd->prepare("INSERT INTO activite (nomActivite) VALUES (:nomActivite)");
        $req->bindParam(':nomActivite', $data['nomActivite']);
        
        try{
            $req->execute();
            $_SESSION['message'] = "L'activité a été ajoutée avec succès !";
        } catch (Exception $ex) {
            $_SESSION['error'] = "Une erreur s'est produite lors de l'ajout de l'activite ($ex)";
        }
    }
    
    function update($id, $type, $data)
    {
        $fieldName = "nom" . ucfirst($type);
        $fieldID = "id" . ucfirst($type);
        
        $req = $this->bdd->prepare("UPDATE (:type) SET (:fieldName) = (:newName) WHERE (:fieldID) = (:id)");
        $req->bindParam(':type', $type);
        $req->bindParam(':fieldName', $fieldName);
        $req->bindParam(':newName', $data['newName']);
        $req->bindParam(':fieldID', $fieldID);
        $req->bindParam(':id', $id);
        
        try{
            $req->execute();
            $_SESSION['message'] = "La $type a été modifiée avec succès !";
        } catch (Exception $ex) {
            $_SESSION['error'] = "Une erreur s'est produite lors de l'ajout de la $type ($ex)";
        }
    }
}