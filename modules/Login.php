<?php
namespace modules;

use libraries\Database;
use libraries\FontEnd;
use libraries\Session;
use libraries\Tools;

class Login {
    private $database = null;
    private $table = 'members';
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

        if (isset($_POST['usrname'])) {
            $usr = Tools::validate_data($_POST['usrname']);
            $pwd = Tools::validate_data($_POST['passwd']);
            $this->login($usr, $pwd);
        }
    }

    public function login($username, $password){
		
		$username = $this->database->escape($username);
		
		$sql = "SELECT * FROM  {$this->table} WHERE username = '{$username}'";
		
		$result = $this->database->select($sql);
        $row = $result->fetch();
        
        print_r($row);

        exit;
		;
		
		function setLoginSession($row) {
			Session::set("user_id", $row->id);
            Session::set("user_name", $row->username);
            Session::set("full_name", $row->fullname);
			Session::set("verify", $row->status);
			Session::set("last_active", time());
		}
		
		function gotoLastPage() {
			if (Session::is_set("logged_out"))
				Tools::redirect($_SERVER['HTTP_REFERER']);
				// exit('<script>history.back()</script>');
		}
		
		if ($result){
			if ($result->rowCount() > 0){
				if (password_verify($password, $row->user_password)) {
					setLoginSession($row);
					gotoLastPage();
					Tools::redirect(BASE_URL . "dashboard");
				} elseif (md5($password) == $row->user_password) {
					setLoginSession($row);
					gotoLastPage();
					Tools::redirect(BASE_URL . "dashboard");
				} else {
					return "Wrong username or password combination";
				}
			} else {
				return "Invalid username or password";
			}
		}
		
		return false;
		
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
        $script .=  "<script>
          feather.replace()
        </script>";
        return $script;
    }
    public function define_style(){
        $stylesheets = '';
//        $stylesheets = FontEnd::materialjs_style();
//        $stylesheets .= FontEnd::materialjs_icon();
        return $stylesheets;
    }

}