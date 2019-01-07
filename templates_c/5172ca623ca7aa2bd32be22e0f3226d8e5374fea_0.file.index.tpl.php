<?php
/* Smarty version 3.1.34-dev-1, created on 2018-09-20 22:13:08
  from 'C:\xampp\htdocs\pdftohtml\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-1',
  'unifunc' => 'content_5ba3ff542f3124_56606210',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5172ca623ca7aa2bd32be22e0f3226d8e5374fea' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pdftohtml\\templates\\index.tpl',
      1 => 1537474386,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ba3ff542f3124_56606210 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>Document</title>
    <?php echo '<script'; ?>
 src="./bower_components/jquery/dist/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="./bower_components/bootstrap/dist/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <link href="./bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php echo '<script'; ?>
>
    $(function () {
        $(document).on('submit', 'form', function (e) {
            e.preventDefault();
            $form = $(this);
            uploadFile($form);
        });
        function uploadFile($form) {
            var formdata = new FormData($form[0]);
            var request = new XMLHttpRequest();
            request.onreadystatechange = function () {
                if (request.readyState === XMLHttpRequest.DONE) {
                    console.log(request.response);
                    $(".file_send").html(request.response);
                }
            }
            request.open('post', 'pdf_insert.php');
            request.send(formdata);
        }
    });
    $(function () {
        $('#pdf_view').click(function (){
            var numberPage=$(this).text();
            var pdf_file=$('#select_pdf>option:selected').val();
            console.log(pdf_file);
            $.post('pdf_view.php',
                {
                    pdf_file: pdf_file,
                },
                function (data) {
                    $('.pdf_view').html(data);
                    $('img').remove();
                })
        });
    });
<?php echo '</script'; ?>
>
<div class="file_send container col-md-4" style="border-style: double; margin-top: 10px; margin-bottom: 10px;">
    <form action="pdf_insert.php" style="margin-top: 10px;">
        <div class="form-group">
            <input class="form-control-file" id="pdf_convert" name="pdf_file" type="file">
            <input class="btn-primary btn-sm" style="margin-top: 10px;" type="submit">
            <select name="" id="select_pdf" style="margin-top: 10px;">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pdf_hrefs']->value, 'foo', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['foo']->value) {
?>
                    <option value=<?php echo $_smarty_tpl->tpl_vars['foo']->value['href_pdf'];?>
><?php echo $_smarty_tpl->tpl_vars['foo']->value['href_pdf'];?>
</option>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
            <button class="btn-primary btn-sm" id="pdf_view" style="margin-top: 10px;" type="button">Отобразить PDF</button>
            <div id="href_for_download" style="border-style:double; margin-top: 10px; text-align: center;" >
                <span style="">File for download</span>
            <br><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pdf_hrefs']->value, 'foo', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['foo']->value) {
?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['foo']->value['href_pdf'];?>
" download><?php echo $_smarty_tpl->tpl_vars['foo']->value['href_pdf'];?>
</a>
                <br>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        </div>
    </form>
</div>

<div class="pdf_view container" style="border-style: solid;">Вывод Pdf как html</di<?php }
}
