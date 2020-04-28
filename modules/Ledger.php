<?php
namespace modules;

use libraries\Database;
use libraries\FontEnd;
use libraries\Session;

class Ledger {
    private $database = null;
    private $table = 'ledger';
    protected $page_title = null;
    protected $module_script = null;
    protected $module_style = null;

    public function __construct() {
        $this->page_title = "Ledger";
        $this->module_script = $this->define_script();
        $this->module_style = $this->define_style();
        $this->database = new Database();
    }

    public function get_ledger(){
        $user = Session::get('user_name');
        $query = "SELECT * FROM $this->table WHERE spend_by = '$user'";
        return $this->database->select($query);
    }


    public function get_view(){
        include PAGE_DIR . 'ledger.php';
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
        $script .= FontEnd::bootstrap_tables('js');
        return $script;
    }
    public function define_style(){
        $stylesheets = '';
        $stylesheets .= FontEnd::bootstrap('css');
        return $stylesheets;
    }

}