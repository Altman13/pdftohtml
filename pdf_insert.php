<?php
include 'vendor/autoload.php';
use Gufy\PdfToHtml\Config;
require_once './lib/smartyConfig.php';
ini_set('max_execution_time', 900);
// change pdftohtml bin locationC:\xampp\htdocs\pdftohtml\poppler-0.67.0\bin\pdftohtml.exe
Config::set('pdftohtml.bin', 'C:/xampp/htdocs/pdftohtml/poppler-0.67.0/bin/pdftohtml.exe');
// change pdfinfo bin location
Config::set('pdfinfo.bin', 'C:/xampp/htdocs/pdftohtml/poppler-0.67.0/bin/pdfinfo.exe');
// initiate
$translit = array(
    'а' => 'a',   'б' => 'b',   'в' => 'v',

    'г' => 'g',   'д' => 'd',   'е' => 'e',

    'ё' => 'yo',   'ж' => 'zh',  'з' => 'z',

    'и' => 'i',   'й' => 'j',   'к' => 'k',

    'л' => 'l',   'м' => 'm',   'н' => 'n',

    'о' => 'o',   'п' => 'p',   'р' => 'r',

    'с' => 's',   'т' => 't',   'у' => 'u',

    'ф' => 'f',   'х' => 'x',   'ц' => 'c',

    'ч' => 'ch',  'ш' => 'sh',  'щ' => 'shh',

    'ь' => '\'',  'ы' => 'y',   'ъ' => '\'\'',

    'э' => 'e\'',   'ю' => 'yu',  'я' => 'ya',


    'А' => 'A',   'Б' => 'B',   'В' => 'V',

    'Г' => 'G',   'Д' => 'D',   'Е' => 'E',

    'Ё' => 'YO',   'Ж' => 'Zh',  'З' => 'Z',

    'И' => 'I',   'Й' => 'J',   'К' => 'K',

    'Л' => 'L',   'М' => 'M',   'Н' => 'N',

    'О' => 'O',   'П' => 'P',   'Р' => 'R',

    'С' => 'S',   'Т' => 'T',   'У' => 'U',

    'Ф' => 'F',   'Х' => 'X',   'Ц' => 'C',

    'Ч' => 'CH',  'Ш' => 'SH',  'Щ' => 'SHH',

    'Ь' => '\'',  'Ы' => 'Y\'',   'Ъ' => '\'\'',

    'Э' => 'E\'',   'Ю' => 'YU',  'Я' => 'YA',

);
if(isset($_FILES['pdf_file']['name'])) {
    $uploaddir = './source/';
    $tmp_file = $_FILES['pdf_file']['tmp_name'];
    $filename = $_FILES['pdf_file'];
    $_FILES['name_extension'] = explode(".", $_FILES['pdf_file']['name']);
    $_FILES['extension'] = $_FILES['name_extension'][1];
    if($_FILES['extension']=='pdf') {
        $file_name_translit = strtr($_FILES['pdf_file']['name'], $translit);
        $uploadfile = $uploaddir . $file_name_translit;
        move_uploaded_file($tmp_file, $uploadfile);
        $files = scandir('./source');
        $file_name = strtr($_FILES['pdf_file']['name'], $translit);
        $name = explode(" ", $file_name);
        $href = './source/' . $file_name_translit;
        $pdf = new Gufy\PdfToHtml\Pdf($uploadfile);
        $html = $pdf->html();
        $total_pages = $pdf->getPages();
        $insert_files=$db->prepare("INSERT INTO files (href_pdf) VALUES (:href)");
        $insert_files->bindParam(':href',$href ,PDO::PARAM_STR);
        $insert_files->execute();
        for ($i = 0; $i < $total_pages; $i++) {
                $page = $pdf->html($i);
                $insert_html=$db->prepare("INSERT INTO pages (page_html, files_idfiles) 
                                                    VALUES (:page, (SELECT files.idfiles FROM files
                                                                    WHERE files.href_pdf=:href))");
                $insert_html->bindParam(':page',$page ,PDO::PARAM_STR);
                $insert_html->bindParam(':href',$href ,PDO::PARAM_STR);
                $insert_html->execute();
            }
        echo  'добавление файла завершено';
        }
}
?>