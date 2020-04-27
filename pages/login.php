<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
//login view page
use libraries\Tools;
?>

                <section class="bg-success h-50">
                    <h3 class="display-4 text-center text-white py-3">gLedger</h3>
                </section>
                <section class=" row px-3 py-4">
                    <div class="col-12"><h4 class="text-white text-center my-3">User Login</h4></div>
                    <div class="col-sm-8 mx-auto">
                        <div class="card bg-asphalt">
                            <div class="card-body">
                                <form action="<?= BASE_URL ?>login" method="post" class="form-signin" id="login-form">
                                    <label class="sr-only" for="usr">Username</label>
                                    <input class="form-control bg-midnightblue border-dark" type="text" placeholder="Username" name="usrname" id="usr" autocomplete="off" value="<?= Tools::get_typed_value('usrname') ?>">

                                    <label class="sr-only" for="pwd">Password</label>
                                    <input class="form-control bg-midnightblue border-dark" type="password" placeholder="Password" name="passwd" id="pwd" autocomplete="off" value="<?= Tools::get_typed_value('passwd') ?>">

                                    <button class="form-control btn btn-outline-danger mt-3" type="submit" id="btn-login">
                                        <span class="mr-3">Login</span>
                                        <i data-feather="log-in"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

