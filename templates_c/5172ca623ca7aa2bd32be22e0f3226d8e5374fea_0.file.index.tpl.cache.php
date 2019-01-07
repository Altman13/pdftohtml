<?php
/* Smarty version 3.1.34-dev-1, created on 2018-09-20 16:11:39
  from 'C:\xampp\htdocs\pdftohtml\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-1',
  'unifunc' => 'content_5ba3aa9be39b57_29559689',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5172ca623ca7aa2bd32be22e0f3226d8e5374fea' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pdftohtml\\templates\\index.tpl',
      1 => 1537450772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ba3aa9be39b57_29559689 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '4627677615ba3aa9be0ebc2_98796326';
?>
<!doctype html>
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
                    $('img').remove();
                }
            }
            request.open('post', 'pdf_insert.php');
            request.send(formdata);
        }
    });
<?php echo '</script'; ?>
>
<div class="container-fluid">test</div>

<div class="file_send container-fluid col-md-4 offset-md-4">
    <form action="pdf_insert.php" style="border-style: solid;">
        <div class="form-group">
            <label for="pdf_convert" class="offset-md-4">Загрузите pdf</label>
            <input type="file" class="form-control-file" id="pdf_convert" name="pdf_file">
            <input type="submit" class="btn-primary btn-sm" style="margin-top: 10px;">
        </div>
    </form>
</div>

</body<?php }
}
