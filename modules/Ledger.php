<?php
namespace modules;

class Ledger {
    private $database = null;
    protected $page_title = null;
    protected $module_script = null;
    protected $module_style = null;
    private $errors = array();

    public function __construct() {
        $this->page_title = "Ledger";
        $this->module_script = $this->define_script();
        $this->module_style = $this->define_style();
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






    public function set_error($error){
        array_push($this->errors, $error);
    }

    public function get_errors(){
        return $this->errors;
    }

    public function define_script(){
        $script = '';
        $script .= '';
        return $script;
    }
    public function define_style(){
        $stylesheets = '';
        $stylesheets .= '';
        return $stylesheets;
    }

}