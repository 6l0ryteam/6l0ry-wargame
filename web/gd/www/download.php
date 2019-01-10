<?php
if(!isset($_GET['f'])){
    exit('no file');
}
$file = $_GET['f'];
$fsafe = explode('/',$file);
$file = $fsafe[count($fsafe)-1];
$fdir = '/sandbox/' . md5("gd" . $_SERVER['REMOTE_ADDR']);
$fname = $file;
$file = $fdir.'/'.$file;

if(!file_exists($file)){
    exit('file not found');
}

$fsize = filesize($file);


header('Pragma: public');
header('Expires: 0');
header('Last-Modified: ' . gmdate('D, d M Y H:i ') . ' GMT');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Cache-Control: private', false);
header('Content-Type: application/octet-stream');
header('Content-Length: ' . $fsize);
header('Content-Disposition: attachment; filename="' . $fname . '";');
header('Content-Transfer-Encoding: binary');
readfile($file);
?>
