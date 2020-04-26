<?php
namespace libraries;
use \PDO;
use \PDOException;
use \mysqli;

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

    public function getAll($table) {
        try {
            $stmt = $this->pdo->query("SELECT * FROM $table");
            if ($stmt->rowCount() > 0) {
                return $stmt;
            } else {
                return false;
            }
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function escape($str){
        return $this->db->real_escape_string($str);
    }

    public function escape_array($array){
        foreach ($array as $key => $item) {
            $array[$key] = $this->escape($item);
        }
        return $array;
    }

    public function select($query){
        try {
            $stmt = $this->pdo->query($query);
            if ($stmt->rowCount() > 0) {
                return $stmt;
            } else {
                return false;
            }
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function query($query){
        try {
            $stmt = $this->pdo->query($query);
            if ($stmt)
                return $stmt;
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }


} //end of class

//$result_set = $pdo->prepare("INSERT INTO `users` (`username`, `password`, `first_name`, `last_name`) VALUES (:username, :password, :first_name, :last_name)");
//$result_set->execute(array(
//    ':username' => '~user',
//    ':password' => '~pass',
//    ':first_name' => '~John',
//    ':last_name' => '~Doe'
//));