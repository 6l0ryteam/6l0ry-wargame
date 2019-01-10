<?php
session_start();
$fdir = '/sandbox/' . md5("gd" . $_SERVER['REMOTE_ADDR']);
$_SESSION['sandbox'] = $fdir;
//$fdir = 'data/' . md5("gd" . $_SERVER['REMOTE_ADDR']);
@mkdir($fdir);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Geegle Drive</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="index.php?p=home">
                        Geegle Drive
                    </a>
                </li>
                <li>
                    <a href="index.php?p=upload">Upload</a>
                </li>
                <li>
                    <a href="index.php?p=filelist">File List</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">