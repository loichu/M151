<?php
class DB {
    private $host = "localhost";
    private $username = "m151";
    private $password = "12345";
    private $DB_name = "journeesportive";
    
    public $bdd;
    
    function __construct() {
        try {
            $bdd = new PDO("mysql:host={$this->host};dbname={$this->DB_name};charset=utf8", $this->username, $this->password);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->bdd = $bdd;
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo 'Connection failed : ' . $e->getMessage();
        }
    }
    
    function getActivites(){
        
        $reponse = $this->bdd->prepare('SELECT * FROM activite');
        $reponse->execute();
        
        $activites = $reponse->fetchAll(PDO::FETCH_ASSOC);
    
        return $activites;
    }
    
    function  getClasses(){
        
        $reponse = $this->bdd->prepare('SELECT * FROM classe');
        $reponse->execute();
        
        $classes = $reponse->fetchAll(PDO::FETCH_ASSOC);
    
        return $classes;
    }
}