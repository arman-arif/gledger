<?php
namespace modules;

use libraries\Session;
use PDOException;
use libraries\Database;
use libraries\FontEnd;

class Expenses {
    private $database = null;
    protected $page_title = null;
    protected $module_script = null;
    protected $module_style = null;
    private $db_pdo = null;
    private $table = 'ledger';

    public function __construct() {
        $this->database = new Database();
        $this->page_title = "Expenses";
        $this->module_script = $this->define_script();
        $this->module_style = $this->define_style();
        $this->db_pdo = $this->database->getPdo();
    }

    public function add($post_data){
        $data = $this->database->escape_array($post_data);
        $date_yyyymm = date("Ym", time());
        $data['expense_note'] = ($data['expense_note'] == '') ? "Grocery" : $data['expense_note'];

        $query = 'INSERT INTO `ledger` (`sec_of_use`, `cost_amt`, `spend_by`, `date`, `yyyymm`) 
                VALUES (:cost_field, :cost_amt, :spend_by, :date, :yyyymm)';
        $stmt = $this->db_pdo->prepare($query);
        $stmt->bindParam(':cost_field', $data['expense_note']);
        $stmt->bindParam(':cost_amt', $data['expense_amt']);
        $stmt->bindParam(':spend_by', $data['spend_by']);
        $stmt->bindParam(':date', $data['expense_date']);
        $stmt->bindParam(':yyyymm', $date_yyyymm);

        if ($stmt->execute())
            echo json_encode(['status' => 'success', 'message' => 'Expense added successfully']);
        else
            echo json_encode(['status' => 'error', 'message' => 'Expense could not be added']);

    }

    public function get_expenses(){
        $user = Session::get('user_name');
        $query = "SELECT * FROM $this->table WHERE spend_by = '$user'";
        return $this->database->select($query);
    }

    public function get_view(){
        include PAGE_DIR . 'expenses.php';
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
        $script .= FontEnd::bootstrap_table_export();
        return $script;
    }
    public function define_style(){
        $stylesheets = '';
        $stylesheets .= FontEnd::bootstrap_tables('css');
        return $stylesheets;
    }
}