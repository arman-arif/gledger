<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
//ledger view page
use libraries\Tools;
$expenses = $this->get_expenses();
//print_r($ledger);
$sl = 1;
$expense_amt = 0;
?>
    <section class="bg-white p-3">
        <h4 class="text-center">Expenses</h4>
        <table class="table table-sm ledger-table" data-toggle="table">
            <tr>
                <th>S/N</th>
                <th>Date</th>
                <th>Note</th>
                <th>Amount</th>
            </tr>
            <?php while($expense = $expenses->fetch()): ?>
                <tr>
                    <td><?= $sl++ ?></td>
                    <td><?= Tools::format_date($expense->date); ?></td>
                    <td><?= $expense->sec_of_use ?></td>
                    <td><?= $expense->cost_amt ?></td>
                </tr>
                <?php $expense_amt += $expense->cost_amt;
            endwhile; ?>
            <tr class="font-weight-bold">
                <td class="text-right" colspan="3">Total:</td>
                <td><?= $expense_amt ?></td>
            </tr>
        </table>
    </section>



<?php
//<!-- Modal -->
//<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
//    Launch demo modal
//</button>
//<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
//    <div class="modal-dialog modal-dialog-scrollable" role="document">
//        <div class="modal-content">
//            <div class="modal-body">
//
//            </div>
//        </div>
//    </div>
//</div>