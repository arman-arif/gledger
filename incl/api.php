<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
use libraries\Tools;
use libraries\Session;
use modules\Expenses;

// Check if user is logged in before allowing API access
if (!Session::is_set("user_name")) {
    http_response_code(403);
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized: Please login first']);
    exit;
}

if (isset($_GET['add-ledger'])){
    if (isset($_POST['expense_amt'])){
        $post_data = Tools::validate_array($_POST);
        $expense = new Expenses();
        $expense->add($post_data);
    }
}