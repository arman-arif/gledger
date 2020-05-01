<?php
namespace modules;

use http\QueryString;
use libraries\Database;
use libraries\FontEnd;
use libraries\Session;
use libraries\Tools;

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

    public function get_ledger($yym = '') {
        $dates = $this->get_ledger_dates();
        foreach ($dates as $key => $value) {
            $dates[$key] = $value->date;
        }
        $all_members = $this->get_members();
        $members = array();
        while ($row = $all_members->fetch()) {
            $members[] = array(
                "username" => $row->username,
                "fullname" => $row->fullname
            );
        }
        return $members;
    }

    public function get_exp_ledger(){
//        $user = Session::get('user_name');
        $ledger = array();
        $ledger_query = $this->database->getAll($this->table);
        if ($ledger_query){
            while ($row = $ledger_query->fetch()){
                $spend_by = $row->spend_by;
                $exp_query = "SELECT fullname FROM members WHERE username = '$spend_by'";
                $exp_result = $this->database->select($exp_query);
                $exp_row = $exp_result ? $exp_result->fetch() : "false";
                $expenser = $exp_row ? $exp_row->fullname : $spend_by;
                $ledger_expense = array(
                    "exp_id" => $row->id,
                    "note" => $row->sec_of_use,
                    "exp_amt" => $row->cost_amt,
                    "expenser" => $expenser,
                    "username" => $row->spend_by,
                    "date" => $row->date
                );
                array_push($ledger, $ledger_expense);
            }
            $col_date = array_column($ledger, 'date');
            array_multisort($col_date, SORT_ASC, $ledger);
            return $ledger;
        }
        return false;
    }

    public function get_ledger_dates() {
        $query = "select distinct `date` from ledger";
        $dates = $this->database->select($query);
        $ledger_dates = array();
        if ($dates){
            while($row = $dates->fetch()){
                array_push($ledger_dates, $row);
            }
            sort($ledger_dates);
            Tools::array_to_object($ledger_dates);
            return $ledger_dates;
        }
        return false;
    }

    public function get_per_expense_by_date($date, $uname) {
        $query = "select * from ledger where `date` = '$date' and spend_by = '$uname'";
        $expense = $this->database->select($query);
        if ($expense){
            return $expense;
        }
        return false;
    }

    public function get_members() {
        $query = "select * from members";
        $members = $this->database->select($query);
        if ($members) {
            return $members;
        }
        return false;
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
        $script .= FontEnd::table_export_jquery();
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