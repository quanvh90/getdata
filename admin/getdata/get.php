<?php
if(isset($_POST['getdata'])){
	if(isset($_POST['url']) && $_POST['url']!='') {
		$url = $_POST['url'];
		if (stristr($url,"dantri.com.vn")){
			
			//---------------------------Edit Start------------------------
			$pattern_content = "div[id=ctl00_IDContent_ctl00_divContent]";
			$pattern_title = "h1";
			$pattern_intro = "h2[class=fon33 mt1 sapo]";
			$pattern_fulltext = "div[class=fon34 mt3 mr2 fon43 detail-content]";
			//----------------------------Edit End-------------------------

			$html = file_get_html($url);
			$content=$html->find($pattern_content,0);

			if($content != ''){
				$title = get_title($pattern_title, $content);
				$alias = create_alias($title);
				$introtext = get_intro($pattern_intro, $content);
				$fulltext = $content->find($pattern_fulltext ,0);
//                print "<pre>"; print_r($fulltext->parent()); print"</pre>"; exit;

				//Save images Start	
					$folder = create_folder($alias);
					// Find all images 
					$i=0;					
					foreach($content->find('img') as $element){
						$i++;
						$outPath = $folder.$alias.$i.'.jpg';
						if($i==3) $newsrc = $outPath;
					   	copy($element->src,$outPath);
						$element->src = preg_replace('/\//', '\/', $element->src);
						$fulltext = preg_replace("/($element->src)/i", $outPath, $fulltext);
					}
				//Save images End
				//----------------------------------------Edit Start----------------------------------------
				$introtext = preg_replace('/\(Dân trí\) - /','',$introtext);
				$introtext = preg_replace('/>>/','',$introtext);
				$metadesc = $introtext;//de lai
				$fulltext = preg_replace('/\'/', '"', $fulltext); //de lai
				$fulltext = $fulltext.'//ecp_delete';
				$fulltext = preg_replace('/<div class=\"news-tag\"(.*?)\/\/ecp_delete/','',$fulltext);
				$fulltext = replace($fulltext);
				$fulltext = preg_replace('/<p>&nbsp;<\/p>/','', $fulltext);
				$fulltext = preg_replace('/<\?xml(.*?)>/','', $fulltext);
				$fulltext = preg_replace('/<p><o:p><span>/','', $fulltext);
				$fulltext = preg_replace('/<p><span><o:p>/','', $fulltext);
				$fulltext = preg_replace('/<\/p><\/o:p><\/span>/','', $fulltext);
				$fulltext = preg_replace('/<\/p><\/span><\/o:p>/','', $fulltext);
				$fulltext = preg_replace('/&nbsp;/','', $fulltext);
				$fulltext = preg_replace('/<p><\/p>/','', $fulltext);
				$fulltext = preg_replace('/<p itemscope/','',$fulltext);
				$fulltext = $fulltext.'<p>{fcomment}</p>'; //de lai
				$fulltext = '<strong>'.$introtext.'</strong>'.$fulltext; //de lai
				$introtext = '<img src="'.$newsrc.'" alt="'.$title.'">'.$introtext; //de lai

				//----------------------------------------Edit End----------------------------------------
			} else echo "Quá trình lấy tin bị lỗi!!!";
		} else if (stristr($url,"vnexpress.net")){
				//---------------------------Edit Start------------------------
			$pattern_content = "div[class=block_col_480]";
			$pattern_title = "div[class=title_news]";
			$pattern_intro = "div[class=short_intro txt_666]";
			$pattern_fulltext = "div[class=fck_detail width_common]";
			//----------------------------Edit End-------------------------
			
			$html = file_get_html($url);
			$content=$html->find($pattern_content,0);
			if($content != ''){
				$title = get_title($pattern_title, $content);
				$alias = create_alias($title);
				$introtext = get_intro($pattern_intro, $content);
				$fulltext = $content->find($pattern_fulltext ,0);
				$fulltext2 = $fulltext;
				//Save images Start	
					$folder = create_folder($alias);
					// Find all images 
					$i=0;					
					foreach($content->find('img') as $element){
						$i++;
						$outPath = $folder.$alias.$i.'.jpg';
						if($i==6) $newsrc = $outPath;
					   	copy($element->src,$outPath);
						$element->src = preg_replace('/\//', '\/', $element->src);
						$fulltext = preg_replace("/($element->src)/i", $outPath, $fulltext);
					}
				//Save images End
				//----------------------------------------Edit Start----------------------------------------
						
				$fulltext = preg_replace('/<p class=\"likesubject fl\"/','',$fulltext);
				$fulltext = preg_replace('/src=\"\/Files/','src="http://vnexpress.net/Files',$fulltext);
				$introtext = preg_replace('/>>/','',$introtext);
				$metadesc = $introtext;//de lai
				$fulltext = preg_replace('/\'/', '"', $fulltext); //de lai
				$fulltext = $fulltext.'<p>{fcomment}</p>'; //de lai
				$fulltext = '<strong>'.$introtext.'</strong>'.$fulltext; //de lai
				$introtext = '<img src="'.$newsrc.'" alt="'.$title.'">'.$introtext; //de lai
				//----------------------------------------Edit End----------------------------------------
			} else echo "Quá trình lấy tin bị lỗi!!!";
			
			
		
		}
		else if (stristr($url,"24h.com.vn")){
            $pattern_content = "div[class=colCenter]";
            $pattern_title = "h1[class=baiviet-title]";
            $pattern_intro = "p[class=baiviet-sapo]";
            $pattern_fulltext = "div[class=text-conent]";
            //----------------------------Edit End-------------------------

            $html = file_get_html($url);
            $content=$html->find($pattern_content,0);
            if($content != ''){
                $title = get_title($pattern_title, $content);
                $alias = create_alias($title);
                $introtext = get_intro($pattern_intro, $content);
                $fulltext = $content->find($pattern_fulltext ,0);
                $fulltext2 = $fulltext;
                //Save images Start
                $folder = create_folder($alias);
                // Find all images
                $i=0;
                foreach($content->find('img') as $element){
                    $i++;
                    $outPath = $folder.$alias.$i.'.jpg';
                    if($i==1) $newsrc = $outPath;
                    copy($element->src,$outPath);
                    $element->src = preg_replace('/\//', '\/', $element->src);
                    $fulltext = preg_replace("/($element->src)/i", $outPath, $fulltext);
                }
                //Save images End
                //----------------------------------------Edit Start----------------------------------------

                $fulltext = preg_replace('/<p class=\"likesubject fl\"/','',$fulltext);
                $fulltext = preg_replace('/src=\"\/Files/','src="http://vnexpress.net/Files',$fulltext);
                $introtext = preg_replace('/>>/','',$introtext);
                $metadesc = $introtext;//de lai
                $fulltext = preg_replace('/\'/', '"', $fulltext); //de lai
                $fulltext = $fulltext.'<p>{fcomment}</p>'; //de lai
                $fulltext = '<strong>'.$introtext.'</strong>'.$fulltext; //de lai
                $introtext = '<img src="'.$newsrc.'" alt="'.$title.'">'.$introtext; //de lai
                //----------------------------------------Edit End----------------------------------------
            } else echo "Quá trình lấy tin bị lỗi!!!";
		}else if (stristr($url,"eva.vn")){
			$content = get_content('class=\"ct_news_hot_eva\"(.*?)class=\"shareFB-green\"', $url);
			if($content != ''){
				$title = get_title('<h1(.*?)<\/h1>', $content);
				$introtext = get_intro('<strong(.*?)<\/strong>', $content);
				$metadesc = $introtext;
				$conenttext = get_fulltext('<div class=\"content_details\"(.*?)class=\"shareFB-green\"' ,$content);
				$conenttext = preg_replace('/<p class=\"shareFB-green\"/','',$conenttext);
				$fulltext = '<p><strong>'.$introtext.'</strong></p>'.$conenttext;
				$fulltext = $fulltext.'<p>{fcomment}</p>';
				$src = get_src($fulltext, 0);
				if($src!=''){
					$imgurl = $src;
					//echo $src;
					$newsrc = save_image($imgurl);
					$src = preg_replace('/\//', '\/', $src);
					$fulltext = preg_replace("/($src)/i", $newsrc, $fulltext);
				}else $error = "Hệ thống không lấy được ảnh về server.";
				$introtext = '<img src="'.$newsrc.'" alt="'.$title.'">'.$introtext;
				//echo $introtext;
			}
		}else if (stristr($url,"ngoisao.net")){
			$content = get_content('class=\"detailCT\"(.*?)class=\"relateNewsDetail\"', $url);
			if($content != ''){
				$title = get_title('<h1(.*?)<\/h1>', $content);
				$introtext = get_intro('<h2(.*?)<\/h2>', $content);
				$metadesc = $introtext;
				$fulltext = get_fulltext('<h2(.*?)class=\"detailNS\"' ,$content);
				$fulltext = preg_replace('/<p class=\"detailNS\"/','',$fulltext);
				$fulltext = preg_replace('/src=\"\/Files/','src="http://ngoisao.net/Files',$fulltext);
				$fulltext = $fulltext.'<p>{fcomment}</p>';
				$src = get_src($fulltext, 0);
				if($src!=''){
					$imgurl = $src;
					//echo $src;
					$newsrc = save_image($imgurl);
					$src = preg_replace('/\//', '\/', $src);
					$fulltext = preg_replace("/($src)/i", $newsrc, $fulltext);
				}else $error = "Hệ thống không lấy được ảnh về server.";
				$introtext = '<img src="'.$newsrc.'" alt="'.$title.'">'.$introtext;
				//echo $introtext;
			}
		}else if (stristr($url,"soha.vn")){
			$content = get_content('class=\"detailct clearfix mgt20\"(.*?)class=\"VCObjectBoxRelatedNewsContentWrapper\"', $url);
			if($content != ''){
				$title = get_title('<h1(.*?)<\/h1>', $content);
				$introtext = get_intro('<h2(.*?)<\/h2>', $content);
				$metadesc = $introtext;
				$fulltext = get_fulltext('<h2(.*?)class=\"detailNS\"' ,$content);
				$fulltext = preg_replace('/<p class=\"detailNS\"/','',$fulltext);
				$fulltext = preg_replace('/src=\"\/Files/','src="http://ngoisao.net/Files',$fulltext);
				$fulltext = $fulltext.'<p>{fcomment}</p>';
				$src = get_src($fulltext, 0);
				if($src!=''){
					$imgurl = $src;
					//echo $src;
					$newsrc = save_image($imgurl);
					$src = preg_replace('/\//', '\/', $src);
					$fulltext = preg_replace("/($src)/i", $newsrc, $fulltext);
				}else $error = "Hệ thống không lấy được ảnh về server.";
				$introtext = '<img src="'.$newsrc.'" alt="'.$title.'">'.$introtext;
				//echo $introtext;
			}

		
		} else if (stristr($url,"cafebiz.vn")){
			$content = get_content('<div class=\"title\">(.*?)id=\"dongsukien-content\">', $url);
			if($content != ''){
				$title = get_title('<h1(.*?)<\/h1>', $content);
				$introtext = get_intro('<h2(.*?)<\/h2>', $content);
				$metadesc = $introtext;
				$fulltext = get_fulltext('<h2(.*?)id=\"dongsukien-content\">' ,$content);
				$fulltext = preg_replace('/<p><br><\/p>/','',$fulltext);
				$fulltext = preg_replace('/onerror.*?;\"/','',$fulltext);
				//$fulltext = preg_replace('/src=\"\/Files/','src="http://ngoisao.net/Files',$fulltext);
				$fulltext = $fulltext.'<p>{fcomment}</p>';
				$src = get_src($fulltext, 0);
				if($src!=''){
					$imgurl = $src;
					//echo $src;
					$newsrc = save_image($imgurl);
					$src = preg_replace('/\//', '\/', $src);
					$fulltext = preg_replace("/($src)/i", $newsrc, $fulltext);
				}else $error = "Hệ thống không lấy được ảnh về server.";
				$introtext = '<img src="'.$newsrc.'" alt="'.$title.'">'.$introtext;
				//echo $introtext;
			}
		}
		//--------------------DEFAULT------------------------------------------
		else if (stristr($url,"vnexpress.net")){
				//---------------------------Edit Start------------------------
			$pattern_content = "div[id=fck_container]";
			$pattern_title = "h1";
			$pattern_intro = "div[class=short_intro]";
			$pattern_fulltext = "div[class=fck_detail]";
			//----------------------------Edit End-------------------------
			
			$html = file_get_html($url);
			$content=$html->find($pattern_content,0);
			if($content != ''){
				$title = get_title($pattern_title, $content);
				$alias = create_alias($title);
				$introtext = get_intro($pattern_intro, $content);
				$fulltext = $content->find($pattern_fulltext ,0);
				$fulltext2 = $fulltext;
				//Save images Start	
					$folder = create_folder($alias);
					// Find all images 
					$i=0;					
					foreach($content->find('img') as $element){
						$i++;
						$outPath = $folder.$alias.$i.'.jpg';
						if($i==1) $newsrc = $outPath;
					   	copy($element->src,$outPath);
						$element->src = preg_replace('/\//', '\/', $element->src);
						$fulltext = preg_replace("/($element->src)/i", $outPath, $fulltext);
					}
				//Save images End
				//----------------------------------------Edit Start----------------------------------------
						
				$fulltext = preg_replace('/<p class=\"likesubject fl\"/','',$fulltext);
				$fulltext = preg_replace('/src=\"\/Files/','src="http://vnexpress.net/Files',$fulltext);
				$introtext = preg_replace('/>>/','',$introtext);
				$metadesc = $introtext;//de lai
				$fulltext = preg_replace('/\'/', '"', $fulltext); //de lai
				$fulltext = $fulltext.'<p>{fcomment}</p>'; //de lai
				$fulltext = '<strong>'.$introtext.'</strong>'.$fulltext; //de lai
				$introtext = '<img src="'.$newsrc.'" alt="'.$title.'">'.$introtext; //de lai
				//----------------------------------------Edit End----------------------------------------
			} else echo "Quá trình lấy tin bị lỗi!!!";
		}
		
		//----------------------------END DEFAULT---------------------------------------------
		else $error = "Hệ thống không thể lấy tin từ nguồn này!!!";
		if (isset($title) && isset($fulltext) && $title!='' && $fulltext!=''){
			$alias = create_alias($title);
			$time = getdate();
			$hour = $time['hours'] -7;
			$created = $time['year'].'-'.$time['mon'].'-'.$time['mday'].' '.$hour.':'.$time['minutes'].':'.$time['seconds'];
		}else $error = "Quá trình lấy tin xảy ra lỗi!!!";
	}else $error = "Bạn chưa nhập url!!!";
}
?>
