<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 2/6/2015
 * Time: 1:49 PM
 */
?>
<div class="wrapper">
    <div class="jcarousel-wrapper">
        <div class="jcarousel">
            <ul>
                <?php
                $re_content_jcarousel = mysql_query("SELECT * FROM content order by id desc limit 5" );
                if(!$re_content_jcarousel) echo '<h2>sai cau lenh sql</h2>';
                else{
                    while($row_content_jcarousel=mysql_fetch_assoc($re_content_jcarousel)){
                        print "<li><div class='noibattrangchu'>";
                        preg_match('/<img(.+?)\/>/is', $row_content_jcarousel['introtext'], $matches);
                        print "<a href='".$row_content_jcarousel['alias']."'>".$matches[0]."<p>".$row_content_jcarousel['title']."</p></a>";
                        print "</div></li>";
                    }
                }
                ?>
            </ul>
        </div>
        <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
        <a href="#" class="jcarousel-control-next">&rsaquo;</a>
        <p class="jcarousel-pagination"></p>
    </div>
</div>