<?php
include "incl/header.php";

?>

    <div class="container">

        <div class="row h-100 mt-5 pt-5">

            <div class="col-md-6 col-lg-5 mx-auto my-auto">

                <form action="" method="post">
                    <div class="card border-primary card-block mx-auto w-100 mt-md-5">
                        <div class="card-header bg-info">
                            <h3 class="text-center text-white">Log in Panel</h3>
                        </div>
                        <div class="card-body">
                            <input type="text" name="usr" id="user" placeholder="Username" class="form-control my-3">
                            <input type="password" name="pwd" id="pass" placeholder="Password" class="form-control my-3">
                        </div>
                        <div class="card-footer">
                            <input type="submit" value="Login" class="btn btn-success btn-block">
                        </div>

                    </div>

                </form>

                <p class="text-center text-secondary mt-4">&copy; 2020 - All right reserved.</p>

            </div>

        </div>

    </div>

<?php include "incl/footer.php"; ?>