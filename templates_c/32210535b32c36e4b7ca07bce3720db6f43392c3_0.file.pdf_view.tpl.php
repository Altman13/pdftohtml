<?php
/* Smarty version 3.1.34-dev-1, created on 2018-09-20 16:01:36
  from 'C:\xampp\htdocs\pdftohtml\templates\page_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-1',
  'unifunc' => 'content_5ba3a840e3bb21_81086146',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32210535b32c36e4b7ca07bce3720db6f43392c3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pdftohtml\\templates\\page_view.tpl',
      1 => 1537452094,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ba3a840e3bb21_81086146 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<ul>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['html_pages']->value, 'foo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->value) {
?>
        <li><?php echo $_smarty_tpl->tpl_vars['foo']->value['page'];?>
</li>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>

</body>
</html><?php }
}
