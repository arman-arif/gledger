<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= isset($page_title)?$page_title:'' ?> : <?= APP_NAME ?></title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/reset.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/vendor/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/vendor/jquery-ui-1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/vendor/alertifyjs/css/alertify.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/vendor/alertifyjs/css/themes/default.css">
    <?php echo isset($custom_header)?$custom_header:''; ?>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
</head>
<body>
