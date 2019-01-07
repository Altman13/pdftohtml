<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>Document</title>
    <script src="./bower_components/jquery/dist/jquery.min.js"></script>
    <script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <link href="./bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<script>
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
</script>
<div class="file_send container col-md-4" style="border-style: double; margin-top: 10px; margin-bottom: 10px;">
    <form action="pdf_insert.php" style="margin-top: 10px;">
        <div class="form-group">
            <input class="form-control-file" id="pdf_convert" name="pdf_file" type="file">
            <input class="btn-primary btn-sm" style="margin-top: 10px;" type="submit">
            <select name="" id="select_pdf" style="margin-top: 10px;">
                {foreach from=$pdf_hrefs item=file key=key}
                    <option value={$file.href_pdf}>{$file.href_pdf}</option>
                {/foreach}
            </select>
            <button class="btn-primary btn-sm" id="pdf_view" style="margin-top: 10px;" type="button">Отобразить PDF</button>
            <div id="href_for_download" style="border-style:double; margin-top: 10px; text-align: center;" >
                <span style="">File for download</span>
            <br>{foreach from=$pdf_hrefs item=file key=key}
                <a href="{$file.href_pdf}" download>{$file.href_pdf}</a>
                <br>
            {/foreach}
            </div>
        </div>
    </form>
</div>

<div class="pdf_view container" style="border-style: solid;">Вывод Pdf как html</div>
</body>
</html>