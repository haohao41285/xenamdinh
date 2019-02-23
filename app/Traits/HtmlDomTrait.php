<?php 
namespace App\Traits;

use HTMLDomParser;
trait HtmlDomTrait
{
	public function getElements($html_path,$list_path,$element = null,$property = null)
	{
		$html=HTMLDomParser::file_get_html($html_path);
		$list=$html->find($list_path);

		if ($element != null) {
			$a=[];
		    foreach($list as $e)
		    {
			    $src=$e->find($element,0)->$property;
			    $a[]=$src;
		    }
		    return $a;

		} else {
			return $list;
		}
			
	}
	public function getContent($html_path,$content_path)
	{
		$html = HTMLDomParser::file_get_html($html_path);
		$content = $html->find($content_path,0);
		return $content; 
	}
}