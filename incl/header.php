<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
use libraries\FontEnd;
use libraries\Session;

global $uri;
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title><?= (isset($page_title) && !empty($page_title) ?$page_title . ' | ':'') . APP_NAME ?></title>
<?php
echo FontEnd::reset_css();
echo FontEnd::bootstrap('css');
echo FontEnd::fontawesome();
echo isset($custom_header)?$custom_header:'';
echo FontEnd::custom_style();
?>
</head>
<body>
<div class="container h-100">

    <div class="row h-100">
        <div class="col-md-8 col-lg-6 mx-auto h-100">
            <div class="bg-dark min-vh-100">

            <?php if (Session::is_set('user_name')) : ?>
                  <div class="bg-success p-1 pt-2 px-3 text-white clearfix">
                        <div class='float-left pr-2'>
                            <?php if($uri[0] == ''): ?>
                                <a class="btn my-2 text-light" href="<?= BASE_URL ?>">
                                    <i class="fa fa-home"></i>
                                </a>
                            <?php else: ?>
                                <a class="btn my-2 text-light" href="#" onclick='window.history.back()'>
                                    <i class="fa fa-angle-left"></i>
                                </a>
                            <?php endif; ?>

                        </div>
                        <div class="float-left ml-3">
                              <h6 class="text-light">Welcome,</h6>
                              <h4><?= Session::get('full_name') ?></h4>
                        </div>
                        <div class="float-right">
                        <a href="<?= BASE_URL ?>logout" class="btn btn-outline-warning btn-sm text-center mx-auto">
                              <i class="fa fa-sign-out"></i>
                              <span class="d-none d-md-inline-block">Logout</span>
                        </a>
                        </div>
                  </div>
            <?php endif; ?>
