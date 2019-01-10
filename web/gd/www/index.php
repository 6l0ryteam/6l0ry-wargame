<?php
require("head.php");
#session_start();

$page = (isset($_GET['p']))?$_GET['p']:'home';
if (strpos($page, "sandbox") !== false) {
    if (strpos($page, $_SESSION['sandbox']) !== false) {
        include "../html/".$page.'.php';
    } else {
        echo"Error: "."Restirected area";
    } 
} else {
    include "../html/".$page.'.php';
}

require "foot.php";
?>
