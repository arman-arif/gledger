<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
//ledger view page
use libraries\Tools;
$ledger = $this->get_ledger();
$sl = 1;
$expense_amt = 0;
?>
<section class="bg-white p-3">
    <h4 class="text-center">Ledger</h4>
    <table class="table table-sm ledger-table"
           data-toggle="table"
           data-show-export="true"
           data-export-data-type="all"
           data-export-types="['pdf', 'excel']">
        <thead>
        <tr>
            <th data-sortable="true">S/N</th>
            <th data-sortable="true">Date</th>
            <th>Name</th>
            <th>Note</th>
            <th>Amount</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($ledger as $expense):
            $expense = Tools::array_to_object($expense);
        ?><tr>
            <td><?= $sl++ ?></td>
            <td><?= Tools::format_date($expense->date); ?></td>
            <td title="<?= $expense->expenser ?> (<?= $expense->username ?>)"><?= explode(" ", $expense->expenser)[0] ?></td>
            <td><?= $expense->note ?></td>
            <td><?= $expense->exp_amt ?></td>
        </tr><?php $expense_amt += $expense->exp_amt;
        endforeach; ?>
        </tbody>
        <tfoot>
        <tr class="font-weight-bold">
            <td class="text-right" colspan="4">Total:</td>
            <td><?= $expense_amt ?></td>
        </tr>
        </tfoot>
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