<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
use libraries\Tools;
use modules\Expenses;
//error_reporting(0);
//$link = new libraries\Database();
//$db = $link->getDb();
//$pdo = $link->getPdo();

if (isset($_GET['add-ledger'])){
    if (isset($_POST['expense_amt'])){
        $post_data = Tools::validate_array($_POST);
        $expense = new Expenses();
        $expense->add($post_data);
    }
}
//print_r($_POST);
//print_r($_GET);
//print_r($_SERVER['HTTP_HOST']);