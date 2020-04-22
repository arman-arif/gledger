<?php


class Router
{
    private $_uri = array();
    private $_path = array();

    public function add($uri, $path){
        $this->_uri[] = trim($uri, '/');
        if ($path != null){
            $this->_path[] = $path;
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
                    include INCL_DIR . "header.php"; //document header
                    include PAGE_DIR . $this->_path[$key] . '.php'; //main page view
                    include INCL_DIR . "footer.php"; //document footer
                }
            }
        } else {
            if ($uri_path == 'api'){
                require PAGE_DIR . 'api.php';
            }
        }

//        echo '<pre>';
//        print_r($uri);
//        print_r($this->_uri);
//        print_r($this->_path);
//        echo '</pre>';

//        echo $_uriQuery;
//        echo "<br>";
//        echo $uri_path;
//
//        echo '<pre>';
//        print_r($_SERVER);
//        echo '</pre>';

//        print_r($uri_str_query);

    }

}