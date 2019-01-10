<?php
require('head.php');

if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0){
    if ($_POST['fname'] !== '') {
        $fname = $_POST['fname'];
    } else {
        $fname = $_FILES['file']['name'];
    }
    echo 'upload '.$fname.'...<br>';
    if(!preg_match('/[a-zA-Z]|[a-z]|\d*\.?/',$fname)){
        exit('filename is not safe');
    }
    move_uploaded_file($_FILES['file']['tmp_name'], $fdir.'/'.$fname);
    echo 'upload success';
}
?>