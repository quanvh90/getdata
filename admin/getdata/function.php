<?php

function preg_replace_src($url, $newurl, $text){
		$url = preg_replace('/\//', '\/', $url);
		$url = "src=\"".$url."\"";
		$newurl = "src=\"".$newurl."\"";
		$text = preg_replace("/($url)/i", $newurl, $text);
		return $text;
	}
	function get_title($pattern, $content){ 
		$title=$content->find("$pattern",0);
		$title = strip_tags($title);
		while($title[0] == ' ')
			$title = substr($title, 1);
		while(substr($title, -1) == ' ')
			$title = substr($title, 0, -1);
		
		return $title; 
    }
	function get_intro($pattern,$content){ 
		$intro=$content->find("$pattern",0);
		$intro = strip_tags($intro);
		while($intro[0] == ' ')
			$intro = substr($intro, 1);
		while(substr($intro, -1) == ' ')
			$intro = substr($intro, 0, -1);
		$intro = preg_replace('/\'/','"',$intro);
		
		return $intro; 
    }
	function get_fulltext($pattern, $content){
        $fulltext=$content->find("$pattern",0);
		return $fulltext; 
    }
	function replace($fulltext){
		$fulltext = preg_replace('/border=\"1\"/', 'border="0"', $fulltext);
		$fulltext = preg_replace('/<div(.*?)>/','<p>',$fulltext);
		$fulltext = preg_replace('/<\/div>/','</p>',$fulltext);
		$fulltext = preg_replace('/<p(.*?)>/','<p>',$fulltext);
		$fulltext = preg_replace('/<span(.*?)>/','<span>',$fulltext);
		$fulltext = preg_replace('/<a(.*?)>/','',$fulltext);
		return $fulltext;
	}
	function get_src($content, $int){
		$src="";
        preg_match('/<img[^>]+>/i', $content, $result); 
							foreach( $result as $img_tag)
							{
								preg_match_all('/(alt|title|src)=("[^"]*")/i',$img_tag, $img[$img_tag]);
							}
						if(isset($img)){
							//print_r($img[$img_tag]);
							$tmp = $img[$img_tag][0][0];
							$src = substr($img[$img_tag][2][0],1,-1);
							if ($tmp=="" || !stristr($tmp,"src")){
								$src = substr($img[$img_tag][2][1],1,-1);
							}
						}
		
		return $src; 
    }
	function save_image($inPath){
		//Download images from remote server
		$time = getdate();
		$folder = $time['mday'].$time['mon'].$time['year'];
		$path = '../images/baiviet/';
		if(!is_dir($path.$folder))
			mkdir($path."$folder", 0777);
		$outPath = $path.$folder.'/baokinhdoanh'.$time[0].'.jpg';
    	$in=    fopen($inPath, "rb");
	    $out=   fopen($outPath, "wb");
	    while ($chunk = fread($in,8192))
	    {
    	    fwrite($out, $chunk, 8192);
	    }
    	fclose($in);
	    fclose($out);
		return $outPath;
	}
		
	function create_alias($str){
  		if(!$str) return false;
		$str = preg_replace("/ /",'-',$str);
		$str = strtolower($str);
   		$unicode = array(
      		'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|A|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
      		'd'=>'đ|D|Đ',
      		'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|E|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
		    'i'=>'í|ì|ỉ|ĩ|ị|I|Í|Ì|Ỉ|Ĩ|Ị',
      		'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|O|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
      		'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|U|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ứ|Ử|Ữ|Ự',
      		'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Y|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
   		);
		foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
		$str = preg_replace('/[^a-zA-Z0-9\-]/','',$str); 
		return $str;
	}
	function create_folder($alias){
		$time = getdate();
		if(!is_dir('../images/baiviet/')) mkdir('../images/baiviet/', 0777);
					$path = '../images/baiviet/'.$alias;
					if(!is_dir($path.$time['year'].'/'.$time['mon'].'/'.$time['mday'].'/')){
							if(!is_dir($path.$time['year'].'/'.$time['mon'].'/')){
								if(!is_dir($path.$time['year']))
									mkdir($path.$time['year'], 0777);
								mkdir($path.$time['year']."/".$time['mon'], 0777);
							}
							mkdir($path.$time['year'].'/'.$time['mon'].'/'.$time['mday'], 0777);
					}
					$folder = $path.$time['year'].'/'.$time['mon'].'/'.$time['mday'].'/';
		return $folder;	
	}
?>