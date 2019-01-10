<?php
highlight_file(__FILE__);
session_start();

if (isset($_GET['do'])){
    $_ = $_GET['do'];
    if ($_ === "reg") {
        if (isset($_POST['user'])) {
            $_SESSION['user'] = $_POST['user'];
        }
    } else if ($_ === "module") {
        if (isset($_GET['func'])) {
            //Try about.php for session testing :)
            require("modules/". $_GET['func']);
        }
    }
}
?>
