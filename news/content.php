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


    <div class="width_common photo_blnhieu">
        <div class="col_width_310 left">
            <div class="box_category width_common">
                <?php
                $re_content_list = mysql_query("SELECT * FROM category" );
                if(!$re_content_list) echo '<h2>sai cau lenh sql</h2>';
                else {?>
                    <?php while($row_content_list=mysql_fetch_assoc($re_content_list)){ ?>
                        <div class="title_box_category width_common">
                            <div class="txt_main_category"><a href="<?php print $row_content_list['alias']; ?>" ><?php print $row_content_list['name']; ?></a></div>

                            <?php
                            $image_header_list = "";
                            $title_header_list = "";
                            $url_header_list = "";
                            $introtext_header_list = "";
                            $category_id = $row_content_list['id'];
                            $re_content_item = mysql_query("SELECT * FROM content WHERE category_id= $category_id  order by id desc limit 1" );
                            if(!$re_content_item) echo '<h2>sai cau lenh sql</h2>';
                            else{
                                while($row_content_item=mysql_fetch_assoc($re_content_item)){
                                    preg_match('/<img(.+?)\/>/is', $row_content_item['introtext'], $matches);
                                    $image_header_list = $matches[0];
                                    $title_header_list = $row_content_item['title'];
                                    $url_header_list = $row_content_item['alias'];
                                    $introtext_header_list = preg_replace($image_header_list,'',$row_content_item['introtext']);
                                    $introtext_header_list = preg_replace("/<>/",'',$introtext_header_list);
                                }
                            }
                            ?>

                            <div class="body_box_category">
                                <div class="home_bleft">
                                    <div class="title_news">
                                        <div class="title_news_img"> <?php print $image_header_list?> </div><br/>
                                        <a href="<?php print $url_header_list; ?>" class="txt_link"> <?php print $title_header_list;?> </a>
                                        <?php print $introtext_header_list; ?>
                                    </div>
                                    <div class="title_news_list">
                                        <ul>
                                            <li>
                                                <img src="../images/list_menu.png">
                                                <a href="#">Chọn được màu sơn mới cho tòa nhà bưu điện 130 tuổi ở TP HCM </a>
                                            </li>
                                            <li>
                                                <img src="../images/list_menu.png">
                                                <a href="#">Trung tâm cai nghiện tự nguyện đầu tiên ở Hà Nội </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php }?>
            </div>
        </div>
    </div>