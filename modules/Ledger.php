<?php
namespace modules;

class Ledger {
    private $database = null;
    protected $page_title = null;
    protected $module_script = null;
    protected $module_style = null;

    public function __construct() {
        $this->page_title = "Dashboard";
        $this->module_script = $this->define_script();
        $this->module_style = $this->define_style();
    }

    public function get_view(){
        require PAGE_DIR . 'ledger.php';
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