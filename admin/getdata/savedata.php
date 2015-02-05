<?php

//include_once("redirect.php");
//include_once("content.php");

if(isset($_POST['save']) || isset($_POST['btnadd'])){
	if(isset($_POST['alias']) && isset($_POST['title'])){
        $category_id = $_POST['category'];
        $title = $_POST['title'];
        $alias = $_POST['alias'];
        $introtext = $_POST['introtext'];
        $fulltext = $_POST['fulltext'];

        if(isset($_POST['imglink']) && $_POST['imglink']!='') {
            $imglink = $_POST['imglink'];
            //echo $imglink;
            $newsrc = save_image($imglink);
            //echo $newsrc;
            $imglink = preg_replace('/\//', '\/', $imglink);
            //echo $imglink.' '.$newsrc;
            $fulltext = preg_replace("/($imglink)/i", $newsrc, $fulltext);
            //$img = "<img style=\"margin-right: 10px; margin-bottom: 5px; float: left;\" src=\"$newsrc\" height=\"auto\" width=\"150\"/>";
            //$introtext = $img.$intro;
        }
        if(isset($_POST['keywords'])) $metakey = $_POST['keywords'];
        else $metakey = "";

        if(isset($_POST['metadesc'])) $metadesc = $_POST['metadesc'];
        else $metadesc = "";

        if(isset($_POST['created'])) $created = $_POST['created'];
        else $created = date('Y-m-d H:i:s');

        if(isset($_POST['publish_up']))$publish_up = $_POST['publish_up'];
        else $publish_up = date('Y-m-d H:i:s');

        if(isset($_POST['state'])) $state = '1';
        else $state = 0;

        if(isset($_POST['stateU']) && $_POST['stateU']) $state = 1;

        $input = array(
            'category_id'   => $category_id,
            'title'         => $title,
            'alias'         => $alias,
            'introtext'     => $introtext,
            'content'       => $fulltext,
            'description'   => $metadesc,
            'keyword'       => $metakey,
            'state'         => $state,
            'created_date'  => $created,
            'updated_date'  => $publish_up
        );

        $result = false;
        $check = Content::checkAlias($alias);
        if($check['state']) {
            $input['id'] = $check['id'];
            $result = Content::updateContent($input);
        }
        else $result = Content::insertContent($input);

        if($result){ echo "<script type='text/javascript'>
                            window.location.href= 'http://getdata.local.com/index.php';
                        </script>";
        }
        else echo "that bai";
	}else $error = "Bạn cần điền đầy đủ thông tin!!!";
}
?>