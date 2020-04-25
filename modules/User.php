<?php
namespace modules;
use libraries\Database;

class User {
    private $db = null;
    private $table = 'members';

    public function __construct() {
        $this->db = new Database();
    }

    public function userLogin ($usr, $pwd) {
        $usr = $this->db->escape($usr);
        $pwd = $this->db->escape($pwd);
        $enc_pw = md5($pwd);
    }

    public function getUser($id){
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        $res = $this->db->select($sql);

    }
}