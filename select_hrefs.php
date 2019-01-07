<?php
include 'vendor/autoload.php';
require_once 'lib/smartyConfig.php';
$hrefs=$db->prepare("SELECT href_pdf from files");
$hrefs->execute();
$pdf_hrefs=$hrefs->fetchAll();
$smarty->assign('pdf_hrefs', $pdf_hrefs);
/*$smarty->display('index.tpl');*/
?>