<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
//ledger view page
use libraries\Tools;
$ledger = $this->get_exp_ledger();
$sl = 1;
$expense_amt = 0;
$members = array();
?>
<section class="bg-white p-3">

        <?php
            $row = $this->get_ledger();
            print_r($row);
        ?>
        <table class="table table-sm">
                <thead class="text-capitalize font-weight-bold text-center">
                <tr>
                    <th>Dates</th>
                    <th>Note</th>
                    <?php foreach($this->get_members() as $member): ?>
                    <th><?= $member->username ?></th>
                    <?php $members[] = $member->username;
                    endforeach; ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach($this->get_ledger_dates() as $date) { ?>
                <tr>
                    <td><?= $date->date ?></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
    <h4 class="text-center">Ledger</h4>
    <table class="table table-sm ledger-table"
           data-toggle="table"
           data-show-export="true"
           data-export-data-type="all"
           data-export-types="['pdf', 'excel']"
           data-show-footer="true"
           data-height="460">
        <thead>
        <tr>
            <th data-sortable="true">S/N</th>
            <th data-sortable="true">Date</th>
            <th>Name</th>
            <th>Note</th>
            <th>Amount</th>
        </tr>
        </thead>
        <tbody style="height: 300px; overflow: hidden; overflow-y: scroll">
        <?php foreach($ledger as $expense):
            Tools::array_to_object($expense);
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