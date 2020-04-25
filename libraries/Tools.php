<?php

namespace libraries;

class Tools
{
    public static function redirect($loc) {
        header("Location: $loc");
    }

    public static function validate_data($data) {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data;
    }

    public static function validate_array($array) {
        foreach ($array as $key => $value){
            if (is_array($value)) {
                self::validate_array($value);
            } else {
                $array[$key] = self::validate_data($value);
            }
        }
        return $array;
    }

    public static function text_shorten($text, $limit) {
        $text = $text . " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text,' '));
        $text = $text."...";
        return $text;
    }

    public static function array_to_object($array) {
        return json_decode(json_encode($array), false);
    }

    public static function check_login () {
        $accessable = ['login','signup'];
        global $uri;
        if (isset($uri[0])){
            if (in_array($uri[0], $accessable)){
                if(Session::is_set("user_name")){
                    self::redirect(BASE_URL . "dashboard");
                }
            }
            else if(!in_array($uri[0], $accessable)){
                if(!Session::is_set("user_name"))
                    self::redirect(BASE_URL . "login");
            }
        }
    }

    public static function check_user_active() {
        if (Session::is_set("username")){
            if (Session::is_set("last_active")) {
                $last_active = Session::get("last_active");
                if (time() - $last_active > 15 * 60) {
                    Session::destroy();
                    Session::set("logged_out", true);
                    self::redirect(BASE_URL . "login");
                } else {
                    Session::set("last_active", time());
                }
            }
        }
    }



} // end of class Helper