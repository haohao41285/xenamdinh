<?php

namespace App\Presenters;

//use App\Transformers\TinTucTransformer;
//use Prettus\Repository\Presenter\FractalPresenter;
use HTMLDomParser;
use Laracasts\Presenter\Presenter;

/**
 * Class TinTucPresenter.
 *
 * @package namespace App\Presenters;
 */
class TinTucPresenter extends Presenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    // public function getTransformer()
    // {
    //     return new TinTucTransformer();
    // }
    public function getHtml()
    {
    	$html=HTMLDomParser::file_get_html(SOURCE_PATH);
    	return $html;
    }
    // public function getAvas()
    // {
    // 	$avas=$this->getHtml()->find('li',1);
    // 	$b=0;
    // 	$c=[];
    // 	foreach ($avas as $ava) {
    // 		$b++;
    // 		$a=$this->getHtml()->find('div.lstnews ul>li>a>img',$b)->src;
    // 		$c[$b]=$a;
    // 	}
    // 	return $c;
    	
    // }
    public function getList()
    {
    	$list=$this->getHtml()->find('li',1);
    	return $list;
    }
    public function getElement()
    {
    	$stt=6;
    	$elements=[];
    	foreach ($list as $elements) {
    		$stt++;
    		$element=$this->getHtml()->find('div.lstnews ul>li>a>img',$b)->src;
    		$elements[$stt]=$element;
    	}
    	return $elements;
    }

}
