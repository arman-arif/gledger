<?php
namespace libraries;

class FontEnd {
    //local component, stylesheets location
    private static $reset_css            = 'assets/css/reset.css';
    private static $custom_style         = 'assets/css/style.css';
    private static $bootstrap_style      = 'assets/css/bootstrap.min.css';
    private static $backgridjs_style     = 'assets/vendor/backgrid-0.3.8/lib/backgrid.css';
    private static $bstrap_tables_style  = 'assets/vendor/bootstrap-table/bootstrap-table.min.css';
    private static $fontawesome_style    = 'assets/vendor/font-awesome-4.7.0/css/font-awesome.min.css';
    private static $jquery_ui_style      = 'assets/vendor/jquery-ui-1.12.1/jquery-ui.min.css';
    private static $alertify_style       = 'assets/vendor/alertifyjs/css/alertify.css';
    private static $alertify_theme       = 'assets/vendor/alertifyjs/css/themes/default.css';

    //local components, javascript location
    private static $custom_script     = 'assets/js/script.js'; //javascript
    private static $bootstrap_script     = 'assets/js/bootstrap.min.js'; //javascript
    private static $jquery_script        = 'assets/js/jquery-3.4.1.min.js'; //javascript
    private static $jquery_ui_script     = 'assets/vendor/jquery-ui-1.12.1/jquery-ui.min.js'; //javascript
    private static $popperjs_script      = 'assets/js/popper.min.js'; //javascript
    private static $backgridjs_script    = 'assets/vendor/backgrid-0.3.8/lib/backgrid.js'; //javascript
    private static $backbone_js          = 'assets/vendor/backbone-min.js'; //javascript
    private static $underscore_js        = 'assets/vendor/underscore-min.js'; //javascript
    private static $bstrap_tables_script = 'assets/vendor/bootstrap-table/bootstrap-table.min.js'; //javascript
    private static $feather_icons        = 'assets/vendor/feather.min.js'; //javascript
    private static $alertify_script      = 'assets/vendor/alertifyjs/alertify.js'; //javascript
    private static $sweetalert2_js       = 'assets/vendor/sweetalert2.9.js'; //javascript

    //external cdn links
    private static $materialjs_script    = 'https://unpkg.com/material-components-web@v4.0.0/dist/material-components-web.min.js';
    private static $materialjs_style     = 'https://unpkg.com/material-components-web@v4.0.0/dist/material-components-web.min.css';
    private static $materialjs_icon      = 'https://fonts.googleapis.com/icon?family=Material+Icons';

    //defined local components
    public static function reset_css(){
        return self::local_component(self::$reset_css, 'css');
    }

    public static function fontawesome(){
        return self::local_component(self::$fontawesome_style, 'css');
    }

    public static function jquery(){
        return self::local_component(self::$jquery_script, 'js');
    }

    public static function jquery_ui($type){
        if ($type == 'css')
            return self::local_component(self::$jquery_ui_style, 'css');
        else if ($type == 'js')
            return self::local_component(self::$jquery_ui_script, 'js');
        return '';
    }

    public static function popperjs(){
        return self::local_component(self::$popperjs_script, 'js');
    }

    public static function sweetalert2(){
        return self::local_component(self::$sweetalert2_js, 'js');
    }

    public static function bootstrap($type){
        if ($type == 'css')
            return self::local_component(self::$bootstrap_style, 'css');
        elseif ($type == 'js')
            return self::local_component(self::$bootstrap_script, 'js');
        return '';
    }

    public static function backgridjs($type){
        if ($type == 'css')
            return self::local_component(self::$backgridjs_style, 'css');
        elseif ($type == 'js')
            return self::local_component(self::$backgridjs_script, 'js');
        return '';
    }

    public static function backbone_js(){
        return self::local_component(self::$backbone_js, 'js');
    }

    public static function underscore_js(){
        return self::local_component(self::$underscore_js, 'js');
    }

    public static function bootstrap_tables($type){
        if ($type == 'css')
            return self::local_component(self::$bstrap_tables_style, 'css');
        elseif ($type == 'js')
            return self::local_component(self::$bstrap_tables_script, 'js');
        return '';
    }

    public static function feather_icons(){
        return self::local_component(self::$feather_icons,'js');
    }

    public static function custom_style(){
        return self::local_component(self::$custom_style,'css');
    }

    public static function custom_script(){
        return self::local_component(self::$custom_script,'js');
    }

    public static function alertify($type){
        if ($type == 'css')
            return self::local_component(self::$alertify_style, 'css');
        elseif ($type == 'js')
            return self::local_component(self::$alertify_script, 'js');
        elseif ($type == 'theme')
            return self::local_component(self::$alertify_theme, 'css');
        return '';
    }

    //external components
    public static function material_design($type){
        if ($type == 'css')
            return self::external_component(self::$materialjs_style, 'css');
        elseif ($type == 'js')
            return self::external_component(self::$materialjs_script, 'js');
        elseif ($type == 'icon')
            return self::external_component(self::$materialjs_icon, 'css');
        return '';
    }

    //function to define stylesheets and scripts
    private static function local_component($file_loc, $type){
        if ($type == 'css')
            return '<link rel="stylesheet" href="'. BASE_URL . $file_loc .'"/>' . PHP_EOL;
        else if ($type == 'js')
            return '<script src="'. BASE_URL . $file_loc .'"></script>' . PHP_EOL;
        return '';
    }
    private static function external_component($cdn_loc, $type){
        if ($type == 'css')
            return "<link rel='stylesheet' href='${cdn_loc}'/>" . PHP_EOL;
        else if ($type == 'js')
            return '<script src="' . $cdn_loc . '"></script>' . PHP_EOL;
        return '';
    }

} //end of class

