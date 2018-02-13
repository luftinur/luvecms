<?php

class StructureData{
	
	
	public static function RichCardArticle($data = array(), $pathurl, $authortype = 'Person'){
		
		if(!empty($data)){
			$strctr = "<script type='application/ld+json'>";
		
			$strctr .= '{
						 "@context": "http://schema.org",
						  "@type": "NewsArticle",
						  "mainEntityOfPage": {
						    "@type": "WebPage",
						    "@id": "'.$pathurl.'"
						  },
						  "headline": "'.$data['title'].'",
						  "image": [
						    "https://example.com/photos/1x1/photo.jpg",
						    "https://example.com/photos/4x3/photo.jpg",
						    "https://example.com/photos/16x9/photo.jpg"
						   ],
						  "datePublished": "2015-02-05T08:00:00+08:00",
						  "dateModified": "2015-02-05T09:20:00+08:00",
						  "author": {
						    "@type": "'.$authortype.'",
						    "name": "John Doe"
						  },
						   "publisher": {
						    "@type": "Organization",
						    "name": "'.$data['publisherName'].'",
						    "logo": {
						      "@type": "ImageObject",
						      "url": "'.$data['publisherLogo'].'",
						      "width" : 
						    }
						  },
						  "description": "'.$data['excerpt'].'"			
			}';
			
			$strctr .= "</script>";
			
			return $strctr;
		}
		
		return "";
		

		
	}
	
}
