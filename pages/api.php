<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));

$link = new Database();
$db = $link->getDb();
$pdo = $link->getPdo();

if (isset($_GET['add-ledger'])){
    if (isset($_POST['expense_amt'])){
        $data = array();
        foreach($_POST as $key => $value){
            $data[$key] = $link->escape($value);
        }
        $query = 'INSERT INTO `ledger` (`sec_of_use`, `cost_amt`, `spend_by`, `date`, `yyyymm`)';
        $query .= 'VALUES (:cost_field, :cost_amt, :spend_by, :date, :yyyymm)';
        $date_yyyymm = date("Ym", time());
        $expense_note = ($data['expense_note'] == '') ? "Grocery" : $data['expense_note'];
        $data['expense_note'] = $expense_note;
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':cost_field', $expense_note);
        $stmt->bindParam(':cost_amt', $data['expense_amt']);
        $stmt->bindParam(':spend_by', $data['spend_by']);
        $stmt->bindParam(':date', $data['expense_date']);
        $stmt->bindParam(':yyyymm', $date_yyyymm);
        $result = $stmt->execute();

        if ($result){
            echo json_encode(['status' => 'success', 'message' => 'Expense added successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Expense could not be added']);
        }
//        print_r($stmt);
//        print_r($data);
    }



    // [expense_note] => Nothing
    // [expense_amt] => 5000
    // [expense_date] => 2020-04-15
    // [spend_by] => arman

}