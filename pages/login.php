<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
//login view page
?>

<div class="container h-100">

    <div class="row h-100">
        <div class="col-md-8 col-lg-6 mx-auto h-100">
            <div class="bg-dark min-vh-100">
                <section class="bg-success h-50">
                    <h3 class="display-4 text-center text-white py-3">gLedger</h3>
                </section>
                <section class=" row px-3 py-4">
                    <div class="col-12"><h4 class="text-white text-center my-3">User Login</h4></div>
                    <div class="col-sm-8 mx-auto">
                        <div class="card bg-asphalt">
                            <div class="card-body">
                                <form action="" method="post" class="form-signin">
                                    <label class="sr-only" for="usr">Username</label>
                                    <input class="form-control bg-midnightblue border-dark" type="text" placeholder="Username" name="usrname" id="usr" autocomplete="off" autofocus>

                                    <label class="sr-only" for="pwd">Password</label>
                                    <input class="form-control bg-midnightblue border-dark" type="password" placeholder="Password" name="passwd" id="pwd" autocomplete="off">

                                    <button class="form-control btn btn-outline-danger mt-3" type="submit" id="btn-login">
                                        <span class="mr-3">Login</span>
                                        <i data-feather="log-in"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

                <footer class="text-center text-muted bg-dark py-3">&copy; 2020 - All right reserved.</footer>
            </div>
        </div>

    </div>

</div>