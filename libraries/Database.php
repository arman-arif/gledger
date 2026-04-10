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
            error_log("Database connection failed: " . $e->getMessage());
            throw $e;
        }
    }

    public function getDb() {
        return $this->db;
    }

    public function getPdo() {
        return $this->pdo;
    }

    /**
     * Execute a SELECT query with prepared statements
     * @param string $sql SQL query with placeholders
     * @param array $params Parameters to bind
     * @return \PDOStatement|false Result set or false if no rows
     */
    public function select($sql, $params = []) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            if ($stmt->rowCount() > 0) {
                return $stmt;
            } else {
                return false;
            }
        } catch (PDOException $e){
            error_log("SELECT query failed: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Execute an INSERT, UPDATE, or DELETE query with prepared statements
     * @param string $sql SQL query with placeholders
     * @param array $params Parameters to bind
     * @return \PDOStatement|false Statement on success, false on failure
     */
    public function query($sql, $params = []) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e){
            error_log("Query failed: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Fetch all rows from a table (legacy method, use select() instead)
     */
    public function getAll($table) {
        return $this->select("SELECT * FROM $table");
    }

    /**
     * Escape a string using mysqli (legacy, avoid using - prefer prepared statements)
     * @deprecated Use prepared statements instead
     */
    public function escape($str){
        return $this->db->real_escape_string($str);
    }

    /**
     * Escape an array of strings (legacy, avoid using - prefer prepared statements)
     * @deprecated Use prepared statements instead
     */
    public function escape_array($array){
        foreach ($array as $key => $item) {
            $array[$key] = $this->escape($item);
        }
        return $array;
    }

} //end of class