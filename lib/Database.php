<?php

class Database {
    private $pdo = null;
    private $db = null;

    public function __construct(){
        try {
            $pdo = new PDO(DSN, USR, PWD);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
            $this->db = new mysqli(HST, USR, PWD, DBN);
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getDb() {
        return $this->db;
    }

    public function getPdo() {
        return $this->pdo;
    }

    public function getAll($table){
        $stmt = $this->pdo->query("SELECT * FROM $table");

        return $stmt->fetch();
    }

    public function escape($str){
        return $this->db->real_escape_string($str);
    }

    public function select($query){
        try {
            return  $this->pdo->query($query);
        } catch (PDOException $e){
            $e->getMessage();
        }
    }


}