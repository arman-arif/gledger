<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
//dashboard
?>

<div class="container h-100">

    <div class="row h-100">
        <div class="col-md-8 col-lg-6 mx-auto h-100">
            <div class="bg-dark min-vh-100">

                <div class="text-center bg-success p-1 pt-2 text-white">
                    <h6>Welcome,</h6>
                    <h4>Arman</h4>
                </div>

                <div class="bg-yellow px-4 pb-3">
                    <h4 class="border-bottom border-dark pt-2">Add Expense</h4>
                    <form method="post" id='add_expense'>
                        <div class="form-group row">
                            <label for="expense_note" class="col-form-label col-md-5 font-weight-bold">Expense Reason:</label>
                            <div class="input-box col-md-7">
                                <input type="text" name="expense_note" id="expense_note" class="form-control" placeholder="Note (Default: Grocery)" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="expense_amt" class="col-form-label col-md-5 font-weight-bold">Expense Amount:</label>
                            <div class="input-box col-md-7">
                                <input type="text" name="expense_amt" id="expense_amt" class="form-control" placeholder="Enter expense amount" autocomplete="off">
                                <div class="error-message"></div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="expense_date" class="col-form-label col-md-5 font-weight-bold">Expense Date:</label>
                            <div class="input-box col-md-7">
                                <input type="text" name="expense_date" id="expense_date" class="form-control" placeholder="Expense date" autocomplete="off">
                                <div class="error-message"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="spend_by" class="col-form-label col-md-5 font-weight-bold">Spend By:</label>
                            <div class="input-box col-md-7">
                                <select name="spend_by" id="spend_by" class="form-control">
                                    <option value="">-- Select One --</option>
                                    <option value="arman">Arman Arif</option>
                                    <option value="sumon">Dawdujjaman Sumon</option>
                                </select>
                                <div class="error-message"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mt-4 mx-auto">
                                <button type="reset" class="form-control btn-secondary" id="btn_clear">Clear</button>
                            </div>
                            <div class="col-6 mx-auto mt-4">
                                <button type="submit" class="form-control btn-info" id="btn_add_exp">Add</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="bg-primary py-2">
                    <div class="row mx-2 mb-3">
                        <div class="col-12">
                            <h4 class="text-white border-bottom">Dashboard</h4>
                        </div>
                        <div class="col-sm-8 col-md-10 mx-auto row">
                            <div class="col-6">
                                <a href="<?= BASE_URL ?>ledger">
                                    <div class="card text-center bg-asphalt text-white">
                                        <div class="card-body">
                                            <i class="fa fa-book fa-3x"></i>
                                        </div>
                                        <div class="card-footer bg-midnightblue">
                                            Ledger
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="<?= BASE_URL ?>expenses">
                                    <div class="card text-center bg-asphalt text-white">
                                        <div class="card-body">
                                            <i class="fa fa-shopping-bag fa-3x"></i>
                                        </div>
                                        <div class="card-footer bg-midnightblue">
                                            Expenses
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="">
                    <a href="<?= BASE_URL ?>logout" class="btn btn-outline-danger btn-sm text-center mx-auto">Logout</a>
                </div>

                <footer class="text-center text-muted bg-dark py-3">&copy; 2020 - All right reserved.</footer>
            </div>
        </div>

    </div>

</div>