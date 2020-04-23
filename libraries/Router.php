<?php
namespace libraries;

class Router
{
    private $_uri = array();
    private $_module = array();

    public function add($uri, $path){
        $this->_uri[] = trim($uri, '/');
        if ($path != null){
            $this->_module[] = $path;
        }
    }

    public function deploy(){

        $req_uri = $_SERVER['REQUEST_URI'];

        $parsed_uri = parse_url($req_uri, PHP_URL_PATH);
        $trimmed_uri = trim(trim($parsed_uri, '/'), '/');
        $uri_path = str_replace(PROJ_DIR, "", $trimmed_uri);
        $uri_path = trim($uri_path, '/');
        $uri = explode('/', $uri_path);
        $uri_str_query = $_SERVER['QUERY_STRING'];

        if (in_array($uri_path, $this->_uri)){
            foreach ($this->_uri as $key => $item) {
                if ($item == $uri_path) {
                    if (is_string($this->_module[$key])){
                        //module object or instance call/create
                        $module_name = 'modules\\' . $this->_module[$key];
                        $module = new $module_name;

                        //custom script and css call for modules
                        $methods = get_class_methods($module);
                        $method_script = in_array('get_script', $methods) ? $module->get_script() : '';
                        $method_style = in_array('get_style', $methods) ? $module->get_style() : '';
                        $module_script = !is_null($method_script) ? $method_script : ''; //module custom script
                        $module_header = !is_null($method_style) ? $method_style : ''; //module custom stylesheets

                        //get the page view and set page title
                        $page_title = $module->get_title(); //module page title
                        $this->set_header($page_title, $module_header); //document header
                        $module->get_view(); //module main page view
                        $this->set_footer($module_script); //document footer
                    } else {
                        call_user_func($this->_module[$key]); //calling the function if defined
                    }

                }
            }
        } else {
            if ($uri_path == 'api'){
                require INCL_DIR . 'api.php'; //only for api calling
            }
        }

//        echo '<pre>';
    //        print_r($uri);
    //        print_r($this->_uri);
    //        print_r($this->_module);
    //        print_r($uri_str_query);
//        echo '</pre>';

//        echo $_uriQuery;
//        echo "<br>";
//        echo $uri_path;
//



    }

    public function set_header($page_title, $custom_header){
        require INCL_DIR . "header.php";
    }

    public function set_footer($module_script){
        require INCL_DIR . "footer.php";
    }

}