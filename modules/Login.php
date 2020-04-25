<?php
namespace modules;

use libraries\Database;
use libraries\FontEnd;
use libraries\Session;

class Login {
    private $database = null;
    protected $page_title = null;
    protected $module_script = null;
    protected $module_style = null;
    private $db_pdo = null;

    public function __construct() {
        $this->database = new Database();
        $this->page_title = "Login";
        $this->module_script = $this->define_script();
        $this->module_style = $this->define_style();
        $this->db_pdo = $this->database->getPdo();
    }

    public function get_view(){
        include PAGE_DIR . 'login.php';
    }

    public function get_title(){
        return $this->page_title;
    }

    public function get_script(){
        return $this->module_script;
    }

    public function get_style(){
        return $this->module_style;
    }

    public function define_script(){
        $script = '';
//        $script .= FontEnd::materialjs_script();
        $script .= FontEnd::feather_icons();
        $script .=  '<script>
          feather.replace()
        </script>';
        return $script;
    }
    public function define_style(){
        $stylesheets = (string) '';
//        $stylesheets = FontEnd::materialjs_style();
//        $stylesheets .= FontEnd::materialjs_icon();
        return $stylesheets;
    }

}