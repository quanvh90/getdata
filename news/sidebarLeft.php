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



<script type="text/javascript">
    $(document).ready(function(){
        $(".block_listserver li").hover(function(){
            $(this).addClass("backgroundListServer");
        }, function() {
            $(this).removeClass("backgroundListServer");
        });
    });
</script>

