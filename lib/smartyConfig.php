<?php

define('BASE_URL', 'http://localhost/lib');
require "config.php";
include_once $_SERVER['DOCUMENT_ROOT'].'\pdftohtml\vendor\autoload.php';
$smarty= new SmartyBC();
$smarty->template_dir = './templates';
$smarty->compile_dir  = './templates_c';
$smarty->config_dir   = './configs';
$smarty->cache_dir   = './cache';

?>