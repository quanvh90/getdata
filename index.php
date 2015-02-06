<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 2/4/2015
 * Time: 6:04 PM
 */
?>
<?php include_once("config/main.php"); ?>
<?php include_once("config/connect.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:fb="http://ogp.me/ns/fb#" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="admin/images/main/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="news/css/screen.css"/>
</head>
<body>


<div id="container">
    <div class="wrap-header">
        <?php include('news/header.php'); ?>
    </div>
    <div class="clearfix" style="clear:both;"></div>
    <div class="wrap-main">
        <div class="inner-main">
            <div class="main">
                <div class="wrap-content">
                    <div class="content">
                        <!--Begin Main Code-------------------->

                        <div class="mainblock_center">
                            <?php include('news/content.php'); ?>
                        </div><!--Center-->
                        <div class="mainblock_right">
                            <?php include('news/sidebarRight.php'); ?>
                        </div><!--Right-->
                    </div>
                    <!--End Main Code---------------------->
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix" style="clear:both;"></div>
    <div class="wrap-footer">
        <?php include('news/footer.php'); ?>
    </div>
</div>

<div class="alert alert-danger fade in alert-custom" style="display: none;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

    <div>
        <strong>Thông báo</strong>
    </div>

    <p>??ng nh?p th?t b?i. Vui lòng th? l?i.</p>
</div>
<?php include('news/javascript.php'); ?>
</body>
</html>