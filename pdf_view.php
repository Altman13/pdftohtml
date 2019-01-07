<?php
include 'vendor/autoload.php';
require_once 'lib/smartyConfig.php';
if(isset($_POST['numberPage'])) {
    $pdf_view = $db->prepare("SELECT pages.page_html as page FROM pages, files
                              WHERE files.idfiles=pages.files_idfiles
                              AND files.href_pdf='./source/dogovor.pdf'");

    $pdf_view->execute();
    $html_pages = $pdf_view->fetchAll();
    $html_page=$html_pages[0]['page'];
    $all_html_page=count($html_pages);
    $smarty->assign('page_num', $html_page);
    $smarty->assign('all_html_page',$all_html_page);
    $smarty->display('page_view.tpl');
}
elseif(isset($_POST['pdf_file'])) {
    $temp='%'.$_POST['pdf_file'].'%';
    $pdf_view = $db->prepare("SELECT pages.page_html as page FROM pages, files
                              WHERE files.idfiles=pages.files_idfiles
                              AND files.href_pdf LIKE :pdf_file");
    $pdf_view->bindParam(':pdf_file', $temp, PDO::PARAM_STR);
    $pdf_view->execute();
    $html_pages = $pdf_view->fetchAll();
    $smarty->assign('page_num', $html_pages);
    /*$smarty->assign('all_html_page',$all_html_page);*/
    $smarty->display('page_view.tpl');
}
?>