<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if(!function_exists("safeUrlText")){
		
	
		 function safeUrlText($str,$maxlen=255)
		{
			$unicode = '';
			$str = removeAccents($str);
			for ($i = 0; $i < strlen( $str ); $i++ ) {
				$value = ord( $str[ $i ] );
				//if ( $value < 128 ) {
				 	$str[ $i ] =	preg_replace("/[^A-Za-z0-9\s]/i", '-', strtolower($str[ $i ]));
				//}
				$unicode .= $str[$i];
			}
		 	$unicode =	preg_replace('#[\s]#si', "-", $unicode);
			while(strpos($unicode,'--')!==false)
			{
				 $unicode =	str_replace("--","-",$unicode);
			}
			$unicode = trim($unicode,'-');
			if(strlen($unicode)> $maxlen)
			{
				$unicode=substr($unicode,0, $maxlen);
				$unicode = trim($unicode,'-');
			}
			return $unicode;
		}
		
		  function removeAccents($string) {
		if ( !preg_match('/[\x80-\xff]/', $string) )
			return $string;
	
		if (self::seemsUtf8($string)) {
			$chars = array(
			// Decompositions for Latin-1 Supplement
			chr(195).chr(128) => 'A', chr(195).chr(129) => 'A',
			chr(195).chr(130) => 'A', chr(195).chr(131) => 'A',
			chr(195).chr(132) => 'A', chr(195).chr(133) => 'A',
			chr(195).chr(135) => 'C', chr(195).chr(136) => 'E',
			chr(195).chr(137) => 'E', chr(195).chr(138) => 'E',
			chr(195).chr(139) => 'E', chr(195).chr(140) => 'I',
			chr(195).chr(141) => 'I', chr(195).chr(142) => 'I',
			chr(195).chr(143) => 'I', chr(195).chr(145) => 'N',
			chr(195).chr(146) => 'O', chr(195).chr(147) => 'O',
			chr(195).chr(148) => 'O', chr(195).chr(149) => 'O',
			chr(195).chr(150) => 'O', chr(195).chr(153) => 'U',
			chr(195).chr(154) => 'U', chr(195).chr(155) => 'U',
			chr(195).chr(156) => 'U', chr(195).chr(157) => 'Y',
			chr(195).chr(159) => 's', chr(195).chr(160) => 'a',
			chr(195).chr(161) => 'a', chr(195).chr(162) => 'a',
			chr(195).chr(163) => 'a', chr(195).chr(164) => 'a',
			chr(195).chr(165) => 'a', chr(195).chr(167) => 'c',
			chr(195).chr(168) => 'e', chr(195).chr(169) => 'e',
			chr(195).chr(170) => 'e', chr(195).chr(171) => 'e',
			chr(195).chr(172) => 'i', chr(195).chr(173) => 'i',
			chr(195).chr(174) => 'i', chr(195).chr(175) => 'i',
			chr(195).chr(177) => 'n', chr(195).chr(178) => 'o',
			chr(195).chr(179) => 'o', chr(195).chr(180) => 'o',
			chr(195).chr(181) => 'o', chr(195).chr(182) => 'o',
			chr(195).chr(182) => 'o', chr(195).chr(185) => 'u',
			chr(195).chr(186) => 'u', chr(195).chr(187) => 'u',
			chr(195).chr(188) => 'u', chr(195).chr(189) => 'y',
			chr(195).chr(191) => 'y',
			// Decompositions for Latin Extended-A
			
			//chr(196).chr(128) => 'AE', chr(196).chr(129) => 'ae',
			chr(196).chr(128) => 'A', chr(196).chr(129) => 'a',
			chr(196).chr(130) => 'A', chr(196).chr(131) => 'a',
			chr(196).chr(132) => 'A', chr(196).chr(133) => 'a',
			chr(196).chr(134) => 'C', chr(196).chr(135) => 'c',
			chr(196).chr(136) => 'C', chr(196).chr(137) => 'c',
			chr(196).chr(138) => 'C', chr(196).chr(139) => 'c',
			chr(196).chr(140) => 'C', chr(196).chr(141) => 'c',
			chr(196).chr(142) => 'D', chr(196).chr(143) => 'd',
			chr(196).chr(144) => 'D', chr(196).chr(145) => 'd',
			chr(196).chr(146) => 'E', chr(196).chr(147) => 'e',
			chr(196).chr(148) => 'E', chr(196).chr(149) => 'e',
			chr(196).chr(150) => 'E', chr(196).chr(151) => 'e',
			chr(196).chr(152) => 'E', chr(196).chr(153) => 'e',
			chr(196).chr(154) => 'E', chr(196).chr(155) => 'e',
			chr(196).chr(156) => 'G', chr(196).chr(157) => 'g',
			chr(196).chr(158) => 'G', chr(196).chr(159) => 'g',
			chr(196).chr(160) => 'G', chr(196).chr(161) => 'g',
			chr(196).chr(162) => 'G', chr(196).chr(163) => 'g',
			chr(196).chr(164) => 'H', chr(196).chr(165) => 'h',
			chr(196).chr(166) => 'H', chr(196).chr(167) => 'h',
			chr(196).chr(168) => 'I', chr(196).chr(169) => 'i',
			chr(196).chr(170) => 'I', chr(196).chr(171) => 'i',
			chr(196).chr(172) => 'I', chr(196).chr(173) => 'i',
			chr(196).chr(174) => 'I', chr(196).chr(175) => 'i',
			chr(196).chr(176) => 'I', chr(196).chr(177) => 'i',
			chr(196).chr(178) => 'IJ',chr(196).chr(179) => 'ij',
			chr(196).chr(180) => 'J', chr(196).chr(181) => 'j',
			chr(196).chr(182) => 'K', chr(196).chr(183) => 'k',
			chr(196).chr(184) => 'k', chr(196).chr(185) => 'L',
			chr(196).chr(186) => 'l', chr(196).chr(187) => 'L',
			chr(196).chr(188) => 'l', chr(196).chr(189) => 'L',
			chr(196).chr(190) => 'l', chr(196).chr(191) => 'L',
			chr(197).chr(128) => 'l', chr(197).chr(129) => 'L',
			chr(197).chr(130) => 'l', chr(197).chr(131) => 'N',
			chr(197).chr(132) => 'n', chr(197).chr(133) => 'N',
			chr(197).chr(134) => 'n', chr(197).chr(135) => 'N',
			chr(197).chr(136) => 'n', chr(197).chr(137) => 'N',
			chr(197).chr(138) => 'n', chr(197).chr(139) => 'N',
			chr(197).chr(140) => 'O', chr(197).chr(141) => 'o',
			chr(197).chr(142) => 'O', chr(197).chr(143) => 'o',
			chr(197).chr(144) => 'O', chr(197).chr(145) => 'o',
			chr(197).chr(146) => 'OE',chr(197).chr(147) => 'oe',
			chr(197).chr(148) => 'R',chr(197).chr(149) => 'r',
			chr(197).chr(150) => 'R',chr(197).chr(151) => 'r',
			chr(197).chr(152) => 'R',chr(197).chr(153) => 'r',
			chr(197).chr(154) => 'S',chr(197).chr(155) => 's',
			chr(197).chr(156) => 'S',chr(197).chr(157) => 's',
			chr(197).chr(158) => 'S',chr(197).chr(159) => 's',
			chr(197).chr(160) => 'S', chr(197).chr(161) => 's',
			chr(197).chr(162) => 'T', chr(197).chr(163) => 't',
			chr(197).chr(164) => 'T', chr(197).chr(165) => 't',
			chr(197).chr(166) => 'T', chr(197).chr(167) => 't',
			chr(197).chr(168) => 'U', chr(197).chr(169) => 'u',
			chr(197).chr(170) => 'U', chr(197).chr(171) => 'u',
			chr(197).chr(172) => 'U', chr(197).chr(173) => 'u',
			chr(197).chr(174) => 'U', chr(197).chr(175) => 'u',
			chr(197).chr(176) => 'U', chr(197).chr(177) => 'u',
			chr(197).chr(178) => 'U', chr(197).chr(179) => 'u',
			chr(197).chr(180) => 'W', chr(197).chr(181) => 'w',
			chr(197).chr(182) => 'Y', chr(197).chr(183) => 'y',
			chr(197).chr(184) => 'Y', chr(197).chr(185) => 'Z',
			chr(197).chr(186) => 'z', chr(197).chr(187) => 'Z',
			chr(197).chr(188) => 'z', chr(197).chr(189) => 'Z',
			chr(197).chr(190) => 'z', chr(197).chr(191) => 's',
			// Euro Sign
			chr(226).chr(130).chr(172) => 'E',
			// GBP (Pound) Sign
			chr(194).chr(163) => '');
	
			$string = strtr($string, $chars);
		} else {
			// Assume ISO-8859-1 if not UTF-8
			$chars['in'] = chr(128).chr(131).chr(138).chr(142).chr(154).chr(158)
				.chr(159).chr(162).chr(165).chr(181).chr(192).chr(193).chr(194)
				.chr(195).chr(196).chr(197).chr(199).chr(200).chr(201).chr(202)
				.chr(203).chr(204).chr(205).chr(206).chr(207).chr(209).chr(210)
				.chr(211).chr(212).chr(213).chr(214).chr(216).chr(217).chr(218)
				.chr(219).chr(220).chr(221).chr(224).chr(225).chr(226).chr(227)
				.chr(228).chr(229).chr(231).chr(232).chr(233).chr(234).chr(235)
				.chr(236).chr(237).chr(238).chr(239).chr(241).chr(242).chr(243)
				.chr(244).chr(245).chr(246).chr(248).chr(249).chr(250).chr(251)
				.chr(252).chr(253).chr(255);
	
			$chars['out'] = "EfSZszYcYuAAAAAACEEEEIIIINOOOOOOUUUUYaaaaaaceeeeiiiinoooooouuuuyy";
	
			$string = strtr($string, $chars['in'], $chars['out']);
			$double_chars['in'] = array(chr(140), chr(156), chr(198), chr(208), chr(222), chr(223), chr(230), chr(240), chr(254));
			$double_chars['out'] = array('OE', 'oe', 'AE', 'DH', 'TH', 'ss', 'ae', 'dh', 'th');
			$string = str_replace($double_chars['in'], $double_chars['out'], $string);
		}
	
		return $string;
	}

	function image_thumb($image_path, $height, $width ) {
		
	    // Get the CodeIgniter super object
	    $CI =& get_instance();
	
	    // Path to image thumbnail
	    $image_thumb = dirname( $image_path ) . '/' . $height . '_' . $width . '.jpg';
	
	    if ( !file_exists( $image_thumb ) ) {
	        // LOAD LIBRARY
	        $CI->load->library( 'image_lib' );
	
	        // CONFIGURE IMAGE LIBRARY
	        $config['image_library']    = 'gd2';
	        $config['source_image']     = $image_path;
	        $config['new_image']        = $image_thumb;
	        $config['maintain_ratio']   = TRUE;
	        $config['height']           = $height;
	        $config['width']            = $width;
	        $CI->image_lib->initialize( $config );
	        $CI->image_lib->resize();
	        $CI->image_lib->clear();
	    }
	
	    echo  $image_thumb;
	}
	
		function addScript($filePath = ""){
			
			if($filePath != ""){
				
				return "<script src='".$filePath."' type='text/javascript'></script>";
				
			}
			return "";
			
		}
	function addStyle($filePath = ""){
			
			if($filePath != ""){
				
				return "<link rel='stylesheet' type='text/css' href='".$filePath."' />";
				
			}
			return "";
			
		}
	 function thumbnail($filename, $mediatype, $width, $height)
		{
		 	
			
		    $source_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/'.$mediatype.'/'.$filename;
		    $target_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/tmp/';
			
			$extension = pathinfo($source_path, PATHINFO_EXTENSION);
			
			$arr = explode('.', $filename);
			$file = $arr[0];
			
			$hashname = md5("luvetheme".$file);
			// echo $target_path.$file."_thumb.".$extension;
			// exit;
			if(!file_exists($target_path.$file."_thumb.".$extension)){
				$CI =& get_instance();
				
				$CI->load->library( 'image_lib' );
				 
			    $config_manip = array(
			        'image_library' => 'gd2',
			        'source_image' => $source_path,
			        'new_image' => $target_path,
			        'maintain_ratio' => TRUE,
			        'create_thumb' => TRUE,
			        'thumb_marker' => "-".$hashname,
			        'width' => $width,
			        'height' => $height
			    );
			  
			  	 $CI->image_lib->initialize( $config_manip );
			    if (!$CI->image_lib->resize()) {
			        echo $CI->image_lib->display_errors();
			    }
			    $CI->image_lib->clear();
				
			}
			
			return "uploads/tmp/".$file."-".$hashname.'.'.$extension;
		}
		
		
		function findChar($str, $chr) {
			
		    if (strstr($str, $chr)) {
		        return true;
		    }
			
		    return false;
		    
		}
		
	/* End of file image_helper.php */
	/* Location: ./application/helpers/image_helper.php */


	function statusOrder($status){
		
		switch ($status) {
			case 0:
				
				
					
				
				
				return '<span class="label label-danger">Unpaid</span> ';
				break;
			case 1:
				
			
				return '<span class="label label-success">Paid</span>';
				break;
			case 2:			
					
				return '<span class="label label-info">On Shipment</span>';
				break;
			case 3:			
					
				return '<span class="label label-success">Order Done</span>';
				break;
			
		}			
				
			
		
	}


	
	}