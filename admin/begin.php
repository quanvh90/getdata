<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Getdata</title>

    <link rel="shortcut icon" href="images/main/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>

    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="libralies/ckeditor/ckeditor.js"></script>
</head>

<body>

<div class="banner"><h1 style="color:#F00">GET DATA 2.0</h1></div>
<div class="menu">
    <ul class=""clearfix"">
    <li><a href="add.php">Thêm mới bài viết</a></li>
    <li><a href="index.php">Quản lý bài viết</a></li>

    </ul>
    <a href="#" id="pull">Menu</a>
</div>
<?php
    include_once("config/main.php");
    include_once("config/connect.php");
    include_once('libralies/page/thuvien.php');
    include_once('libralies/simple_html_dom.php');
    include_once("getdata/function.php");
    include_once("getdata/get.php");
    include_once("getdata/content.php");
    include_once("getdata/savedata.php");
    include_once("libralies/redirect.php");
?>