<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 2/4/2015
 * Time: 6:07 PM
 */
?>
<div class="header">
    <!--Begin Header Code-------------------->
    <a href="<?php echo URL_HOME; ?>" class="logo"><img src="<?php echo URL_HOME.'news/images/logo.png'; ?>"></a>
    <ul class="topnav">
        <li><a href="<?php echo URL_HOME; ?>"  class="first_item" > Trang Chủ </a></li>
        <li><a href="<?php echo URL_HOME.'news'; ?>" class="first_item" >Tin Tức</a></li>
        <li><a href="<?php echo URL_HOME.'events'; ?>" class="first_item" >Sự Kiện</a></li>
        <li><a href="<?php echo URL_HOME.'tutorial'; ?>" class="first_item" >Thể thao</a></li>

        <li id="header-register" class="mnTopRegister"><a href="<?php echo URL_HOME.'news'; ?>" class="last_item">Login</a></li>
        <li id="header-login" class="mnToplogin"><a href="<?php echo URL_HOME.'news'; ?>" class="last_item">Register</a></li>

    </ul><!--TopNav-->
</div>