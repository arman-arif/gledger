<?php
namespace modules;

use Exception;

class Expenses {
    private $database = null;
    protected $page_title = null;
    protected $module_script = null;
    protected $module_style = null;
    private $errors = array();

    public function __construct() {
        $this->page_title = "Dashboard";
        $this->module_script = $this->define_script();
        $this->module_style = $this->define_style();  
    }

    public function get_view(){
        try{
            include PAGE_DIR . 'expenses.php';
        } catch (Exception $e){
            $this->set_error($e->getMessage());
        }
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
        $script = '<script src="https://unpkg.com/material-components-web@v4.0.0/dist/material-components-web.min.js"></script>';
        $script .= '';
        return $script;
    }
    public function define_style(){
        $stylesheets = '<link href="https://unpkg.com/material-components-web@v4.0.0/dist/material-components-web.min.css" rel="stylesheet">';
        $stylesheets .= '';
        return $stylesheets;
    }
}