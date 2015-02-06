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
        <li><a href="<?php echo URL_HOME; ?>"  class="first_item active" > Trang Chủ </a></li>
        <?php
            $re = mysql_query("SELECT * FROM category" );
            if(!$re) echo '<h2>sai cau lenh sql</h2>';
            else{
                while($row=mysql_fetch_assoc($re)){
                    print "<li><a href='".URL_HOME.$row['alias']."' class='first_item'>".$row['name']."</a></li>";
                }
            }
        ?>



        <li id="header-register" class="mnTopRegister"><a href="<?php echo URL_HOME.'news'; ?>" class="last_item">Login</a></li>
        <li id="header-login" class="mnToplogin"><a href="<?php echo URL_HOME.'news'; ?>" class="last_item">Register</a></li>

    </ul><!--TopNav-->
</div>