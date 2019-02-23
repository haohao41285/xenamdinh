<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;
use App\Models\Page;

/**
 * Class MenuItemPresenterPresenter.
 *
 * @package namespace App\Presenters;
 */
class MenuItemPresenter extends Presenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    // public function getTransformer()
    // {
    //     return new MenuItemPresenterTransformer();
    // }
    public function openLiTag()
    {
    	$tag = "";

    	if($this->menu_id == 2)
    	{
    		$theme = Page::find($this->page_id)->theme;
    		$href = route('frontend.show',['theme'=>$theme]);
    		$tag = '<li><a href="'.$href.'">';
    	} else if ($this->depth == 1 && ($this ->rgt - $this ->lft)>1)
    	{
    		$tag = '<li class="nav-item hasChild"><span class="nav-link"><span>';
    	} else if ($this->depth ==1)
    	{
    		$theme =Page::find($this->page_id)->theme;
    		$href= route('frontend.show',['theme'=>$theme]);
    		$tag = '<li class="nav-item"><a class="nav-link" href="'.$href.'" title="'.$this->title.'"><span>';
    	} else if( $this->depth ==2)
    	{
    		$theme =Page::find($this->page_id)->theme;
    		$href = route('frontend.show',['theme'=>$theme]);
    		$tag = '<li> <a href="'.$href.'" title="'.$this->title.'"><span>';
    	}

    	return $tag;
    }

    public function closeLiTag()
    {
    	$tag="";

    	if ($this->menu_id == 2)
    	{
    		$tag = '</a></li>';
    	} else if ($this->depth ==1 && ($this ->rgt - $this->lft)>1)
    	{
    		$tag = '</li>';
    	} else if ($this->depth ==1)
    	{
    		$tag = '</span></a></li>';
    	} else if ($this->depth ==2)
    	{
    		$tag = '</span></a></li>';
    	}
    	return $tag;
    }
    public function openChild()
    {
    	$tag = '';

    	if($this->depth == 1 && ($this->rgt -$this->lft)>1)
    	{
    		$tag = '</span></span><span class="expand"><i class="icon_plus"></i></span>';
    	}
    	return $tag;
    }
}
