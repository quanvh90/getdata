
<div class="list_even">
<h2 class="tit">Tin Hot</h2>
<ul class="chuisukiemRight" style="max-height: 300px">
    <?php
    $re_content = mysql_query("SELECT * FROM content order by id desc limit 5" );
    if(!$re_content) echo '<h2>sai cau lenh sql</h2>';
    else{
        while($row_content=mysql_fetch_assoc($re_content)){
            print "<li><span class='icon'></span>";
            print "<a href='".URL_HOME.$row_content['alias']."' class='first_item'>".$row_content['title']."</a></li>";
        }
    }
    ?>
</ul>
</div><!--End-->

<div class="ads ads01">
    <a href="{{ App::make('setting', Config::get('main.channeling.aMO'))->giftcode }}" target="_blank"><img src="news/images/img-giftcode.gif" alt=""/></a>
</div>
 <div class="ads ads02">
    <a href="{{ URL::route('tutorial.index') }}"><img src="news/images/img-tuongdan.gif" alt=""/></a>
</div>
<div class="boxRightFace">
    <a href="https://facebook.com/tintuc" target="_blank">
        <img src="news/images/block_face.jpg" alt=""/>
    </a>
</div>
<!--<div class="block_face">-->
<!--    <iframe src="https://www.facebook.com/plugins/likebox.php?href=http://getdata.local.com/&amp;width=260&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:260px; height:258px;" allowTransparency="true"></iframe>-->
<!--</div>-->
<div class="support">
    <h2 class="tit">Hỗ Trợ</h2>
    <div class="pbx_support">
        <div class="row_pbx first">
            <h3>Tổng đài hỗ trợ</h3>
            <div class="date">Monday - Saturday</div>
            <div class="time">9h00 - 21h30</div>
        </div>
        <div class="clearfix" style="clear:both;"></div>
        <div class="row_pbx">
            <div class="date">Sunday</div>
            <div class="time">9h00 - 17h00</div>
        </div>
        <div class="clearfix" style="clear:both;"></div>
        <?php
        $timeNow = $_SERVER['REQUEST_TIME'];
        $today = date('Y-m-d');
        $timeStart = strtotime("$today + 9 hours");
        if(date('N') < 7)
        {
            $timeEnd = strtotime("$today + 21 hours 30 minutes");
            if($timeNow < $timeStart || $timeNow > $timeEnd)
            {
                $stringOutTimeSupport = 'timeOut';
            }
        }
        else
        {
            $timeEnd = strtotime("$today + 19 hours");
            if($timeNow < $timeStart || $timeNow > $timeEnd)
            {
                $stringOutTimeSupport = 'timeOut';
            }
        }
        ?>
        <div class="row_pbx overtime"><p><b>0985005412</b> <?php if(isset($stringOutTimeSupport) && $stringOutTimeSupport == 'timeOut')echo "Hết giờ hỗ trợ"; ?> </p></div>
        <div class="clearfix" style="clear:both;"></div>
    </div>
</div><!--End-->
