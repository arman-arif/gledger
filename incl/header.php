<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
use libraries\FontEnd;
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
echo FontEnd::jquery_ui('css');
echo FontEnd::alertify('css');
echo FontEnd::alertify('theme');
echo isset($custom_header)?$custom_header:'';
echo FontEnd::custom_style();
?>
</head>
<body>
