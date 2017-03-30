<?php
class MasterModel
{
    public $pdo;

    function __construct()
    {
        try {
            $pdo = new PDO("mysql:host=" . Config::PDO_CONFIG['host'] . ";dbname=" . Config::PDO_CONFIG['schema'] . ";charset=utf8", Config::PDO_CONFIG['user'], Config::PDO_CONFIG['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
            echo Config::DEBUG ? "Connected successfully" : "";
        } catch (PDOException $e) {
            echo 'Connection failed : ' . $e->getMessage();
        }
    }

    private function placeholderInsert($count)
    {
        $result = array();
        if($count > 0){
            for($x=0; $x<$count; $x++){
                $result[] = '?';
            }
        }
        return implode(', ', $result);
    }

    private function placeholderUpdate($fields)
    {
        $result = array();
        foreach ($fields as $field){
            $result[] = "$field = ?";
        }
        return implode(', ', $result);
    }

    /*private function placeholderSelectWhere($whereArray)
    {
        $result = array();
        foreach ()
    }*/

    function selectElementById($table, $id)
    {
        $query = "SELECT * FROM $table WHERE id = $id";
        $response = $this->pdo->prepare($query);
        try{
            $response->execute();
        } catch (Exception $e){
            return $e;
        }

        $element = $response->fetch(PDO::FETCH_LAZY);

        return $element;
    }

    function listElements($table)
    {
        $query = "SELECT * FROM $table";
        $response = $this->pdo->prepare($query);
        try{
            $response->execute();
        } catch (Exception $e){
            return $e;
        }

        $elements = $response->fetchAll(PDO::FETCH_ASSOC);

        return $elements;
    }

    function insert($values, $table)
    {
        $placeholder = $this->placeholderInsert(count($values));
        $fields = array();
        $datas = array();
        foreach ($values as $field => $value){
            $fields[] = $field;
            $datas[] = $value;
        }
        $query = "INSERT INTO $table (" . implode(', ', $fields) . ") VALUES ($placeholder)";
        $response = $this->pdo->prepare($query);
        try{
            $response->execute($datas);
        } catch (Exception $e){
            return $e;
        }
        return $this->pdo->lastInsertId();
    }

    function update($values, $table, $id)
    {
        $fields = array();
        $datas = array();
        foreach ($values as $field => $value){
            $fields[] = $field;
            $datas[] = $value;
        }
        $placeholder = $this->placeholderUpdate($fields);
        $query = "UPDATE $table SET $placeholder WHERE id = $id";
        $response = $this->pdo->prepare($query);
        try{
            $response->execute($datas);
        } catch (Exception $e){
            return array(false, $e);
        }
        return array(true);
    }

    function delete($table, $id)
    {
        $query = "DELETE FROM $table WHERE id = $id";
        $response = $this->pdo->prepare($query);
        try {
            $response->execute();
        } catch(Exception $e) {
            return $e->getCode() == 23000 ? array(false, "integrity") : array(false, $e);
        }
        return array(true);
    }

    function selectWhere($table, $where)
    {
        $query = "SELECT FROM $table WHERE $where";
        $response = $this->pdo->prepare($query);
        try {
            $response->execute();
        } catch(Exception $e) {
            return array(false, $e);
        }
        return array(true, $response);
    }

}