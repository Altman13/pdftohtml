<?php
/* Smarty version 3.1.34-dev-1, created on 2018-09-20 16:24:26
  from 'C:\xampp\htdocs\pdftohtml\templates\index2.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-1',
  'unifunc' => 'content_5ba3ad9a5c11b3_97796378',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76b93309a232f71ad7da3e40ef0a478cd6b117fb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pdftohtml\\templates\\index2.tpl',
      1 => 1537453465,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ba3ad9a5c11b3_97796378 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php echo '<script'; ?>
 src="./bower_components/jquery/dist/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="./bower_components/bootstrap/dist/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="./bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>
<?php echo '<script'; ?>
>
$(function () {
    $('#pdf_view').click(function (){
        console.log($(this).text());
        var numberPage=$(this).text();
        $.post('pdf_view.php',
        {
            numberPage: numberPage
        },
            function (data) {
            console.log(data);
            $('.container').html(data);
                $('img').remove();
            })
    });
});
<?php echo '</script'; ?>
>
<div class="container col-md-8"></div>
<button type="button" class="btn btn-primary offset-md-4" id="pdf_view" style="margin-top: 10px;">Загрузить PDF</button>
</body<?php }
}
