<!--<div class="block_playnow">-->
<!--    <a href="--><?php //echo URL_HOME; ?><!--" target=""></a>-->
<!--</div> <!--End-->

<div class="block_listmenu">
    <h2 class="tit">Menu</h2>
        <ul>
            <li>
                <div class="name">Tin Tức</div>
                    <span class="new_label">
                        <img src="news/images/new.png">
                    </span>

                <div class="date">25/02</div>
            </li>

            <li>
                <div class="name">Sự Kiện</div>
                <div class="date">30/02</div>
            </li>
        </ul>

    <a href="" target=""><span class="icon icon01"></span></a>
</div><!--End-->

<div class="boxRightFace">
    <a href="https://facebook.com/tintuc" target="_blank">
        <img src="news/images/block_face.jpg" alt=""/>
    </a>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $(".block_listserver li").hover(function(){
            $(this).addClass("backgroundListServer");
        }, function() {
            $(this).removeClass("backgroundListServer");
        });
    });
</script>

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